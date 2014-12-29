<?php include TPL_ROOT . 'common/header.html.php';?>
<?php include "./menu.html.php";?>
<div class="right-con">
    <div class="block">
      <form class="form-horizontal" method='post' data-tpl='default' data-url='companies/1'>
      </form>
    </div><!--E .block-->
</div><!--E .right-con-->
<script language='javascript'>
$tpldata = {};
$tpldata.format_name_short = function () {
    return function (text, render) {
        if($tpldata.name_short == 'ffffffffff') return '公公'; return '女女';
    }
};

$tpldata.format_business_no = function () {
    return function (text, render) {
            return "oye";
    }
};
</script>
<?php include TPL_ROOT . 'common/footer.html.php';?>
