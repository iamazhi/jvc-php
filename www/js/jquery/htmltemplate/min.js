$.extend(
{
    // added by azhi
    loadHtmlTpl: function(module, method)
    {
        $("[data-tpl]").each(function(){
            var $container = $(this);
            var $tpl = $container.data('tpl');

            var $query = $container.data('url');

            if($query){
              $query = $query.replace(/\//g, '*');
              var $url = '/api-rest-' + $query;

              if($tpl == 'table') return $.loadTable($container, $url);

              $.ajax({
                url: $url,
                async: false,
                success: function(data){
                  data = JSON.parse(data);
                  if(data.result == 'success'){
                    for($key in data.data) $tpldata[$key] = data.data[$key];
                  }
                }
              });
            }

            var $tplFile = 'htmltpl/' + module + '/' + method + '.html';
            if($tpl != 'default') $tplFile = 'htmltpl/' + $tpl;

            $.ajax({
              url: $tplFile,
              async: false,
              success: function(file){
                var output = Mustache.render(file, $tpldata);
                $container.html(output);
              }
            });
        })
     },
    loadTable: function($container, $url)
    {
      var $params = {'orderBy':'', 'recTtotal':0, 'recPerPage': 5, 'pageID': 1};
      $alias  = {'orderBy':'sortBy', 'recTotal':'total', 'recPerPage':'size', 'pageID':'page'};
      $.ajax({
        url: $url,
        data: $params,
        dataType: 'json',
        success: function(json) {
          $tpldata  = json.data;
          $pager = json.pager;
          example = $container.columns({
            url: $url,
            templateFile: "htmltpl/common/table.html",
            params: $params,
            alias: $alias,
            data:  $tpldata,
            pages: $pager.recTotal,
            total: $pager.recPerPage,
            plugins:['ajaxpaging'],
            schema: $shema
          });
        }
      });
    }
});
