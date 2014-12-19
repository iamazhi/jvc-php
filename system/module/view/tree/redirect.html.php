<?php include commonModel::get('header.admin');?>

<div class='form-group'>
<div class='col-xs-6 col-md-6 col-md-offset-3 alert'>
  <i class='icon-info-sign'></i>
  <div class='content'>
    <h4><?php echo $message; ?></h4>
    <p><?php echo $lang->tree->timeCountDown; ?></p>
    <?php echo html::a($this->createLink('tree', 'browse', "type=$type"), $lang->tree->redirect, "class='btn btn-primary' id='countDownBtn'"); ?>
  </div>
</div>
</div>

<?php include commonModel::get('footer.admin');?>
