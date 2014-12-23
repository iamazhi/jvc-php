<?php
include TPL_ROOT . 'common/header.html.php';
js::import($jsRoot . 'md5.js');
js::set('random', $this->session->random);
?>
<div class="box" id='login'>
  <div class="container">
    <div class="cont contf">
      <div class="loginbox">
        <form class="form-horizontal" role="form" id='ajaxForm'>
          <div class='form-group hiding'><div id='formError' class='alert alert-danger'></div></div>
          <div class="form-group">
            <label class="col-sm-3 control-label">用户名：</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="account" placeholder="姓名">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">密码：</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password" placeholder="密码">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">手机验证码：</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="verifyCode" placeholder="手机验证码">
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-default">发送验证码</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <label class="radio-inline">
                <input type="radio" name="role" value="person"> 个人登录
              </label>
              <label class="radio-inline">
                <input type="radio" name="role" value="company" checked> 公司登录
              </label>
            </div>
          </div>
          <div class="form-group margint">
            <div class="col-sm-offset-1 col-sm-10">
              <?php echo html::submitButton($lang->user->login->common, 'btn btn-danger btn-block');?>
              <?php echo html::hidden('referer', $referer);?>
            </div>
          </div>
        </form>
      </div><!--E .loginbox-->
    </div><!--E .cont-->
  </div>
</div><!--E .box-->
<?php include TPL_ROOT . 'common/footer.html.php';?>
