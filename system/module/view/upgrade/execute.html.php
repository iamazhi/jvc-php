<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog w-450px'>
    <?php if($result == 'fail'):?>
    <div class='modal-header'><h3><?php echo $lang->upgrade->fail;?></h3></div>
    <div class='modal-body'><?php echo nl2br(join('\n', $errors)); ?></div>
    <?php else:?>
    <div class='modal-body'><div class='alert alert-success text-center'><h4><?php echo $lang->upgrade->success;?></h4></div></div>
    <div class='modal-footer'><?php echo html::a('index.php', $lang->home, "class='btn btn-success'");?></div>
    <?php endif;?>
  </div>
</div>
<?php include commonModel::get('footer');?>
