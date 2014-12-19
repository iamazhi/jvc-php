<?php include commonModel::get('chosen', 2);?>
<?php $categories = $this->loadModel('tree')->getOptionMenu('article');?>
<tr>
  <th><?php echo $lang->block->categories;?></th>
  <td><?php echo html::select('params[category][]', $categories, isset($block->content->category) ? $block->content->category : '', "class='text-4 form-control chosen' multiple='multiple'");?></td>
</tr>
<tr>
  <th><?php echo $lang->block->limit;?></th>
  <td><?php echo html::input('params[limit]', isset($block->content->limit) ? $block->content->limit : '', "class='text-4 form-control'");?></td>
</tr>
<tr>
  <th><?php echo $lang->block->showImage;?></th>
  <td><input type='checkbox' name='params[image]' <?php if(isset($block->content->image) && $block->content->image) echo 'checked';?> value='1' /></td>
</tr>
<tr>
  <th><?php echo $lang->block->showTime;?></th>
  <td><input type='checkbox' name='params[time]' <?php if(isset($block->content->time) && $block->content->time) echo 'checked';?> value='1' /></td>
</tr>
