<?php include commonModel::get('header.modal');?>
<div id='recordsBox' class='comments-list'>
  <?php foreach($records as $record):?>
    <div class='comment' id="record<?php echo $record->id?>">
      <div class='content'>
        <div class='author text-primary'><span><?php echo $user->nickname;?></span> <small>[<?php echo $record->time;?>]</small></div>
        <div class='text'><span class='text-important'><?php echo $lang->wechat->message->typeList[$record->type] ?></span> &nbsp; <?php echo nl2br($record->content);?></div>
      </div>
    </div>
    <?php if(isset($record->replies)):?>
    <?php foreach($record->replies as $reply):?>
      <div class='comment comment-reply'>
        <div class='content'>
          <div class='author text-success'><span><?php echo $reply->from;?></span> <small>[<?php echo $reply->time;?>]</small></div>
          <div class='text'><?php echo nl2br($reply->content);?></div>
        </div>
      </div>
    <?php endforeach;?>
    <?php endif;?>
  <?php endforeach;?>
</div>
<?php if($public->certified):?>
<form method='post' action="<?php echo inlink('reply', "messge={$message->id}");?>" id='ajaxForm'>
  <?php echo html::hidden('referer', $this->server->http_referer); ?>
  <div id='replyBox'>
    <?php echo html::textarea('content', '', "class='form-control' rows=2");?>
    <?php echo html::submitButton($lang->wechat->message->reply);?>
  </div>
</form>
<?php endif;?>
<?php include commonModel::get('footer.modal');?>
