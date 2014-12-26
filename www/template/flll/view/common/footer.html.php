    </div><!--E .cont-->
  </div>
</div><!--E .box-->

<div class="footer">
  <div class="container">
    <a href="##">关于福利来啦</a> | <a href="##">常见问题</a> | <a href="##">服务条款</a> | <a href="##">隐私政策</a> | <a href="##">联系我们</a>        
  </div>

</div><!--E .footer-->

<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);
?>
</body>
</html>
