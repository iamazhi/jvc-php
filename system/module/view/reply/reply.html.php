<?php if($this->thread->hasManagePriv($this->app->user->account, $board->owners)) $config->thread->editor->editreply['tools'] = 'full'; ?>
<?php include commonModel::get('header');?>
<?php include commonModel::get('kindeditor');?>
<?php $common->printPositionBar($board, $thread);?>
<form method='post' id='ajaxForm' enctype='multipart/form-data'>
<table class='table table-form'>
  <caption><?php echo $lang->thread->editReply;?></caption>
  <tr>
    <th class='w-100px'><?php echo $lang->reply->content;?></th>
    <td>
      <?php echo html::textarea('content', htmlspecialchars($reply->content), "rows=20 class='area-1' tabindex=1");?>
    </td>
  </tr>
  <tr>
    <th><?php echo $lang->thread->file;?></th>
    <td>
    <?php
    if($reply->files)
    {
        foreach($reply->files as $file) echo html::a($file->fullURL, $file->title . '.' . $file->extension, "target='_blank'") . ' ' . html::linkButton('Ｘ', inlink('deleteFile', "fileID=$file->id&objectID=$reply->id&objectType=reply"), 'btn btn-default', '', 'hiddenwin');
    }
    echo $this->fetch('file', 'buildForm');
    ?>
    </td>
  </tr>
  <tr>
    <th></th>
    <td colspan='2' align='center'><?php echo html::submitButton('', 'btn btn-primary', 'onclick="return checkGarbage(\'content\')" tabindex=2' ) . html::backButton();?></td></tr>
</table>
</form>
<?php include commonModel::get('footer');?>
