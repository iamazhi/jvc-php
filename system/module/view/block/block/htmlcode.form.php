<?php include commonModel::get('codeeditor', 2);?>
<style>
body.codeeditor-fullscreen .form-action {position: fixed; bottom: 5px; left: 50px; z-index: 1105; width: 300px}
</style>
<tr>
  <th><?php echo $lang->block->htmlcode;?></th>
  <td><?php echo html::textarea('content', isset($block) ? $block->content : '', "rows=20 class='form-control codeeditor'");?></td>
</tr>
