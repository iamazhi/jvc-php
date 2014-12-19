<?php
$moduleName = isset($lang->$module->common)  ? $lang->$module->common:  $module;
$methodName = isset($lang->$module->$method) ? $lang->$module->$method: $method;
?>
<?php include commonModel::get('header.lite');?>
<div class='container w-200px'>
  <div class='alert alert-danger'>
    <h2><?php echo $app->user->account, ' ', $lang->user->deny;?></h2>
    <p> <?php printf($lang->user->errorDeny, $moduleName, $methodName);?></p>
    <p>
    <?php
     echo html::a($this->createLink($config->default->module), $lang->index->common);
     if($refererBeforeDeny) echo html::a(helper::safe64Decode($refererBeforeDeny), $lang->user->goback);
     echo html::a($this->createLink('user', 'logout', "referer=" . helper::safe64Encode($denyPage)), $lang->user->relogin);
    ?>
  </div>
</div>
</body>
</html>
