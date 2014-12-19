<?php include commonModel::get('header.modal');?>
<?php if(isset($error) and $error):?>
<div class='alert alert-danger'>
  <i class='icon-info-sign'></i>
  <div class='content'><?php $error;?></div>
</div>
<?php else:?>
<div class='alert alert-success'>
  <i class='icon-ok-sign'></i>
  <div class='content'>
    <h3><?php echo $title;?></h3>
    <p class='text-center'><?php echo html::a(inlink('browse', 'type=installed'), $lang->package->viewInstalled, "class='btn'");?></p>
  </div>
</div>
<?php endif;?>
<?php include commonModel::get('footer.modal');?>
