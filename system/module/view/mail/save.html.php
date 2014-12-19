<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-envelope'></i> <?php echo $lang->mail->common;?> <i class='icon-arrow-right'></i> <?php echo $lang->mail->save; ?></strong></div>
  <div class='panel-body'>
    <div class='alert alert-success'>
      <i class='icon-ok-sign'></i>
      <div class='content'><?php echo $lang->mail->successSaved; ?></div>
    </div>
    <div><?php if($this->post->turnon) echo html::linkButton($lang->mail->test, inlink('test')); ?></div>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
