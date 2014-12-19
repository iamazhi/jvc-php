<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->backup;?></h3>
    </div>
    <div class='modal-body'>
      <?php printf($lang->upgrade->backupData, $db->user, $db->password, $db->name, inlink('selectVersion'));?>
      <?php if(version_compare($this->loadModel('setting')->getVersion(), 2.3) < 0):?>
      <div class='text-left'>
        <label class='checkbox'><input type='checkbox' id='agree' checked /><?php echo $lang->agreement;?></label>
      </div>
      <?php endif;?>
    </div>
    <div class='modal-footer'>
      <?php echo html::a(inlink('selectVersion'), $lang->upgrade->next, "class='btn btn-primary'");?>
    </div>
  </div>
</div>
<?php include commonModel::get('footer');?>
