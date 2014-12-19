<?php include commonModel::get('header.modal');?>
<?php include commonModel::get('codeeditor');?>
<form id='ajaxForm' action="<?php echo inlink('setcss', "productID=$product->id");?>" method='post'>
  <table class="table table-form">
    <tr><td><?php echo html::textarea('css', $product->css, "rows=5 class='form-control codeeditor' data-mode='css' data-height='300px'");?></td></tr>
    <tr><td><div class='editor-actions'><?php echo html::submitButton();?></div></td></tr>
  </table>
</form>
<?php include commonModel::get('footer.modal');?>
