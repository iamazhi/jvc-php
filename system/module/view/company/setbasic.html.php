<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('kindeditor');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-building'></i> <?php echo $lang->company->setBasic;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->company->name;?></th>
          <td class='w-p50'><?php echo html::input('name', isset($this->config->company->name) ? $this->config->company->name : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->desc;?></th> 
          <td colspan='2'><?php echo html::textarea('desc',  isset($this->config->company->desc) ? htmlspecialchars($this->config->company->desc) : '', "class='form-control' rows='5'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->company->content;?></th> 
          <td colspan='2'><?php echo html::textarea('content',  isset($this->config->company->content) ? htmlspecialchars($this->config->company->content) : '', "class='form-control' rows='15'");?></td> 
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
