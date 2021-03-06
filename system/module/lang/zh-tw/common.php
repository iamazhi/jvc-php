<?php
/**
 * The common simplified chinese file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青島息壤網絡信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     chanzhiEPS
 * @version     $Id$
 * @link        http://www.zentao.net
 */
/* Common sign setting. */
$lang->colon      = '：';
$lang->prev       = '‹';
$lang->next       = '›';
$lang->laquo      = '&laquo;';
$lang->raquo      = '&raquo;';
$lang->minus      = ' - ';
$lang->dollarSign = '￥';
$lang->divider    = "<span class='divider'>{$lang->raquo}</span> ";
$lang->back2Top   = '返回頂部';

/* Lang items for xirang. */
$lang->chanzhiEPS     = '蟬知企業門戶系統';
$lang->chanzhiEPSx    = '蟬知';
$lang->agreement      = "已閲讀並同意<a href='http://api.chanzhi.org/goto.php?item=license' target='_blank'>《蟬知企業門戶系統使用協議》</a>。<span class='text-danger'>未經許可，不得去除蟬知系統的任何標誌及連結。</span>";
$lang->poweredBy      = " <span id='poweredBy'><a href='http://www.chanzhi.org/?v=%s' target='_blank' title='%s'><i class='icon icon-chanzhi'></i> %s</a></span>";
$lang->poweredByAdmin = "<span id='poweredBy'>由 <a href='http://www.chanzhi.org/?v=%s' target='_blank' title='%s'>蟬知企業門戶系統 %s</a> 強力驅動！</span>";
$lang->newVersion     = "提示：蟬知系統已于 <span id='releaseDate'></span> 發佈 <span id='version'></span>版本。<a href='' target='_blank' id='upgradeLink'>馬上下載</a>";

/* Global lang items. */
$lang->home           = '首頁';
$lang->welcome        = '歡迎您，<strong>%s</strong>！';
$lang->messages       = "<strong><i class='icon-comment-alt'></i> %s</strong>";
$lang->todayIs        = '今天是%s，';
$lang->aboutUs        = '關於我們';
$lang->link           = '友情連結';
$lang->frontHome      = '前台';
$lang->forumHome      = '論壇';
$lang->bookHome       = '手冊';
$lang->dashboard      = '用戶中心';
$lang->register       = '註冊';
$lang->logout         = '退出';
$lang->login          = '登錄';
$lang->account        = '帳號';
$lang->password       = '密碼';
$lang->changePassword = '修改密碼';
$lang->forgotPassword = '忘記密碼?';
$lang->currentPos     = '當前位置';
$lang->categoryMenu   = '分類導航';
$lang->wechatTip      = '微信訂閲';
$lang->qrcodeTip      = '移動訪問';
   
/* Global action items. */
$lang->reset          = '重置';
$lang->edit           = '編輯';
$lang->copy           = '複製';
$lang->hide           = '隱藏';
$lang->delete         = '刪除';
$lang->close          = '關閉';
$lang->save           = '保存';
$lang->confirm        = '確認';
$lang->preview        = '預覽';
$lang->goback         = '返回';
$lang->search         = '搜索';
$lang->more           = '更多';
$lang->actions        = '操作';
$lang->feature        = '未來';
$lang->year           = '年';
$lang->loading        = '稍候...';
$lang->saveSuccess    = '保存成功';
$lang->setSuccess     = '設置成功';
$lang->sendSuccess    = '發送成功';
$lang->deleteSuccess  = '刪除成功';
$lang->fail           = '失敗';
$lang->noResultsMatch = '沒有匹配的選項';
$lang->alias          = '搜索引擎優化使用，可使用英文或數字';

$lang->setOkFile = <<<EOT
<h5>請按照下面的步驟操作以確認您的管理員身份。</h5>
<p>創建 %s 檔案。如果存在該檔案，使用編輯軟件打開，重新保存一遍。</p>
EOT;

