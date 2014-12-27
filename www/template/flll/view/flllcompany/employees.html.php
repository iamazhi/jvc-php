<?php include TPL_ROOT . 'common/header.html.php';?>
<?php include "./menu.html.php";?>
<div class="right-con">
    <div class="block">
      <form class="form-horizontal" method='post' data-tpl='table' data-url='companies/1/employees'>
      </form>
    </div><!--E .block-->
</div><!--E .right-con-->
<script language='javascript'>
$shema =  [
    {"header":"ID",     "key":"id"},
    {"header":"账号 ",  "key":"account"},
    {"header":"姓名",   "key":"name"},
    {"header":"手机号", "key":"phone"},
    {"header":"工号",   "key":"employee_num"},
    {"header":"生日",   "key":"birthday"},
    {"header":"性别",   "key":"gender"}
];

</script>
<?php include TPL_ROOT . 'common/json2table.html.php';?>
<?php include TPL_ROOT . 'common/footer.html.php';?>
