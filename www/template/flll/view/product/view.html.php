<?php
/**
 * The view file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php 
include TPL_ROOT . 'common/header.html.php'; 
include TPL_ROOT . 'common/treeview.html.php'; 

/* set categoryPath for topNav highlight. */
js::set('path',  $product->path);
js::set('productID', $product->id);
js::set('categoryID', $category->id);
js::set('categoryPath', explode(',', trim($category->path, ',')));
css::internal($product->css);
js::execute($product->js);
?>
<?php $common->printPositionBar($category, $product);?>
<div class='row'>
  <div class='col-md-9 col-main'>
    <div class='panel panel-body panel-product'>
      <div class='row'>
        <?php if(!empty($product->image->list)):?>
        <div class='col-md-5'>
          <div class='product-image media-wrapper'>
            <?php $title = $product->image->primary->title ? $product->image->primary->title : $product->name;?>
            <?php echo html::image($product->image->primary->middleURL, "title='{$title}' alt='{$product->name}'");?>
          </div>
          <?php if(count($product->image->list) > 1):?>
          <div class='product-image-menu row'>
            <?php foreach($product->image->list as $image):?>
            <?php $title = $image->title ? $image->title : $product->name;?>
            <div class='col-md-3 col-sm-2 col-xs-2'>
              <div class='product-image little-image'>
                <?php echo html::image($image->smallURL, "title='{$title}' alt='{$product->name}'");?>
              </div>
            </div>
            <?php endforeach;?>
          </div>
          <?php endif;?>
        </div>
        <div class='col-md-7'>
        <?php else:?>
        <div class='col-md-12'>
        <?php endif;?>
          <div class='product-property<?php echo empty($product->image->list) ? ' product-lack-img' : '';?>'>
            <h1 class='header-dividing'><?php echo $product->name;?></h1>
            <ul class='list-unstyled meta-list'>
              <?php
              $attributeHtml = '';
              if($product->promotion != 0)
              {
                  if($product->price != 0)
                  {
                      $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->price . "</span>";
                      $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <del><strong class='text-latin'>" . $product->price . "</del></strong></span></li>";
                  }
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->promotion . "</span>";
                  $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <strong class='text-danger text-latin text-lg'>" . $product->promotion . "</strong></span></li>";
              }
              else if($product->price != 0)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->price . "</span>";
                  $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <strong class='text-important text-latin text-lg'>" . $product->price . "</strong></span></li>";
              }
              if($product->amount)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->amount . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $product->amount . " <small>" . $product->unit . "</small></span></li>";
              }
              if($product->brand)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->brand . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $product->brand . " <small>" . $product->model . "</small></span></li>";
              }
              if($product->color)
              {
                $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->color . "</span>";
                $attributeHtml .= "<span class='meta-value'>" . $product->color . "</span></li>";
              }
              if($product->origin)
              {
                $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->origin . "</span>";
                $attributeHtml .= "<span class='meta-value'>" . $product->origin . "</span></li>";
              }
              foreach($product->attributes as $attribute)
              {
                  if(empty($attribute->label) and empty($attribute->value)) continue;
                  $attributeHtml .= "<li><span class='meta-name'>" . $attribute->label . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $attribute->value . "</span></li>";
              }
              if(empty($attributeHtml)) echo '<p class="product-summary">' . $product->desc . '</p>';
              echo $attributeHtml;
              ?>
            </ul>
            <?php if($product->mall):?>
            <hr>
            <div class='btn-buy'>
            <?php echo html::a($product->mall, $lang->product->buyNow, "class='btn btn-lg btn-primary' target='_blank'");?>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
      <h5 class='header-dividing'><i class='icon-file-text-alt text-muted'></i> <?php echo $lang->product->content;?></h5>
      <div class='article-content'>
        <?php echo $product->content;?>
      </div>
      <div class="article-files">
        <?php $this->loadModel('file')->printFiles($product->files);?>
      </div>
    </div>
    <div id='comments'>
      <div id='commentBox'></div>
      <?php echo html::a('', '', "name='comment'");?>
    </div>
  </div>
  <div class='col-md-3 col-side'>
    <side class='page-side'><?php $this->block->printRegion($layouts, 'product_view', 'side');?></side>
  </div>
</div>
<?php include TPL_ROOT . 'common/footer.html.php'; ?>
