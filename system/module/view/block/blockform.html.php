<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
?>
<?php
$formFile = dirname(__FILE__) . '/block/' . strtolower($type) . '.form.php';
if(file_exists($formFile)) include $formFile;
?>
