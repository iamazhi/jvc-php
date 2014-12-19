<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('chosen');?>
<div class='panel'>
  <div class="panel-heading">
    <strong><i class='icon-tags'></i> <?php echo $lang->tag->admin;?></strong>
    <div class="panel-actions">
      <form method='post' class='form-inline form-search'>
        <div class="input-group">
          <?php echo html::input('tag', $this->post->tag, "class='form-control search-query' placeholder='{$lang->tag->inputTag}'");?>
          <span class="input-group-btn">
            <?php echo html::submitButton($lang->search, "btn btn-primary"); ?>
          </span>
        </div>
      </form>
    </div>
  </div>
  <table class='table table-hover table-bordered table-striped tablesorter'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
        <th class='col-xs-3'> <?php commonModel::printOrderLink('tag',  $orderBy, $vars, $lang->tag->common);?></th>
        <th class='col-xs-1'><?php commonModel::printOrderLink('rank', $orderBy, $vars, $lang->tag->rank);?></th>
        <th>               <?php commonModel::printOrderLink('link', $orderBy, $vars, $lang->tag->link);?></th>
        <th class='col-xs-2'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tags as $tag):?>
      <tr class='text-center text-middle'>
        <td><?php echo $tag->tag;?></td>
        <td><?php echo $tag->rank;?></td>
        <td class='text-left'><?php echo $tag->link;?></td>
        <td> <?php echo html::a($this->createLink('tag', 'link', "id=$tag->id"), $lang->tag->editLink, "data-toggle='modal'"); ?> </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='4'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include commonModel::get('footer.admin');?>
