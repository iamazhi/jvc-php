<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog w-450px'>
    <form method='post' class='form-horizontal'>
      <?php if(isset($error)):?>
      <div class='modal-header'><strong><?php echo $lang->install->error;?></strong></div>
      <div class='modal-body'>
        <div class='alert alert-danger'><?php echo $error;?></div>
      </div>
      <div class='modal-footer'><?php echo html::backButton($lang->install->pre, 'btn btn-primary');?></div>
      <?php else: ?>
      <div class='modal-header'><strong><i class='icon-key'></i> <?php echo $lang->install->setAdmin;?></strong></div>
      <div class='modal-body'>
        <div class='form-group'>
          <label for='account' class='col-xs-2 control-label'><?php echo $lang->install->account;?></label>
          <div class='col-xs-8'><?php echo html::input('account', '', "class='form-control'");?></div>
        </div>
        <div class='form-group'>
          <label for='password' class='col-xs-2 control-label'><?php echo $lang->install->password;?></label>
          <div class='col-xs-8'><?php echo html::input('password', '', "class='form-control'");?></div>
        </div>
      </div>
      <div class='modal-footer'><?php echo html::submitButton();?></div>
      <?php endif; ?>
    </form>
  </div>
</div>
<?php include './footer.html.php';?>
