<?php include TPL_ROOT . 'common/header.html.php';?>
<div class="box">
  <div class="container">
    <div class="cont">
      <div class="left-menu">
        <ul>
          <li class="active"><a href="##">公司信息</a></li>
          <li><a href="##">公司账户</a></li>
          <li><a href="##">公司定制历史</a></li>
          <li><a href="员工管理.html">员工管理</a></li>
          <li><a href="发送信息.html">发送信息</a></li>
          <li><a href="##">密码管理</a></li>
        </ul>
      </div><!--E .left-menu-->
      <div class="right-con">
          <div class="block">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">公司名称：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">公司简称：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">营业执照号码：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
              </div>
              <div class="form-group fz">
                <label for="inputEmail3" class="col-sm-3 control-label">负责人：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label">联系电话：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
              </div>
              <div class="form-group fz">
                <label for="inputEmail3" class="col-sm-3 control-label">联系人：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="inputEmail3">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label">联系电话：</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="办公室、手机至少选其一">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">公司地址：</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail3">
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
