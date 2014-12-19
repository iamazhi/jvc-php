<?php include commonModel::get('header.modal');?>
<?php include commonModel::get('codeeditor');?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/codeeditor.html.php';?>
<form id='ajaxForm' action="<?php echo inlink('setjs', "articleID=$article->id");?>" method='post'>
  <table class="table table-form">
    <tr><td><?php echo html::textarea('js', $article->js, "rows=5 class='form-control codeeditor' style='height:170px' data-mode='javascript'");?></td></tr>
    <tr><td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include commonModel::get('footer.modal');?>
