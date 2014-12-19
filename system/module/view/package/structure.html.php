<?php include commonModel::get('header.modal');?>
<?php 
$appRoot = $this->app->getAppRoot();
$files   = json_decode($package->files);
echo '<pre>';
foreach($files as $file => $md5) echo $appRoot . $file . "<br />";
echo '</pre>';
?>  
<?php include commonModel::get('footer.modal');?>
