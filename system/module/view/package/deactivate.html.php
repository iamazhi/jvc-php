<?php include commonModel::get('header.modal');?>
<div class='alert alert-success'>
  <i class='icon-ok-sign'></i>
  <div class='content'>
    <h3><?php echo $title;?></h3>
    <?php if($removeCommands):?>
    <p><strong><?php echo $lang->package->unremovedFiles;?></strong></p>
    <p><?php echo join($removeCommands, '<br />');?></p>
    <?php endif;?>
    <div class='text-center'><?php echo html::a(inlink('browse', 'type=deactivated'), $lang->package->viewDeactivated, "class='btn'");?></div>
  </div>
</div>
<?php include commonModel::get('footer.modal');?>
