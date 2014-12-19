<?php include commonModel::get('header.lite');?>
<form method='post' action='<?php echo inlink('confirm');?>'>
<div class='container'>
  <div class='modal-dialog'>
    <div class='modal-header'>
      <h3><?php echo $lang->upgrade->selectVersion;?></h3>
    </div>
    <div class='modal-body'>
      <div class='form-group'>
        <?php 
          echo html::select('fromVersion', $lang->upgrade->fromVersions, $version, "class='form-control single-input'");
          echo "&nbsp;&nbsp;<span class='text-danger help-inline'>{$lang->upgrade->versionNote}</span>";
        ?>
      </div>
    </div>
    <div class='modal-footer'>
      <?php echo html::submitButton($lang->upgrade->common);?>
    </div>
  </div>
</div>
</form>
<?php include commonModel::get('footer');?>
