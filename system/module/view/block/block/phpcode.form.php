<?php
/**
 * The php code block form view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php include '../../common/view/codeeditor.html.php';?>
<style>
body.codeeditor-fullscreen .form-action {position: fixed; bottom: 5px; left: 50px; z-index: 1105; width: 300px}
</style>
<tr>
  <th><?php echo $lang->block->phpcode;?></th>
  <td><?php echo html::textarea('content', isset($block) ? $block->content : '<?php', "rows=20 class='form-control codeeditor' data-mode='php'");?></td>
</tr>
