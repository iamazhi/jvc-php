<?php include TPL_ROOT . 'common/header.html.php';?>
<div class="box">
  <div class="container">
    <div class="cont">
      <?php include './side.html.php';?>
      <div class="right-con">
          <div class="block">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-sm-3 control-label">公司名称：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->name;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">公司简称：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->name_short;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">营业执照号码：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->business_no;?>">
                </div>
              </div>
              <div class="form-group fz">
                <label class="col-sm-3 control-label">负责人：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->principal;?>">
                </div>
                <label class="col-sm-2 control-label">联系电话：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->principal_phone;?>">
                </div>
              </div>
              <div class="form-group fz">
                <label class="col-sm-3 control-label">联系人：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->contacts;?>">
                </div>
                <label class="col-sm-2 control-label">联系电话：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->contacts_phone;?>" placeholder="办公室、手机至少选其一">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">公司地址：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" value="<?php echo $this->app->user->address;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">关联公司：</label>
                  <button type="submit" class="btn btn-success">+增加</button>
              </div>
              <div class="form-group lh">
                <label for="inputEmail3" class="col-sm-3 control-label">1.</label>
                <div class="col-sm-3">
                  <input type="email" class="form-control" id="inputEmail3">
                </div> 关系（为本公司的上级公司、平级公司、下级公司）
              </div>
              <div class="form-group margint">
                <div class="col-sm-offset-4 col-sm-4">
                  <button type="submit" class="btn btn-danger btn-block">保 存</button>
                </div>
              </div>
            </form>
          </div><!--E .block-->
      </div><!--E .right-con-->
    </div><!--E .cont-->
  </div>
</div><!--E .box-->

<?php include TPL_ROOT . 'common/footer.html.php';?>
