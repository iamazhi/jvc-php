<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-globe'></i> <?php echo $lang->site->setRobots;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
       <tr>
          <td><?php echo html::textarea('robots', $robots, "rows='4' class='form-control'");?></td>
        </tr>
        <tr>
          <td>
            <?php if($writeable):?>
            <?php echo html::submitButton();?>
            <?php else:?>
            <div class='text-danger'><?php printf($lang->site->robotsUnwriteable, $robotsFile);?>
            <?php echo html::a('javascript:location.reload();', $lang->site->reloadForRobots, "class='btn btn-primary btn-sm'");?>
            </div>
            <?php endif;?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
