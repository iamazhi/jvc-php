  </div></div><?php /* end .page-content then .page-wrapper in header.html.php */ ?>
  <?php if(RUN_MODE == 'front') $this->loadModel('block')->printRegion($layouts, 'all', 'bottom');?>
  <footer id='footer'>
    <div class='wrapper'>
      <div id='footNav'>
        <?php echo html::a(helper::createLink('rss', 'index', '', '', 'xml') . '?type=blog', '<i class="icon icon-rss-sign icon-large"></i>', "target='_blank'"); ?>
      </div>
      <span id='copyright'>
        <?php
        $copyright = empty($config->site->copyright) ? '' : $config->site->copyright . '-';
        echo "&copy; {$copyright}" . date('Y') . ' ' . $config->company->name . '&nbsp;&nbsp;';
        ?>
      </span>
      <span id='icpInfo'><?php echo $config->site->icpSN; ?></span>
      <div id='powerby'>
        <?php printf($lang->poweredBy, $config->version, k(), $config->version);?>
      </div>
    </div>
  </footer>
</div><?php /* end .page-container in header.html.php */ ?>
<?php include commonModel::get('qrcode');?>
<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);
?>
<?php if(RUN_MODE == 'front') $this->loadModel('block')->printRegion($layouts, 'all', 'footer');?>
</body>
</html>
