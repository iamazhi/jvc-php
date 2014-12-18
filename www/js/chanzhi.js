/**
 * Set trigger modal default name to 'ajaxModal'.
 */
(function(){$.ModalTriggerDefaults = {name: 'ajaxModal'};})();

$.extend(
{
    setAjaxForm: function(formID, callback)
    {
        if($(document).data('setAjaxForm:' + formID)) return;

        form = $(formID);

        var options = 
        {
            target  : null,
            timeout : 30000,
            dataType:'json',
            
            success: function(response)
            {
                $.enableForm(formID);
                var submitButton = $(formID).find(':input[type=submit], .submit');

                /* The response is not an object, some error occers, bootbox.alert it. */
                if($.type(response) != 'object')
                {
                    if(response) return bootbox.alert(response);
                    return bootbox.alert('No response.');
                }

                /* The response.result is success. */
                if(response.result == 'success')
                {
                    if(response.message && response.message.length)
                    {
                        submitButton.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
                        submitButton.next('.popover').addClass('popover-success');
                        function distroy(){submitButton.popover('destroy')}
                        setTimeout(distroy,2000);
                    }

                    if($.isFunction(callback)) return callback(response);

                    if($('#responser').length && response.message && response.message.length)
                    {
                        $('#responser').html(response.message).addClass('red f-12px').show().delay(3000).fadeOut(100);
                    }

                    if(response.locate) 
                    {
                        return setTimeout(function(){location.href = response.locate;}, 1200);
                    }

                    return true;
                }

                /**
                 * The response.result is fail. 
                 */

                /* The result.message is just a string. */
                if($.type(response.message) == 'string')
                {
                    if($('#responser').length == 0)
                    {
                        submitButton.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
                        submitButton.next('.popover').addClass('popover-danger');
                        function distroy(){submitButton.popover('destroy')}
                        setTimeout(distroy,2000);
                    }
                    else $('#responser').html(response.message).addClass('red f-12px').show().delay(5000).fadeOut(100);
                }

                /* The result.message is just a object. */
                if($.type(response.message) == 'object')
                {
                    $.each(response.message, function(key, value)
                    {
                        /* Define the id of the error objecjt and it's label. */
                        var errorOBJ   = '#' + key;
                        var errorLabel =  key + 'Label';

                        /* Create the error message. */
                        var errorMSG = '<span id="'  + errorLabel + '" for="' + key  + '"  class="text-error red">';
                        errorMSG += $.type(value) == 'string' ? value : value.join(';');
                        errorMSG += '</span>';

                        /* Append error message, set style and set the focus events. */
                        $('#' + errorLabel).remove(); 
                        var $errorOBJ = $(errorOBJ);
                        if($errorOBJ.closest('.input-group').length > 0)
                        {
                            $errorOBJ.closest('.input-group').after(errorMSG)
                        }
                        else
                        {
                            $errorOBJ.parent().append(errorMSG);
                        }
                        $errorOBJ.css('margin-bottom', 0);
                        $errorOBJ.css('border-color','#953B39')
                        $errorOBJ.change(function()
                        {
                            $errorOBJ.css('margin-bottom', 0);
                            $errorOBJ.css('border-color','')
                            $('#' + errorLabel).remove(); 
                        });
                    })

                    /* Focus the first error field thus to nitify the user. */
                    var firstErrorField = $('#' +$('span.red').first().attr('for'));
                    topOffset = parseInt(firstErrorField.offset().top) - 20;   // 20px offset more for margin.

                    /* If there's the navbar-fixed-top element, minus it's height. */
                    if($('.navbar-fixed-top').size())
                    {
                        topOffset = topOffset - parseInt($('.navbar-fixed-top').height());
                    }
                    
                    /* Scroll to the error field and foucus it. */
                    $(document).scrollTop(topOffset);
                    firstErrorField.focus();
                }

                if($.isFunction(callback)) return callback(response);
            },

            /* When error occers, alert the response text, status and error. */
            error: function(jqXHR, textStatus, errorThrown)
            {
                $.enableForm(formID);
                if(textStatus == 'timeout')
                {
                    bootbox.alert(v.lang.timeout);
                    return false;
                }
                bootbox.alert(jqXHR.responseText + textStatus + errorThrown);
            }
        };

        /* Call ajaxSubmit to sumit the form. */
        $(document).on('submit', formID, function()
        { 
            $.disableForm(formID);
            $(this).ajaxSubmit(options);
            return false;    // Prevent the submitting event of the browser.
        }).data('setAjaxForm:' + formID, true);
    },

    /* Switch the label and disabled attribute for the submit button in a form. */
    setSubmitButton: function(formID, action)
    {
        var submitButton = $(formID).find(':submit');

        label    = submitButton.val();
        loading  = submitButton.data('loading');
        disabled = action == 'disable';

        submitButton.attr('disabled', disabled);
        submitButton.val(loading);
        submitButton.data('loading', label);
    },

    /* Disable a form. */
    disableForm: function(formID)
    {
        $.setSubmitButton(formID, 'disable');
    },
    
    /* Enable a form. */
    enableForm: function(formID)
    {
        $.setSubmitButton(formID, 'enable');
    }
});

