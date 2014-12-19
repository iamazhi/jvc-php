<?php include commonModel::get('header.lite');?>
<div class='container'>
  <div class='modal-dialog'>
    <?php if(isset($error)):?>
    <div class='modal-header'><strong><?php echo $lang->install->error;?></strong></div>
    <div class='modal-body'><div class='alert alert-danger'><?php echo $error;?></div></div>
    <div class='modal-footer'><?php echo html::backButton($lang->install->pre, 'btn btn-primary');?></div>
    <?php else: ?>
    <div class='modal-header'><strong><?php echo $lang->install->saveConfig;?></strong></div>
    <div class='modal-body'>
      <div class='form-group'><?php echo html::textArea('config', $result->content, "rows='10' class='form-control small'");?></div>
      <div class='alert alert-default'><?php printf($lang->install->save2File, $result->myPHP);?></div>
    </div>
    <div class='modal-footer'><?php echo html::a(inlink('step4'), $lang->install->next, "class='btn btn-primary'");?></div>
    <?php endif;?>
  </div>
</div>
<?php include './footer.html.php';?>
