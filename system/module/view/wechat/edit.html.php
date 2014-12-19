<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-edit"></i> <?php echo $lang->wechat->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p50'>
        <tr>
          <th class='w-100px'><?php echo $lang->wechat->type;?></th>
          <td><?php echo html::select('type', $lang->wechat->typeList, $public->type, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->name;?></th>
          <td><?php echo html::input('name', $public->name, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->account;?></th>
          <td><?php echo html::input('account', $public->account, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->appID;?></th>
          <td><?php echo html::input('appID', $public->appID, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->appSecret;?></th>
          <td><?php echo html::input('appSecret', $public->appSecret, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->token;?></th>
          <td><?php echo html::input('token', $public->token, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->certified;?></th>
          <td><?php echo html::radio('certified', $lang->wechat->certifiedList, $public->certified);?></td>
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
