<?php include commonModel::get('header.modal');?>
  <form id='ajaxForm' action="<?php echo inlink('setregion', "page={$page}&region={$region}&template={$template}");?>" method='post'>
    <div id='blockList'>
      <?php $key = 0; foreach($blocks as $block){ echo $this->block->createEntry($template, $block, $key); $key = $this->block->counter; $key ++;}?>
    </div>
    <div><?php echo html::submitButton();?></div>
  </form>
  <div class='hide'>
    <div id='entry'><?php echo $this->block->createEntry($template, null, 'key');?></div>
    <div id='child'><?php echo $this->block->createEntry($template, null, 'key', 2);?></div>
  </div>
</div>
<div class='modal-footer'>
<?php js::set('key', $key);?>
<?php include commonModel::get('footer.admin');?>
