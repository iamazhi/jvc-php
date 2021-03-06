<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php include TPL_ROOT . 'common/header.lite.html.php';?>

<?php $this->block->printRegion($layouts, 'all', 'top');?>
<?php $topNavs = $this->loadModel('nav')->getNavs('top');?>
<div class='header'>
  <div class='container'>
    <div class="comp-name">均豪</div>
    <div class="logo">
      <?php $logo = json_decode($this->config->site->logo);?>
      <?php echo html::image($logo->webPath, "class='logo' title='{$this->config->company->name}'");?>
    </div><!--E .logo-->

    <div class='navbox'>
      <ul class='nav navbar-nav'>
        <?php foreach($topNavs as $nav1):?>
          <?php if(empty($nav1->children)):?>
            <li class='<?php echo $nav1->class?>'><?php echo html::a($nav1->url, $nav1->title, !empty($nav1->target) ? "target='$nav1->target'" : '');?></li>
            <?php else: ?>
              <li class="dropdown <?php echo $nav1->class?>">
                <?php echo html::a($nav1->url, $nav1->title . " <b class='caret'></b>", 'class="dropdown-toggle" data-toggle="dropdown" ' . (!empty($nav1->target) ? "target='$nav1->target'" : ''));?>
                <ul class='dropdown-menu' role='menu'>
                  <?php foreach($nav1->children as $nav2):?>
                    <?php if(empty($nav2->children)):?>
                      <li class='<?php echo $nav2->class?>'><?php echo html::a($nav2->url, $nav2->title, !empty($nav2->target) ? "target='$nav2->target'" : '');?></li>
                    <?php else: ?>
                      <li class='dropdown-submenu <?php echo $nav2->class?>'>
                        <?php echo html::a($nav2->url, $nav2->title, !empty($nav2->target) ? "target='$nav2->target'" : '');?>
                        <ul class='dropdown-menu' role='menu'>
                          <?php foreach($nav2->children as $nav3):?>
                          <li><?php echo html::a($nav3->url, $nav3->title, !empty($nav3->target) ? "target='$nav3->target'" : '');?></li>
                          <?php endforeach;?>
                        </ul>
                      </li>
                    <?php endif;?>
                  <?php endforeach;?><!-- end nav2 -->
                </ul>
            </li>
          <?php endif;?>
        <?php endforeach;?><!-- end nav1 -->
      </ul>
    </div>
    <div class="userbox">
      <?php $this->loadModel('common')->printUserNav();?>                                                                                                                                                       
    </div>

  </div> <!-- container -->
</div> <!-- header -->

<div class="box">
  <div class="container">
    <div class="cont">
