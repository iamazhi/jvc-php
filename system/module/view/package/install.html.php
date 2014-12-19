<?php include commonModel::get('header.modal');?>
<?php js::set('browseLink', inlink('browse'));?>
<?php if($error):?>
<div class='alert alert-default'>
  <i class='icon-remove-sign'></i>
  <div class='content'>
    <h4><?php sprintf($lang->package->installFailed, $installType);?></h4>
    <p><?php echo $error;?></p>
    <hr>
    <?php echo html::a('jaascript:;', $lang->package->refreshPage, "class='btn btn-reload'");?>
  </div>
</div>
<?php elseif(isset($license)):?>
<div class='alert'>
  <i class='icon-info-sign'></i>
  <div class='content'>
    <h4><?php echo $lang->package->license;?></h4>
    <p><?php echo html::textarea('license', $license, "class='form-control' disabled rows='15'");?></p>
    <?php echo html::a($agreeLink, $lang->package->agreeLicense, "class='btn btn-primary loadInModal'");?>
  </div>
</div>
<?php else:?>
<div class='alert'>
  <h2 class='text-center text-success'><?php echo sprintf($lang->package->installFinished, $installType);?></h2>
  <div class='text-center'>
    <?php if($type == 'template'):?>
    <?php echo html::a($this->createLink('ui', 'settemplate'), $lang->package->settemplate, "class='btn btn-primary'");?>
    <?php else:?>
    <?php echo html::a('javascript:;', $lang->package->viewInstalled, "class='btn btn-primary' onclick='return parent.location.href=v.browseLink'");?>
    <?php endif;?>
  </div>
  <?php
  echo "<h5 class='success'>{$lang->package->successInstallDB}</h5>";
  echo "<h5 class='success'>{$lang->package->successCopiedFiles}</h5>";
  echo '<pre>';
  foreach($files as $fileName => $md5)
  {
      echo "$fileName<br/>";
  }
  echo '</pre>';
  ?>
</div>
<?php endif;?>
<?php include commonModel::get('footer.modal');?>
