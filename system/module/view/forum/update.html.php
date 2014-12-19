<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-refresh'></i> <?php echo $lang->forum->update;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' enctype='multipart/form-data'>
      <div class='form-group'>
        <label><?php echo $lang->forum->updateDesc;?></label>
      </div>
      <div class='from-group'><?php echo html::submitButton($lang->forum->update) . html::hidden('action', 'update');?></div>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
