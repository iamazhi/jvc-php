<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('kindeditor');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-globe'></i> <?php echo $lang->site->setUpload;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-120px'><?php echo $lang->site->allowUpload;?></th>
          <td><input type='checkbox' name='allowUpload' value='1' <?php if(isset($this->config->site->allowUpload) and $this->config->site->allowUpload) echo 'checked'?>/>
        </tr>
        <tr>
          <th><?php echo $lang->site->allowedFiles;?></th>
          <td colspan='2'>
            <?php echo html::textarea('allowedFiles', $this->config->file->allowed, "rows='4' class='form-control'");?>
            <span class='text-important'><?php echo $lang->site->fileAllowedRole;?></span>
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
