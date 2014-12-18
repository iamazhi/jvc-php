<?php include '../common/header.admin.html.php';?>
<div class='container' id='shortcutBox'>

  <?php if(strpos($this->server->php_self, '/admin.php') !== false && empty($this->config->global->ignoreAdminEntry)):?>
  <form method='post' id='ajaxForm' action='<?php echo $this->createLink('admin', 'ignore');?>'>
    <div class="alert alert-danger">
      <button type="submit" class="close">&times;</button>
      <strong><?php echo $lang->admin->adminEntry;?></strong>
    </div>
  </form>
  <?php endif;?>

  <?php if(!$ignoreUpgrade):?>
  <div class='alert alert-success' id='upgradeNotice'>
    <div>
      <?php echo $lang->newVersion;?>
      <button class="close"><?php echo html::a(inlink('ignoreUpgrade'), '&times;', "class='reload'");?></button>
    </div>
  </div>
  <?php endif;?>

  <div class='row'>
    <div class='col-md-4 col-sm-6'> 
      <div class="shortcut article-admin">
        <?php echo html::a($this->createLink('article', 'create'), '<h3>' . $lang->admin->shortcuts->article . '</h3>')?>
      </div>
    </div>
    <div class='col-md-4 col-sm-6'>
      <div class="shortcut product-admin">
        <?php echo html::a($this->createLink('product', 'create'), '<h3>' . $lang->admin->shortcuts->product . '</h3>')?>
      </div>
    </div>
    <div class='col-md-4 col-sm-6'>
      <div class="shortcut feedback-admin">
        <?php echo html::a($this->createLink('message', 'admin'), '<h3>' . $lang->admin->shortcuts->feedback . '</h3>')?>
      </div>
    </div>
    <div class='col-md-4 col-sm-6'>
      <div class="shortcut site-admin">
        <?php echo html::a($this->createLink('site', 'setBasic'), '<h3>' . $lang->admin->shortcuts->site . '</h3>')?>
      </div>
    </div>
    <div class='col-md-4 col-sm-6'>
      <div class="shortcut company-admin">
        <?php echo html::a($this->createLink('company', 'setBasic'), '<h3>' . $lang->admin->shortcuts->company . '</h3>')?>
      </div>
    </div>
    <div class='col-md-4 col-sm-6'>
      <div class="shortcut contact-admin">
        <?php echo html::a($this->createLink('company', 'setcontact'), '<h3>' . $lang->admin->shortcuts->contact . '</h3>')?>
      </div>
    </div>
  </div>
</div>
<?php include '../common/footer.admin.html.php';?>
