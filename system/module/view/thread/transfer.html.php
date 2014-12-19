<?php include commonModel::get('header.modal');?>
<?php js::set('parents', $parents);?>
<?php js::set('currentBoard', $thread->board);?>
<form id='ajaxForm' class='form-horizontal' action='<?php echo inlink('transfer', "threadID={$thread->id}")?>'  method='post'>
  <div class='form-group'>
    <label for='link' class='col-xs-2 control-label'><?php echo $lang->thread->board;?></label>
    <div class='col-xs-8'>
      <?php echo html::select('targetBoard', $boards, '', "class='form-control chosen'");?>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-xs-2'></div>
    <div class='col-xs-8'>
      <?php echo html::submitButton();?>
    </div>
  </div>
</form>
<?php include commonModel::get('footer.modal');?>