/* Items for javascript. */
$lang->js = new stdclass();
$lang->js->confirmDelete = '您確定要執行刪除操作嗎？';
$lang->js->deleteing     = '刪除中';
$lang->js->doing         = '處理中';
$lang->js->loading       = '加載中';
$lang->js->timeout       = '網絡超時,請重試';

/* Contact fields*/
$lang->company = new stdclass();
$lang->company->contactUs = '聯繫我們';
$lang->company->contacts  = '聯繫人';
$lang->company->address   = '地址';
$lang->company->phone     = '電話';
$lang->company->email     = 'Email';
$lang->company->fax       = '傳真';
$lang->company->qq        = 'QQ';
$lang->company->weibo     = '微博';
$lang->company->weixin    = '微信';
$lang->company->wangwang  = '旺旺';
$lang->company->site      = '網址';

/* Sitemap settings. */
$lang->sitemap = new stdclass();
$lang->sitemap->common = '站點地圖';

/* The main menus. */
$lang->menu = new stdclass();
$lang->menu->admin    = '首頁|admin|index|';
$lang->menu->article  = '文章|article|admin|';
$lang->menu->blog     = '博客|article|admin|type=blog';
$lang->menu->product  = '產品|product|admin|';
$lang->menu->book     = '手冊|book|admin|';
$lang->menu->page     = '單頁|article|admin|type=page';
$lang->menu->forum    = '論壇|forum|admin|';
$lang->menu->site     = '站點|site|setbasic|';
$lang->menu->ui       = '界面|ui|setlogo|';
$lang->menu->company  = '公司|company|setbasic|';
$lang->menu->user     = '會員|user|admin|';
$lang->menu->feedback = '反饋|message|admin|';
$lang->menu->package  = '擴展|package|browse|';

/* Menu groups setting. */
$lang->menuGroups = new stdclass();
$lang->menuGroups->tag     = 'site';
$lang->menuGroups->mail    = 'site';
$lang->menuGroups->nav     = 'site';
$lang->menuGroups->links   = 'site';
$lang->menuGroups->wechat  = 'site';
$lang->menuGroups->block   = 'ui';
$lang->menuGroups->slide   = 'ui';
$lang->menuGroups->tree    = 'article';
$lang->menuGroups->message = 'feedback';

/* Menu of article module. */
$lang->article = new stdclass();
$lang->article->menu = new stdclass();
$lang->article->menu->browse = '所有文章|article|admin|';

/* Menu of blog module. */
$lang->blog = new stdclass();
$lang->blog->menu = new stdclass();
$lang->blog->menu->browse = '所有博客|article|admin|type=blog';

/* Menu of page module. */
$lang->page = new stdclass();
$lang->page->menu = new stdclass();
$lang->page->menu->browse = array('link' => '單頁列表|article|admin|type=page', 'alias' => 'edit');
$lang->page->menu->create = '添加單頁|article|create|type=page';

/* Menu of product module. */
$lang->product = new stdclass();
$lang->product->menu = new stdclass();
$lang->product->menu->browse = array('link' => '所有產品|product|admin|', 'alias' => 'create, edit');

/* Menu of UI module. */
$lang->ui = new stdclass();
$lang->ui->menu = new stdclass();
$lang->ui->menu->logo    = 'Logo設置|ui|setlogo|';
$lang->ui->menu->favicon = '網站表徵圖|ui|setfavicon|';
$lang->ui->menu->slide   = array('link' => '幻燈片設置|slide|admin|', 'alias' => 'create,edit');
$lang->ui->menu->theme   = '模板設置|ui|settemplate|';
$lang->ui->menu->admin   = array('link' => '區塊管理|block|admin|', 'alias' => 'create,edit');
$lang->ui->menu->pages   = array('link' => '佈局設置|block|pages|', 'alias' => 'setregion');
$lang->ui->menu->styles  = '全局樣式|ui|setbasestyle|';

