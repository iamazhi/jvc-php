<?php
/**
 * The site module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->site->common        = "Site";

$lang->site->type          = 'Type';
$lang->site->status        = 'Status';
$lang->site->name          = 'Name';
$lang->site->module        = 'Modules';
$lang->site->lang          = 'Language';
$lang->site->domain        = 'Domain';
$lang->site->keywords      = 'Site Keywords';
$lang->site->indexKeywords = 'Index Keywords';
$lang->site->meta          = 'Meta';
$lang->site->desc          = 'Description';
$lang->site->icpSN         = 'ICP';
$lang->site->icpLink       = 'ICP Link';
$lang->site->slogan        = 'Slogan';
$lang->site->mission       = 'Mission';
$lang->site->copyright     = 'Copyright';
$lang->site->allowUpload   = 'Allow upload files';
$lang->site->allowedFiles  = 'Allowed file types';

$lang->site->setBasic      = "Baisc";
$lang->site->setUpload     = "Upload";
$lang->site->setRobots     = "Robots";
$lang->site->setOauth      = "Oauth";
$lang->site->setSinaOauth  = "Weibo Oauth";
$lang->site->setQQOauth    = "QQ Oauth";
$lang->site->oauthHelp     = "Help";

$lang->site->typeList = new stdclass();
$lang->site->typeList->portal = 'Portal';
$lang->site->typeList->blog   = 'Blog';

$lang->site->statusList = new stdclass();
$lang->site->statusList->normal = 'Normal';
$lang->site->statusList->pause  = 'Pause';

$lang->site->moduleAvailable = array();
$lang->site->moduleAvailable['user']    = 'Member';
$lang->site->moduleAvailable['forum']   = 'Forum';
$lang->site->moduleAvailable['blog']    = 'Blog';
$lang->site->moduleAvailable['book']    = 'Book';
$lang->site->moduleAvailable['message'] = 'Message';

$lang->site->fileAllowedRole   = 'Use "," to divide different extension name.';

$lang->site->robots            = 'Robots';
$lang->site->robotsUnwriteable = 'Can not write robots file, please make sure %s writeable first.';
$lang->site->reloadForRobots   = 'Reload this ppage';
