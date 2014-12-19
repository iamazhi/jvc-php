<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-globe'></i> <?php echo $lang->ui->setFavicon;?></strong>
    <?php echo html::a('http://api.chanzhi.org/goto.php?item=help_favicon', "<i class='icon-question-sign'></i> {$lang->ui->favicon->help}", "class='pull-right' target='_blank'");?>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' enctype='multipart/form-data'>
      <table class='table table-form'>
        <tr>
          <?php if(isset($this->config->site->favicon)) echo '<td>' . html::image($favicon->webPath) . '</td>';?>
          <td><input type='file' name='files' id='files' class='form-control'></td>
          <td><?php echo html::submitButton();?><?php if($favicon) echo html::a(inlink('deleteFavicon'), $lang->reset, "class='btn'");?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