$.extend(
{
    /**
     * Set ajax loader.
     * 
     * Bind click event for some elements thus when click them, 
     * use $.load to load page into target.
     *
     * @param string selector
     * @param string target
     * @param funtion callback
     */
    setAjaxLoader: function(selector, target, callback)
    {
        var target = $(target);
        if(!target.size()) return false;

        $(document).on('click', selector, function()
        {
            url = $(this).attr('href');
            if(!url) url = $(this).data('rel');
            if(!url) return false;

            target.attr('rel', url);

            target.load(url, function()
            {
                if(target.hasClass('modal'))
                {
                    $.ajustModalPosition('fit', target);
                }
                callback && callback();
            });

            return false;
        });
    },

    /**
     * Set ajax jsoner.
     *
     * @param string   selector
     * @param object   callback
     */
    setAjaxJSONER: function(selector, callback)
    {
        $(document).on('click', selector, function()
        {
            /* Try to get the href of current element, then try it's data-rel attribute. */
            url = $(this).attr('href');
            if(!url) url = $(this).data('rel');
            if(!url) return false;
            
            $.getJSON(url, function(response)
            {
                /* If set callback, call it. */
                if($.isFunction(callback)) return callback(response);

                /* If the response has message attribute, show it in #responser or alert it. */
                if(response.message)
                {
                    if($('#responser').length)
                    {
                        $('#responser').html(response.message);
                        $('#responser').addClass('text-info f-12px');
                        $('#responser').show().delay(3000).fadeOut(100);
                    }
                    else
                    {
                        bootbox.alert(response.message);
                    }
                }

                /* If the response has locate param, locate the browse. */
                if(response.locate) return location.href = response.locate;

                /* If target and source returned in reponse, update target with the source. */
                if(response.target && response.source)
                {
                    $(response.target).load(response.source);
                }
            });

            return false;
        });
    },

    /**
     * Set ajax deleter.
     * 
     * @param  string $selector 
     * @access public
     * @return void
     */
    setAjaxDeleter: function (selector)
    {
        $(document).on('click', selector, function()
        {
            var deleter = $(this);
            bootbox.confirm(v.lang.confirmDelete, function(result)
            {
                if(result)
                {
                    deleter.text(v.lang.deleteing);

                    $.getJSON(deleter.attr('href'), function(data) 
                    {
                        if(data.result == 'success')
                        {
                            if(deleter.parents('#ajaxModal').size())
                            {
                                if(typeof(data.locate) != 'undefined' && data.locate)
                                {
                                    $('#ajaxModal').attr('rel', data.locate).load(data.locate);
                                }
                                else
                                {
                                    $.reloadAjaxModal(1200);
                                }
                            }
                            else
                            {
                                if(typeof(data.locate) != 'undefined' && data.locate)
                                {
                                    location.href = data.locate;
                                }
                                else
                                {
                                    location.reload();
                                }
                            }
                            return true;
                        }
                        else
                        {
                            alert(data.message);
                        }
                    });
                }
                return true;
           });
           return false;
        });
    },

    /**
     * Set reload deleter.
     * 
     * @param  string $selector 
     * @access public
     * @return void
     */
    setReloadDeleter: function (selector)
    {
        $(document).on('click', selector, function()
        {
            if(confirm(v.lang.confirmDelete))
            {
                var deleter = $(this);
                deleter.text(v.lang.deleteing);

                $.getJSON(deleter.attr('href'), function(data) 
                {
                    if(data.result == 'success')
                    {
                        var table     = $(deleter).closest('table');
                        var replaceID = table.attr('id');

                        table.wrap("<div id='tmpDiv'></div>");
                        $('#tmpDiv').load(document.location.href + ' #' + replaceID, function()
                        {   
                            $('#tmpDiv').replaceWith($('#tmpDiv').html());
                            if(typeof sortTable == 'function')
                            {   
                                sortTable(); 
                            }   
                            else
                            {   
                                $('.colored').colorize();
                                $('tfoot td').css('background', 'white').unbind('click').unbind('hover');
                            }   
                        });
                    }
                    else
                    {
                        alert(data.message);
                    }
                });
            }
            return false;
        });
    },

    /**
     * Set reload.
     * 
     * @param  string $selector 
     * @access public
     * @return void
     */
    setReload: function (selector)
    {
        $(document).on('click', selector, function()
        {
            var reload = $(this);
            $.getJSON(reload.attr('href'), function(data) 
            {
                if(data.result == 'success')
                {
                    var table     = $(reload).closest('table');
                    var replaceID = table.attr('id');

                    table.wrap("<div id='tmpDiv'></div>");
                    $('#tmpDiv').load(document.location.href + ' #' + replaceID, function()
                    {   
                        $('#tmpDiv').replaceWith($('#tmpDiv').html());
                        if(typeof sortTable == 'function')
                        {   
                            sortTable(); 
                        }   
                        else
                        {   
                            $('.colored').colorize();
                            $('tfoot td').css('background', 'white').unbind('click').unbind('hover');
                        }   
                    });
                }
                else
                {
                    alert(data.message);
                }
            });
            return false;
        });
    },

    /**
     * Reload ajax modal.
     *
     * @param int duration 
     * @access public
     * @return void
     */
    reloadAjaxModal: function(duration)
    {
        if(typeof(duration) == 'undefined') duration = 1000;
        setTimeout(function()
        { 
            var url = $('#ajaxModal').attr('rel') || $('#ajaxModal').attr('ref');
            $('#ajaxModal .modal-body').load(url + ' .modal-body', function()
            {
                $(this).find('.modal-dialog').css('width', $(this).data('width'));
                $.ajustModalPosition('fit', '#ajaxModal');
            });
        }, duration);
    }
});

