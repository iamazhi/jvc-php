<?php js::import($jsRoot . 'jquery/htmltemplate/min.js');?>
<script>
$(document).ready(function()
{
    $.loadHtmlTpl(config['currentModule'], config['currentMethod']); //added by azhi
});
</script>
