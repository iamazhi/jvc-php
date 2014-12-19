<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('kindeditor');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-link'></i> <?php echo $lang->links->common;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->links->index;?></th> 
          <td><?php echo html::textarea('index', isset($this->config->links->index) ? htmlspecialchars($this->config->links->index) : '', "class='area-1' rows='10'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->links->all;?></th> 
          <td><?php echo html::textarea('all', isset($this->config->links->all) ? htmlspecialchars($this->config->links->all) : '', "class='area-1' rows='10'");?></td> 
        </tr>
        <tr>
          <th></th>
          <td>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
