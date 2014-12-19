<?php $config->block->editor->blockform =  array('id' => 'content', 'tools' => 'full', 'filterMode' => false); ?>
<?php include commonModel::get('kindeditor', 2);?>
<tr>
  <th><?php echo $lang->block->content;?></th>
  <td><?php echo html::textarea('content', isset($block->content->content) ? htmlspecialchars($block->content->content) : '', 'rows=20 class=form-control');?></td>
</tr>