/* Menu of user module. */
$lang->user = new stdclass();
$lang->user->menu = new stdclass();
$lang->user->menu->all    = '全部會員|user|admin|';
$lang->user->menu->sina   = '微博會員|user|admin|provider=sina';
$lang->user->menu->wechat = '微信會員|user|admin|provider=wechat';
$lang->user->menu->qq     = 'QQ會員|user|admin|provider=qq';
$lang->user->menu->admin  = '管理員|user|admin|admin=1';

/* Menu of comment module. */
$lang->feedback = new stdclass();
$lang->feedback->menu = new stdclass();
$lang->feedback->menu->message = '留言|message|admin|type=message';
$lang->feedback->menu->comment = '評論|message|admin|type=comment';
$lang->feedback->menu->answer  = '回覆|message|admin|type=reply';
$lang->feedback->menu->thread  = '主題|forum|admin|tab=feedback';
$lang->feedback->menu->reply   = '回帖|reply|admin|order=id_desc&tab=feedback';
$lang->feedback->menu->wechat  = '微信|wechat|message|mode=replied&replied=0';

$lang->message = new stdclass();
$lang->message->menu = $lang->feedback->menu;

/* Menu of forum module. */
$lang->forum = new stdclass();
$lang->forum->menu = new stdclass();
$lang->forum->menu->browse = '主題列表|forum|admin|';
$lang->forum->menu->reply  = '回帖列表|reply|admin|';
$lang->forum->menu->tree   = '版塊管理|tree|browse|type=forum';
$lang->forum->menu->update = '更新數據|forum|update|';

/* Menu of site module. */
$lang->site = new stdclass();
$lang->site->menu = new stdclass();
$lang->site->menu->basic    = '站點設置|site|setbasic|';
$lang->site->menu->nav      = '導航設置|nav|admin|';
$lang->site->menu->upload   = '上傳設置|site|setupload|';
$lang->site->menu->tag      = '關鍵詞設置|tag|admin|';
#$lang->site->menu->robots   = 'Robots|site|setrobots|';
$lang->site->menu->oauth    = '開放登錄|site|setoauth|';
$lang->site->menu->link     = '友情連結|links|admin|';
$lang->site->menu->mail     = array('link' => '發信設置|mail|admin|', 'alias' => 'detect,edit,save,test');
$lang->site->menu->wechat   = array('link' => '微信設置|wechat|admin|', 'alias' => 'create, edit, adminresponse');

/* Menu of company module. */
$lang->company->menu = new stdclass();
$lang->company->menu->basic   = '公司信息|company|setbasic|';
$lang->company->menu->contact = '聯繫方式|company|setcontact|';

/* Menu of tree module. */
$lang->tree = new stdclass();
$lang->tree->menu = $lang->article->menu;

/* Menu of tag module. */
$lang->tag = new stdclass();
$lang->tag->menu = $lang->site->menu;

/* Menu of mail module. */
$lang->mail = new stdclass();
$lang->mail->menu = $lang->site->menu;

/* Menu of reply module. */
$lang->reply = new stdclass();
$lang->reply->menu = $lang->forum->menu;

/* Menu of wechat module. */
$lang->wechat = new stdclass();
$lang->wechat->menu = $lang->site->menu;

/* Menu of nav module. */
$lang->nav = new stdclass();
$lang->nav->menu = $lang->site->menu;

/* Menu of tree module. */
$lang->slide = new stdclass();
$lang->slide->menu = $lang->ui->menu;

/* Menu of block module. */
$lang->block = new stdclass();
$lang->block->menu = $lang->ui->menu;

/* Menu of tree module. */
$lang->links = new stdclass();
$lang->links->menu = $lang->site->menu;

/* Menu of package module. */
$lang->package = new stdclass();

