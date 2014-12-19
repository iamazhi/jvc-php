<?php include commonModel::get('chosen', 2);?>
<?php $products = $this->loadModel('product')->getPairs(0);?>
<tr>
  <th><?php echo $lang->block->product;?></th>
  <td>
    <div class='row'>
      <div class='col-sm-6'>
        <?php echo html::select('params[product]', $products, isset($block->content->product) ? $block->content->product : '', "class='text-4 form-control'");?></td>
      </div>
    </div>
</tr>
