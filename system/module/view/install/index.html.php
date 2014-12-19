<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog'>
    <div class="modal-header text-right"><div class='btn dropdown'><?php include '../../common/view/selectlang.html.php';?></div></div>
    <div class='modal-body'>
      <h3><?php echo $lang->install->welcome;?></h3>
      <div><?php echo $lang->install->desc;?></div>
    </div>
    <div class='modal-footer'>
      <div class='text-left mgb-10'>
        <label class='checkbox-inline'><input type='checkbox' id='agree' checked='checked' /><?php echo $lang->agreement;?></label>
      </div>
      <div class='input-group'>
      <?php echo html::a($this->createLink('install', 'step1'), $lang->install->start, "class='btn btn-primary btn-install'");?>
      </div>
    </div>
  </div>
</div>
<?php include './footer.html.php';?>
