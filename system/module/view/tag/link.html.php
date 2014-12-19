<?php include commonModel::get('header.modal');?>
<form id='linkForm' class='form-horizontal' action='<?php echo inlink('link', "tageID={$tag->id}")?>'  method='post'>
  <div class='form-group'>
    <label for='link' class='col-xs-3 control-label'><?php echo $tag->tag;?></label>
    <div class='col-xs-8'>
      <?php echo html::input('link', $tag->link, "class='form-control' placeholder='{$lang->tag->inputLink}'");?>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-xs-3'></div>
    <div class='col-xs-8'>
      <?php echo html::submitButton();?>
    </div>
  </div>
</form>
<?php include commonModel::get('footer.modal');?>
