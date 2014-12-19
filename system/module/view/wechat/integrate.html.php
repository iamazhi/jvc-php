<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong class='text-info'><i class="icon-plus-sign"></i> <?php echo $lang->wechat->integrateInfo;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' action="<?php echo inlink('edit', "publicID={$public->id}");?>">
      <table class='table table-form w-p50'>
       <tr>
          <th><?php echo $lang->wechat->token;?></th>
          <td><?php echo $public->token;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->url;?></th>
          <td><?php echo $public->url;?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton($lang->wechat->integrateDone);?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