/* The error messages. */
$lang->error = new stdclass();
$lang->error->length       = array('<strong>%s</strong>長度錯誤，應當為<strong>%s</strong>', '<strong>%s</strong>長度應當不超過<strong>%s</strong>，且不小於<strong>%s</strong>。');
$lang->error->reg          = '<strong>%s</strong>不符合格式，應當為:<strong>%s</strong>。';
$lang->error->unique       = '<strong>%s</strong>已經有<strong>%s</strong>這條記錄了。';
$lang->error->notempty     = '<strong>%s</strong>不能為空。';
$lang->error->equal        = '<strong>%s</strong>必須為<strong>%s</strong>。';
$lang->error->gt           = "<strong>%s</strong>應當大於<strong>%s</strong>。";
$lang->error->ge           = "<strong>%s</strong>應當不小於<strong>%s</strong>。";
$lang->error->lt           = "<strong>%s</strong>應當小於<strong>%s</strong>。";
$lang->error->le           = "<strong>%s</strong>應當不大於<strong>%s</strong>。";
$lang->error->in           = '<strong>%s</strong>必須為<strong>%s</strong>。';
$lang->error->int          = array('<strong>%s</strong>應當是數字。', '<strong>%s</strong>最小值為%s',  '<strong>%s</strong>應當介於<strong>%s-%s</strong>之間。');
$lang->error->float        = '<strong>%s</strong>應當是數字，可以是小數。';
$lang->error->email        = '<strong>%s</strong>應當為合法的EMAIL。';
$lang->error->URL          = '<strong>%s</strong>應當為合法的URL。';
$lang->error->date         = '<strong>%s</strong>應當為合法的日期。';
$lang->error->account      = '<strong>%s</strong>應當為字母和數字的組合，至少三位';
$lang->error->passwordsame = '兩次密碼應當相等。';
$lang->error->passwordrule = '密碼應該符合規則，長度至少為六位。';
$lang->error->captcha      = '請輸入正確的驗證碼。';
$lang->error->noWritable   = '%s 可能不可寫，請修改權限！';
$lang->error->token        = '必須為英文或數字，長度為3-32字元！';

/* The pager items. */
$lang->pager = new stdclass();
$lang->pager->noRecord   = "暫時沒有記錄";
$lang->pager->digest     = "共 <strong>%s</strong> 條記錄，%s <strong>%s/%s</strong> &nbsp; ";
$lang->pager->recPerPage = "每頁 <strong>%s</strong> 條";
$lang->pager->first      = "<i class='icon-step-backward' title='首頁'></i>";
$lang->pager->pre        = "<i class='icon-play icon-rotate-180' title='上一頁'></i>";
$lang->pager->next       = "<i class='icon-play' title='下一頁'></i>";
$lang->pager->last       = "<i class='icon-step-forward' title='末頁'></i>";
$lang->pager->locate     = "GO!";

$lang->date = new stdclass();
$lang->date->minute = '分鐘';
$lang->date->day    = '天';

/* The datetime settings. */
define('DT_DATETIME1',  'Y-m-d H:i:s');
define('DT_DATETIME2',  'y-m-d H:i');
define('DT_MONTHTIME1', 'n/d H:i');
define('DT_MONTHTIME2', 'n月d日 H:i');
define('DT_DATE1',     'Y年m月d日');
define('DT_DATE2',     'Ymd');
define('DT_DATE3',     'Y年m月d日');
define('DT_DATE4',     'Y-m-d');
define('DT_TIME1',     'H:i:s');
define('DT_TIME2',     'H:i');

/* Keywords for chanzhi. */
$lang->k  = '蟬知門戶，開源免費的企業建站系統!;';
$lang->k .= '蟬知門戶，開源免費的cms!;';
$lang->k .= '蟬知門戶，免費建站首選！;';
$lang->k .= '蟬知門戶，企業網站建設專家！;';
$lang->k .= '蟬知門戶，開源php企業建站系統！;';
$lang->k .= '蟬知門戶，微網站專家！;';
$lang->k .= '蟬知門戶，微網站首選！;';
$lang->k .= '蟬知門戶，微信營銷首選！';
