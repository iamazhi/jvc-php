<?php include commonModel::get('header.modal');?>
<?php if($canMange['result'] == 'success'):?>
<form method='post' enctype='multipart/form-data' id='uploadForm' action='<?php echo inlink('upload')?>'>
  <div id='responser'></div>
  <div class='input-group'>
    <input type='file' name='file' class='form-control' />
    <div class='input-group-btn'><?php echo html::submitButton($lang->package->install);?></div>
  </div>
</form>
<?php else:?>
<div>
  <?php printf($lang->setOkFile, $canMange['okFile']);?>
  <div class='text-right'><?php echo html::a($this->inlink('upload'), $lang->confirm, "class='btn btn-primary loadInModal'");?></div>
</div>
<?php endif;?>
<?php include commonModel::get('footer.modal');?>
