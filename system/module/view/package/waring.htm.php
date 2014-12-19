<?php include commonModel::get('header.lite');?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix' title='EXTENSION'><?php echo html::icon($lang->icons['package']);?></span>
    <strong><?php echo $title;?></strong>
  </div>
</div>
<?php if($error):?>
<div class='alert alert-danger'>
  <i class='icon-info-sign'></i>
  <div class='content'>
    <h3><?php echo $lang->package->waringInstall;?></h3>
    <p><?php echo $error;?></p>
    <p class='text-center'><?php echo html::commonButton($lang->package->refreshPage, 'onclick=location.href=location.href');?></p>
  </div>
</div>
<?php endif;?>
</body>
</html>
