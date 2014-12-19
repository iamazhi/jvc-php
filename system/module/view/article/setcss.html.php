<?php include commonModel::get('header.modal');?>
<?php include commonModel::get('codeeditor');?>
<form id='ajaxForm' action="<?php echo inlink('setcss', "articleID=$article->id");?>" method='post'>
  <table class="table table-form">
    <tr><td><?php echo html::textarea('css', $article->css, "rows=5 class='form-control codeeditor' data-mode='css' style='height:170px'");?></td></tr>
    <tr><td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include commonModel::get('footer.modal');?>
