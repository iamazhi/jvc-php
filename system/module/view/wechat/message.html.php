<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class="panel-heading">
    <strong><?php echo '<i class="icon-comment-alt"></i> ' . $lang->wechat->message->list;?></strong>
    <?php
    foreach($lang->wechat->message->tabList as $tab)
    {
        list($query, $text) = explode('|', $tab);
        $active = strpos($this->server->query_string, $query) == false ? '' : "class='active'";
        echo  html::a(inlink('message', $query), $text, $active);
    }
    ?>
  </div>
  <table class='table table-hover table-striped tablesorter'>
    <thead>
      <tr class='text-center'>
        <th colspan='2'><?php echo $lang->wechat->message->content;?></th>
        <th class='w-100px'><?php echo $lang->wechat->message->type;?></th>
        <th class='w-200px'><?php echo $lang->wechat->message->time;?></th>
        <th class='w-100px'><?php echo $lang->wechat->message->reply;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($messageList as $message):?>
      <tr class='text-center'>
        <td class='w-100px text-right'><?php echo $message->fromUserName . $lang->colon;?></td>
        <td class='text-left'><?php echo $message->content;?></td>
        <td><?php echo $lang->wechat->message->typeList[$message->type];?></td>
        <td><?php echo $message->time;?></td>
        <td>
          <?php if($message->type != 'unsubscribe') echo html::a(inlink('reply', "message={$message->id}"), $lang->wechat->message->reply, "data-toggle=modal");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='6'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include commonModel::get('footer.admin');?>
