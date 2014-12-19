<?php include commonModel::get('header.lite');?>
<form method='post' action='<?php echo inlink('execute');?>'>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->confirm;?></h3>
    </div>
    <div class='modal-body'>
      <div class='mg-10px'><?php echo html::textarea('', $confirm, "rows='10' class='w-p100 borderless'");?></div>
    </div>
    <div class='modal-footer'>
      <?php echo html::submitButton($lang->upgrade->execute) . html::hidden('fromVersion', $fromVersion);?>
    </div>
  </div>
</div>
</form>
<?php include commonModel::get('footer');?>
