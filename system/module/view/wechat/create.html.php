<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->wechat->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p50'>
        <tr>
          <th class='w-100px'><?php echo $lang->wechat->type;?></th>
          <td><?php echo html::select('type', $lang->wechat->typeList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->name;?></th>
          <td><?php echo html::input('name', '', "class='form-control' placeholder='{$lang->wechat->placeholder->name}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->account;?></th>
          <td><?php echo html::input('account', '', "class='form-control' placeholder='{$lang->wechat->placeholder->account}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->token;?></th>
          <td><?php echo html::input('token', '', "class='form-control' placeholder='{$lang->wechat->placeholder->token}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->certified;?></th>
          <td><?php echo html::radio('certified', $lang->wechat->certifiedList, '0');?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