/**
 * Resize image's max width and max height to made it center and middle.
 *
 * @param   int   maxWidth
 * @param   int   maxHeight
 * @return void
 */
(function($) 
{
    jQuery.fn.resizeImage = function(maxWidth, maxHeight)
    { 
        container = $(this).parent();
        parentWidth  = parseInt(container.width());
        parentHeight = parseInt(container.height());

        if(isNaN(maxWidth)) maxWidth   = parentWidth;
        if(isNaN(maxHeight)) maxHeight = parentHeight;
        
        $(this).css('max-width',  maxWidth);
        $(this).css('max-height', maxHeight);

        return true;
    };
})(jQuery);

/**
 * Create link. 
 * 
 * @param  string $moduleName 
 * @param  string $methodName 
 * @param  string $vars 
 * @param  string $viewType 
 * @access public
 * @return string
 */
function createLink(moduleName, methodName, vars, viewType)
{
    if(!viewType) viewType = config.defaultView;
    if(vars)
    {
        vars = vars.split('&');
        for(i = 0; i < vars.length; i ++) vars[i] = vars[i].split('=');
    }
    if(config.requestType == 'PATH_INFO')
    {
        link = config.webRoot + moduleName + config.requestFix + methodName;
        if(vars)
        {
            if(config.pathType == "full")
            {
                for(i = 0; i < vars.length; i ++) link += config.requestFix + vars[i][0] + config.requestFix + vars[i][1];
            }
            else
            {
                for(i = 0; i < vars.length; i ++) link += config.requestFix + vars[i][1];
            }
        }
        link += '.' + viewType;
    }
    else
    {
        link = config.router + '?' + config.moduleVar + '=' + moduleName + '&' + config.methodVar + '=' + methodName + '&' + config.viewVar + '=' + viewType;
        if(vars) for(i = 0; i < vars.length; i ++) link += '&' + vars[i][0] + '=' + vars[i][1];
    }
    return link;
}

/**
 * Set required fields, add star class to them.
 *
 * @access public
 * @return void
 */
function setRequiredFields()
{
    if(!config.requiredFields) return false;
    requiredFields = config.requiredFields.split(',');
    for(i = 0; i < requiredFields.length; i++)
    {
        $('#' + requiredFields[i]).closest('td,th').prepend("<div class='required required-wrapper'></div>");
        var colEle = $('#' + requiredFields[i]).closest('[class*="col-"]');
        if(colEle.parent().hasClass('form-group')) colEle.addClass('required');
    }
}

/**
 * Set language.
 * 
 * @access public
 * @return void
 */
function selectLang(lang)
{
    $.cookie('lang', lang, {expires:config.cookieLife, path:config.webRoot});
    location.href = removeAnchor(location.href);
}

/**
 * Remove anchor from the url.
 * 
 * @param  string $url 
 * @access public
 * @return string
 */
function removeAnchor(url)
{
    pos = url.indexOf('#');
    if(pos > 0) return url.substring(0, pos);
    return url;
}

/**
 * Ping to keep login 
 * 
 * @access public
 * @return void
 */
