<?php include commonModel::get('header.modal');?>
<form id='ajaxForm' action="<?php echo inlink('currency');?>" method='post'>
  <table class="table table-form">
    <tr>
      <td><?php echo html::radio('currency', $lang->product->currencyList, isset($config->product->currency) ? $config->product->currency : '');?></td>
    </tr>
    <tr>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include commonModel::get('footer.modal');?>
