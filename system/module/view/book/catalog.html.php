<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('datepicker');?>
<?php js::set('path', $node ? explode(',', $node->path) : array(0));?>
<form id='ajaxForm' method='post'>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-list-ul'></i> <?php echo $node->title . " <i class='icon-angle-right'></i> " . $lang->book->catalog;?></strong></div>
  <table class='table'>
    <thead>
      <tr class='text-center'>
        <th class='w-p10'><?php echo $lang->book->type;?></th>
        <th class='w-p10'><?php echo $lang->book->author;?></th>
        <th><?php echo $lang->book->title;?></th>
        <th class='w-300px'><?php echo $lang->book->alias;?></th>
        <th class='w-p10'><?php echo $lang->book->keywords;?></th>
        <th class='w-180px'><?php echo $lang->book->addedDate;?></th>
        <th class='w-80px'><?php echo $lang->actions; ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($children as $child):?>
      <tr class='text-center text-middle'>
        <td><?php echo html::select("type[$child->id]",     $lang->book->typeList, $child->type, "class='form-control'");?></td>
        <td><?php echo html::input("author[$child->id]",    $child->author,    "class='form-control'");?></td>
        <td><?php echo html::input("title[$child->id]",     $child->title,     "class='form-control'");?></td>
        <td><?php echo html::input("alias[$child->id]",     $child->alias,     "class='form-control'");?></td>
        <td><?php echo html::input("keywords[$child->id]",  $child->keywords,  "class='form-control'");?></td>
        <td><?php echo html::input("addedDate[$child->id]", $child->addedDate, "class='form-control date'");?></td>
        <td>
          <?php echo html::hidden("order[$child->id]", $child->order, "class='order'");?>
          <?php echo html::hidden("mode[$child->id]", 'update');?>
          <i class='icon-arrow-up'></i> <i class='icon-arrow-down'></i>
        </td>
      </tr>
      <?php endforeach;?>

      <?php for($i = 0; $i < BOOK::NEW_CATALOG_COUNT ; $i ++):?>
      <tr class='text-center text-middle'>
        <td><?php echo html::select("type[]", $lang->book->typeList, '', "class='form-control'");?></td>
        <td><?php echo html::input("author[]", $app->user->realname, "class='form-control'");?></td>
        <td><?php echo html::input("title[]", '', "class='form-control'");?></td>
        <td><?php echo html::input("alias[]", '', "class='form-control' placeholder='{$lang->alias}'");?></td>
        <td><?php echo html::input("keywords[]", '', "class='form-control'");?></td>
        <td><?php echo html::input("addedDate[]", helper::now(), "class='form-control date'");?></td>
        <td>
          <?php echo html::hidden("order[]", '', "class='order'");?>
          <?php echo html::hidden("mode[]", 'new');?>
          <i class='icon-arrow-up'></i> <i class='icon-arrow-down'></i>
        </td>
      </tr>
      <?php endfor;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='5' class='a-center'>
          <?php echo html::submitButton() . html::hidden('referer', $this->server->http_referer);?>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
</form>
<?php include commonModel::get('footer.admin');?>
