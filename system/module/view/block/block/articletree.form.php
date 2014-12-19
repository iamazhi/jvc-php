<tr>
  <th><?php echo $lang->block->category->showChildren;?></th>
  <td><?php echo html::radio('params[showChildren]', $lang->block->category->showChildrenList, isset($block->content->showChildren) ? $block->content->showChildren : 'no');?></td>
</tr>
