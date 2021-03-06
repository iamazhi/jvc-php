<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->package->common;?></strong>
    <?php
    echo '&nbsp; &nbsp; &nbsp;';
    echo html::a(inlink('browse', "status=installed"),   $lang->package->installed,   $status == 'installed' ? "class='active'" : '');
    echo html::a(inlink('browse', "status=deactivated"), $lang->package->deactivated, $status == 'deactivated' ? "class='active'" : '');
    echo html::a(inlink('browse', "status=available"), $lang->package->available,   $status == 'available' ? "class='active'" : '');
    ?>
    <div class='panel-actions'>
      <?php echo html::a(inlink('upload'), $lang->package->upload, "class='btn btn-primary' data-toggle='modal'");?>
      <?php echo html::a(inlink('obtain'), $lang->package->obtain, "class='btn btn-primary'");?>
    </div>
  </div>
  <div class='panel-body'>
  <div class='cards'>
    <?php foreach($packages as $package):?>
    <div class='col-md-6'><div class='card'>
      <div class='card-heading'><strong><?php echo $package->name;?></strong></div>
      <div class='card-content text-muted'><?php echo $package->desc;?></div>
        <div class='card-actions'>
          <div class='pull-right'>
            <div class='btn-group'>
              <?php
              $structureCode  = html::a(inlink('structure',  "package=$package->code"), $lang->package->structure,  "class='btn' data-toggle='modal'");
              $deactivateCode = html::a(inlink('deactivate', "package=$package->code"), $lang->package->deactivate, "class='btn' data-toggle='modal'");
              $activateCode   = html::a(inlink('activate',   "package=$package->code"), $lang->package->activate,   "class='btn' data-toggle='modal'");
              $uninstallCode  = html::a(inlink('uninstall',  "package=$package->code"), $lang->package->uninstall,  "class='btn' data-toggle='modal'");
              $installCode    = html::a(inlink('install',    "package=$package->code"), $lang->package->install,    "class='btn' data-toggle='modal'");
              $eraseCode      = html::a(inlink('erase',      "package=$package->code"), $lang->package->erase,      "class='btn' data-toggle='modal'");
              
              if(isset($package->viewLink))
              {
                  echo html::a($package->viewLink, $lang->package->view, "class='btn package'");
              }
              if($package->status == 'installed')
              {
                  echo $structureCode;
              }
              if($package->status == 'installed' and !empty($package->upgradeLink))
              {
                  echo html::a($package->upgradeLink, $lang->package->upgrade, "class='btn iframe'");
              }
   
              if($package->type != 'patch')
              {
                  if($package->status == 'installed')   echo $deactivateCode . $uninstallCode;
                  if($package->status == 'deactivated') echo $activateCode   . $uninstallCode;
                  if($package->status == 'available')   echo $installCode    . $eraseCode;
              }
              echo html::a($package->site, $lang->package->site, 'class=btn');
              ?>          
            </div>
          </div>
          <?php
          echo "{$lang->package->version}: <i>{$package->version}</i> ";
          echo "{$lang->package->author}:  <i>{$package->author}</i> ";
          ?>
        </div>
      </div></div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
