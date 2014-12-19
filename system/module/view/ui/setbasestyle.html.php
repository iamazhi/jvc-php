<?php include commonModel::get('header.admin');?>
<?php include commonModel::get('codeeditor');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-html5'></i> <?php echo $lang->ui->setBaseStyle;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <td><?php echo html::textarea('content', isset($content) ? $content : '', "rows=20 class='form-control codeeditor' data-mode='css'");?></td>
        </tr>
        <tr>
          <td>
            <div class='form-action'>
              <?php echo html::submitButton();?>
              <strong class="text-info">&nbsp;&nbsp;<?php echo $this->lang->ui->noStyleTag?></strong>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
