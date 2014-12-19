<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog w-450px'>
    <div class='modal-body'><div class='alert alert-success text-center'><h4><?php echo $lang->install->success;?></h4></div></div>
    <div class='modal-footer'><?php echo html::linkButton($lang->install->visitAdmin, 'admin.php', 'btn btn-success');?></div>
  </div>
</div>
<?php include './footer.html.php';?>
