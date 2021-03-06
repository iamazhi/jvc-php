<?php include commonModel::get('header.admin');?>
<?php js::set('cannotRemoveAll', $lang->nav->cannotRemoveAll); ?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-location-arrow'></i> <?php echo $lang->nav->setNav;?></strong></div>
  <div class='panel-body'>
    <form class='form-inline' id='navForm' method='post'>
      <ul class='navList ulGrade1' id='navList'>
        <?php 
        foreach($navs as $nav)
        {
            echo "<li class='liGrade1'>";
            echo $this->nav->createEntry(1, $nav);
            echo "<ul class='ulGrade2 hide'>";
            if(isset($nav->children))
            {
                foreach($nav->children as $nav2)
                {
                    echo "<li class='liGrade2'>";
                    echo $this->nav->createEntry(2, $nav2);
                    echo "<ul class='ulGrade3'>";
                    if(isset($nav2->children))
                    {
                        foreach($nav2->children as $nav3)
                        {
                            echo  "<li class='liGrade3'>". $this->nav->createEntry(3, $nav3) .'</li>';
                        }
                    }
                    echo '</ul>';
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo '</li>';
        }
        ?>
      </ul>
      <div><?php echo html::a('javascript:;', $lang->save, "class='btn btn-primary submit' onclick='return submitForm()'")?></div>
    </form>
  </div>
</div>
<?php /* hidden navSource start .*/ ?>
<div id='grade1NavSource' class='hide'>
  <li class='liGrade1'>
    <?php echo $this->nav->createEntry(1);?>
    <ul class='ulGrade2'></ul>
  </li>
</div>
<div id='grade2NavSource' class='hide'>
  <ul class='ulGrade2'>
    <li class='liGrade2'>
      <?php echo $this->nav->createEntry(2);?>
      <ul class='ulGrade3'></ul>
    </li>
  </ul>
</div>
<div id='grade3NavSource' class='hide'>
  <ul class='ulGrade3'>
    <li class='liGrade3'><?php echo $this->nav->createEntry(3);?></li>
  </ul>
</div>
<?php /* hidden navSource end.*/ ?>

<?php include commonModel::get('footer.admin');?>
