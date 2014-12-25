<?php
/* Init the rights. */
$config->rights = new stdclass();

/* For guest users. */
$config->rights->guest['index']['index']    = 'index';

$config->rights->guest['article']['index']  = 'index';
$config->rights->guest['article']['browse'] = 'browse';
$config->rights->guest['article']['view']   = 'view';

$config->rights->guest['blog']['index']  = 'index';
$config->rights->guest['blog']['view']   = 'view';

$config->rights->guest['product']['index']  = 'index';
$config->rights->guest['product']['browse'] = 'browse';
$config->rights->guest['product']['view']   = 'view';

$config->rights->guest['company']['index']   = 'index';
$config->rights->guest['company']['contact'] = 'contact';

$config->rights->guest['links']['index'] = 'index';

$config->rights->guest['forum']['index'] = 'index';
$config->rights->guest['forum']['board'] = 'board';

$config->rights->guest['thread']['view']   = 'view';
$config->rights->guest['thread']['post']   = 'post';
$config->rights->guest['thread']['locate'] = 'locate';

$config->rights->guest['message']['index']   = 'index';
$config->rights->guest['message']['comment'] = 'show';
$config->rights->guest['message']['notify']  = 'notify';
$config->rights->guest['message']['post']    = 'post';
$config->rights->guest['message']['reply']   = 'reply';

$config->rights->guest['book']['index']  = 'index';
$config->rights->guest['book']['browse'] = 'browse';
$config->rights->guest['book']['read']   = 'read';

$config->rights->guest['user']['login']         = 'login';
$config->rights->guest['user']['register']      = 'register';
$config->rights->guest['user']['oauthlogin']    = 'oauthlogin';
$config->rights->guest['user']['oauthcallback'] = 'oauthcallback';
$config->rights->guest['user']['oauthregister'] = 'oauthregister';
$config->rights->guest['user']['oauthbind']     = 'oauthbind';
$config->rights->guest['user']['message']       = 'message';

$config->rights->guest['rss']['index']       = 'index';
$config->rights->guest['sitemap']['index']   = 'index';

$config->rights->guest['file']['download']    = 'download';
$config->rights->guest['file']['printfiles']  = 'printfiles';

$config->rights->guest['error']['index'] = 'index';

$config->rights->guest['page']['index'] = 'index';
$config->rights->guest['page']['view']  = 'view';

$config->rights->guest['misc']['qrcode'] = 'qrcode';

/* For logged member. */
$config->rights->member['thread']['post']         = 'post';
$config->rights->member['thread']['reply']        = 'reply';
$config->rights->member['thread']['edit']         = 'edit';
$config->rights->member['thread']['switchstatus'] = 'switchstatus';
$config->rights->member['thread']['stick']        = 'stick';
$config->rights->member['thread']['delete']       = 'delete';
$config->rights->member['thread']['transfer']     = 'transfer';
$config->rights->member['thread']['deletefile']   = 'deletefile';

$config->rights->member['reply']['post']       = 'post';
$config->rights->member['reply']['eidt']       = 'edit';
$config->rights->member['reply']['hide']       = 'hide';
$config->rights->member['reply']['delete']     = 'delete';
$config->rights->member['reply']['deletefile'] = 'deletefile';

$config->rights->member['user']['control'] = 'control';
$config->rights->member['user']['profile'] = 'profile';
$config->rights->member['user']['edit']    = 'edit';
$config->rights->member['user']['logout']  = 'logout';
$config->rights->member['user']['thread']  = 'thread';
$config->rights->member['user']['reply']   = 'reply';
$config->rights->member['user']['message'] = 'message';

$config->rights->member['file']['ajaxupload'] = 'ajaxupload';

$config->rights->member['message']['view']        = 'view';
$config->rights->member['message']['batchdelete'] = 'batchdelete';

/* added by azhi. */
/* For guest flll.*/
$config->rights->guest['flll']['index']    = 'index';
$config->rights->guest['flll']['good']     = 'good';
$config->rights->guest['flll']['wallet']   = 'wallet';
$config->rights->guest['flll']['message']  = 'message';
$config->rights->guest['flll']['download'] = 'download';

$config->rights->guest['api']['rest']   = 'rest';
$config->rights->guest['api']['login']  = 'login';
$config->rights->guest['api']['get']    = 'get';
$config->rights->guest['api']['post']   = 'post';
$config->rights->guest['api']['put']    = 'put';
$config->rights->guest['api']['delete'] = 'delete';

$config->rights->guest['flllcompany']['control']  = 'control';
$config->rights->guest['flllemployee']['control'] = 'control';
