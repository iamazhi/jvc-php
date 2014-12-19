<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('kindeditor');?>
<?php include commonModel::get('chosen');?>
<?php 
js::set('root', $root);
js::set('type', $type);
js::set('isWechatMenu', $isWechatMenu);
js::set('lang', $lang->js);
?>
<?php if(strpos($treeMenu, '<li>') !== false):?>
<div class='row'>
  <div class='col-md-4'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-sitemap"></i> <?php echo $lang->category->common;?></strong></div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
        <?php if($isWechatMenu):?>
        <div class='panel-body'>
          <?php echo html::a($this->createLink('wechat', 'commitMenu', "public=" . str_replace('wechat_', '', $type)), $lang->wechatMenu->commit, "class='btn btn-primary jsoner'");?>
          <?php echo html::a($this->createLink('wechat', 'deleteMenu', "public=" . str_replace('wechat_', '', $type)), $lang->wechatMenu->delete, "class='btn btn-danger jsoner'");?>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class='col-md-8' id='categoryBox'></div>
</div>
<?php else:?>
<div id='categoryBox'></div>
<?php endif;?>
<?php include commonModel::get('treeview');?>
<?php include commonModel::get('footer.admin');?>