function ping()
{
    $.get(createLink('misc', 'ping'));
}
needPing = true;
if(config.runMode != 'admin') needPing = false;

/**
 * Set 'go to top' button
 * 
 * @access public
 * @return void
 */
function setGo2Top()
{
    if(!$('#go2top').length) return;

    $(window).scroll(function()
    {
        if($(window).scrollTop() < 100) $('#go2top').fadeOut(); else $('#go2top').fadeIn();
    }).resize(function ()
    {
        var parent = $('#go2top').closest('.page-container');
        $('#go2top').css('left', parent.offset().left + parent.width() + 30);
    }).scroll().resize();

    $('#go2top').tooltip({container: 'body', placement: 'left'})
        .click(function(){$('body,html').animate({scrollTop:0},400); return false;});
 }


/**
 * Auto ajust block grid and size.
 * 
 * @access public
 * @return void
 */
function autoBlockGrid()
{
    $('.block-list > .row > .col-auto').each(function()
    {
        var col = $(this);
        if(col.data('handled')) return;

        var row      = col.closest('.row');
        var cols     = row.children("[class*='col-']");
        var dGrid    = row.attr('data-default-grid') || 4;
        var count    = cols.length;

        if(count == row.children('.col-auto').length)
        {
            if(count <= 3)
            {
                cols.attr('class', 'col-auto col-md-' + (12/count)).attr('data-grid', 12/count);
            }
            else
            {
                cols.attr('class', 'col-auto col-md-' + dGrid).attr('data-grid', dGrid);
            }
            cols.data('handled', true);
        }
        else
        {
            col.attr('class', 'col-auto col-md-' + dGrid).attr('data-grid', dGrid).data('handled', true);
        }
    });

    $('.block-list .panel-block .cards').each(function()
    {
        var $this = $(this);
        var parentGrid = $this.closest('[class*="col-"]').parent().closest('[class*="col-"]').data('grid') || 12;
        var grid = parentGrid * $this.closest('[class*="col-"]').data('grid') / 12,
            cards = $this.find('[class*="col-"]'),
            layout = $this.data('layout');

        if(layout == 'horizontal') cards.attr('class', 'col-md-3 col-sm-4 col-xs-6');
        else if(layout == 'vertical') cards.attr('class', 'col-lg-12');
        else
        {
            if(grid >= 9) cards.attr('class', 'col-md-4 col-sm-6');
            else if(grid >= 5) cards.attr('class', 'col-md-6');
            else cards.attr('class', 'col-md-12');
        }
    });

    /* ajust block height */
    var lastWidth = 0, winWidth;
    function ajustBlockHeight()
    {
        winWidth = $('body').width();
        if(winWidth == lastWidth) return;
        lastWidth = winWidth;
        ajustRowHeight($(".block-list > .row > [class*='col-'] > .row"), true);
        ajustRowHeight($('.block-list > .row'), false);
    }

    function ajustRowHeight($rows, isSub)
    {
        var $blocks = $rows.children("[class*='col-']").children('.panel-block, .row');
        if(!$blocks.length) return;

        if(winWidth < 992)
        {
            $blocks.css('height', 'auto');
        }
        else
        {
            $blocks.data('height', 0);

            $rows.each(function()
            {
                var nextRow = 0, sum = 0, row = 0, grid;
                $(this).children("[class*='col-']").each(function()
                {
                    var col  = $(this);
                        row  = nextRow;
                        grid = parseInt(col.data('grid'));
                    sum += grid;
                    if(grid  == 12)
                    {
                        if(sum > 12 || nextRow > 0)
                        {
                            row++;
                        }
                        nextRow = row + 1;
                        sum = 0;
                    }
                    else if(sum == 12)
                    {
                        nextRow = row + 1;
                        sum = 0;
                    }
                    else if(sum > 12)
                    {
                        row++;
                        nextRow = row;
                        sum = grid;
                    }
                    col.attr('data-row', row);
                });
            });

            $blocks.each(function()
            {
                var block = $(this);
                if(block.data('height')) return;

                var row    = block.closest('.row'),
                    col    = block.parent();
                if(col.data('grid') == 12)
                {
                    block.data('height', 'auto');
                    block.css('height', 'auto');
                    return;
                }
                var rowNo  = col.data('row');
                var height = 0;
                row.children("[data-row='" + rowNo + "']")
                   .each(function()
                    {
                        height = Math.max($(this).children('.row').outerHeight() - 20, Math.max($(this).children('.panel-block').outerHeight(), height));
                    })
                   .children('.panel-block')
                   .css('height', height).data('height', height);
            });
        }
    }

    $(window).resize(ajustBlockHeight);

    setTimeout(ajustBlockHeight, 500);
}
