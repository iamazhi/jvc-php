<?php
/**
 * The model file of thread module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     thread
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class threadModel extends model
{
    /**
     * Get a thread by id.
     * 
     * @param int    $threadID 
     * @param object $pager 
     * @access public
     * @return object
     */
    public function getById($threadID, $pager = null)
    {
        $thread = $this->dao->findById($threadID)->from(TABLE_THREAD)->fetch();
        if(!$thread) return false;

        $speaker   = array();
        $speaker[] = $thread->editor;
        $speaker   = $this->loadModel('user')->getRealNamePairs($speaker);
        $thread->editorRealname = !empty($thread->editor) ? $speaker[$thread->editor] : '';

        $thread->files = $this->loadModel('file')->getByObject('thread', $thread->id);
        return $thread;
    }

    /**
     * Get threads list.
     * 
     * @param string $board      the boards
     * @param string $orderBy    the order by 
     * @param string $pager      the pager object
     * @access public
     * @return array
     */
    public function getList($board, $orderBy, $pager = null)
    {
        if(!is_array($board))
        {
            $board = $this->loadModel('tree')->getByID($board, 'forum');
            $board = $board->id;
        }
        $threads = $this->dao->select('*')->from(TABLE_THREAD)
            ->where(1)
            ->beginIf(RUN_MODE == 'front')->andWhere('hidden')->eq('0')->fi()
            ->beginIf($board)->andWhere('board')->in($board)->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll('id');

        if(!$threads) return array();

        $this->setRealNames($threads);

        return $this->process($threads);
    }

    /**
     * Get latest threads. 
     *
     * @param string  $board  the boards
     * @param int     $count
     * @access public
     * @return array
     */
    public function getLatest($boards, $count)
    {
        if(is_array($boards))
        {
            foreach($boards as $board) $subBoard = $this->getSubBoard($board);
        }
        else
        {
            $subBoard = $this->getSubBoard($boards);
        }

        $this->app->loadClass('pager', true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, 1);

        return $this->getList($subBoard, 'addedDate_desc', $pager);
    }

    /**
     * Get stick threads.
     * 
     * @param  int    $board 
     * @access public
     * @return array
     */
    public function getSticks($board)
    {
        $globalSticks = $this->dao->select('*')->from(TABLE_THREAD)->where('stick')->eq(2)->orderBy('id desc')->fetchAll();
        $boardSticks  = $this->dao->select('*')->from(TABLE_THREAD)->where('stick')->eq(1)->andWhere('board')->eq($board)->orderBy('id desc')->fetchAll();
        $sticks       = array_merge($globalSticks, $boardSticks);

        $this->setRealNames($sticks);

        return $sticks;
    }

    /**
     * Get threads of a user.
     * 
     * @param string $account       the account
     * @param string $pager         the pager object
     * @access public
     * @return array
     */
    public function getByUser($account, $pager)
    {
        $threads = $this->dao->select('*')
            ->from(TABLE_THREAD)
            ->where('author')->eq($account)
            ->orderBy('repliedDate desc')
            ->page($pager)
            ->fetchAll('id');

        $this->setRealNames($threads);

        return $this->process($threads);
    }

    /**
     * Process threads.
     * 
     * @param  array    $threads 
     * @access public
     * @return array
     */
    public function process($threads)
    {
        foreach($threads as $thread)
        {
            /* Hide the thread or not. */
            if(RUN_MODE == 'front' and $thread->hidden and strpos($this->cookie->t, ",$thread->id,") === false) unset($threads[$thread->id]);

            /* Judge the thread is new or not.*/
            $thread->isNew = (time() - strtotime($thread->repliedDate)) < 24 * 60 * 60 * $this->config->thread->newDays;
        }

        return $threads;
    }

    /**
     * Post a thread.
     * 
     * @param  int      $board 
     * @access public
     * @return void
     */
    public function post($boardID)
    {
        $now   = helper::now();
        $isAdmin     = $this->app->user->admin == 'super';
        $canManage   = $this->canManage($boardID);
        $allowedTags = $this->app->user->admin == 'super' ? $this->config->allowedTags->admin : $this->config->allowedTags->front;

        $thread = fixer::input('post')
            ->stripTags('content,link', $allowedTags)
            ->setIF(!$canManage, 'readonly', 0)
            ->setIF(!$this->post->isLink, 'link', '')
            ->setForce('board', $boardID)
            ->setForce('author', $this->app->user->account)
            ->setForce('addedDate', $now) 
            ->setForce('editedDate', $now) 
            ->setForce('repliedDate', $now)
            ->remove('files, labels, views, replies, hidden, stick')
            ->get();

        $this->dao->insert(TABLE_THREAD)
            ->data($thread, $skip = 'captcha, uid, isLink')
            ->autoCheck()
            ->batchCheckIF(!$this->post->isLink, $this->config->thread->require->post, 'notempty')
            ->batchCheckIF($this->post->isLink, $this->config->thread->require->link, 'notempty')
            ->check('captcha', 'captcha')
            ->exec();

        $threadID = $this->dao->lastInsertID();

        $this->loadModel('file')->updateObjectID($this->post->uid, $threadID, 'thread');

        if(!dao::isError())
        {
            $this->saveCookie($threadID);
            $this->loadModel('file')->saveUpload('thread', $threadID);

            /* Update board stats. */
            $this->loadModel('forum')->updateBoardStats($boardID);

            return $threadID;
        }

        return false;
    }

    /**
     * Save the thread id to cookie.
     * 
     * @param  int     $thread 
     * @access public
     * @return void
     */
    public function saveCookie($thread)
    {
        $thread = "$thread,";
        $cookie = $this->cookie->t != false ? $this->cookie->t : ',';
        if(strpos($cookie, $thread) === false) $cookie .= $thread;
        setcookie('t', $cookie , time() + 60 * 60 * 24 * 30);
    }

    /**
     * Update thread.
     * 
     * @param  int    $threadID 
     * @access public
     * @return void
     */
    public function update($threadID)
    {
        $thread      = $this->getByID($threadID);
        $isAdmin     = $this->app->user->admin == 'super';
        $canManage   = $this->canManage($thread->board);
        $allowedTags = $this->app->user->admin == 'super' ? $this->config->allowedTags->admin : $this->config->allowedTags->front;

        $thread = fixer::input('post')
            ->setIF(!$canManage, 'readonly', 0)
            ->setIF(!$this->post->isLink, 'link', '')
            ->stripTags('content,link', $allowedTags)
            ->setForce('editor', $this->session->user->account)
            ->setForce('editedDate', helper::now())
            ->setDefault('readonly', 0)
            ->remove('files,labels, views, replies, stick, hidden')
            ->get();

        $this->dao->update(TABLE_THREAD)
            ->data($thread, $skip = 'captcha, uid, isLink')
            ->autoCheck()
            ->batchCheckIF(!$this->post->isLink, $this->config->thread->require->edit, 'notempty')
            ->batchCheckIF($this->post->isLink, $this->config->thread->require->link, 'notempty')
            ->check('captcha', 'captcha')
            ->where('id')->eq($threadID)
            ->exec();

        $this->loadModel('file')->updateObjectID($this->post->uid, $threadID, 'thread');

        if(dao::isError()) return false;

        /* Upload file.*/
        $this->loadModel('file')->saveUpload('thread', $threadID);

        return true;
    }

    /**
     * transfer thread from one board to another.
     * 
     * @param  int    $threadID 
     * @param  int    $oldBoard 
     * @param  int    $tagetBoard 
     * @access public
     * @return void
     */
    public function transfer($threadID, $oldBoard, $targetBoard)
    {
        $oldThread = $this->getByID($threadID);

        $newThread = $oldThread;
        $newThread->board = $targetBoard;

        unset($newThread->id);
        unset($newThread->editorRealname);
        unset($newThread->authorRealname);
        unset($newThread->files);

        $this->dao->insert(TABLE_THREAD)->data($newThread)->autoCheck()->exec();
        $newThreadID = $this->dao->lastInsertID();

        $oldThread->board = $oldBoard;
        $oldThread->link  = commonModel::createFrontLink('thread', 'view', "threadID=$newThreadID");
        $this->dao->update(TABLE_THREAD)->data($oldThread)->where('id')->eq($threadID)->exec();

        if(dao::isError()) return false;

        $this->loadModel('forum')->updateBoardStats($oldBoard);
        $this->loadModel('forum')->updateBoardStats($targetBoard);
        return true;
    }

    /**
     * Delete a thread.
     * 
     * @param string $threadID 
     * @access public
     * @return void
     */
    public function delete($threadID , $null = null)
    {
        $thread = $this->getByID($threadID);
        $this->dao->delete()->from(TABLE_THREAD)->where('id')->eq($threadID)->exec(false);
        $this->dao->delete()->from(TABLE_REPLY)->where('thread')->eq($threadID)->exec(false);
        if(dao::isError()) return false;

        /* Update board stats. */
        $this->loadModel('forum')->updateBoardStats($thread->board);
        return !dao::isError();
    }

    /**
     * Switch a thread's status.
     * 
     * @param  int    $threadID 
     * @access public
     * @return void
     */
    public function switchStatus($threadID)
    {
        $thread = $this->getByID($threadID);
        if($thread->hidden) $this->dao->update(TABLE_THREAD)->set('hidden')->eq(0)->where('id')->eq($threadID)->exec();
        if(!$thread->hidden) $this->dao->update(TABLE_THREAD)->set('hidden')->eq(1)->where('id')->eq($threadID)->exec();
        if(dao::isError()) return false;

        /* Update board stats. */
        $this->loadModel('forum')->updateBoardStats($thread->board);
        return !dao::isError();
    }

    /**
     * Print files of for a thread.
     * 
     * @param  object $thread 
     * @param  bool   $canManage 
     * @access public
     * @return void
     */
    public function printFiles($thread, $canManage)
    {
        if(empty($thread->files)) return false;

        $imagesHtml = '';
        $filesHtml  = '';

        foreach($thread->files as $file)
        {
            if($file->isImage)
            {
                if($file->editor) continue;
                $imagesHtml .= "<li class='file-image file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mose=left"), html::image($file->fullURL), "target='_blank' data-toggle='lightbox'");
                if($canManage) $imagesHtml .= "<span class='file-actions'>" . html::a(helper::createLink('thread', 'deleteFile', "threadID=$thread->id&fileID=$file->id"), "<i class='icon-trash'></i>", "class='deleter'") . '</span>';
                $imagesHtml .= '</li>';
            }
            else
            {
                $file->title = $file->title . ".$file->extension";
                $filesHtml .= "<li class='file file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank'");
                if($canManage) $filesHtml .= "<span class='file-actions'>" . html::a(helper::createLink('thread', 'deleteFile', "threadID=$thread->id&fileID=$file->id"), "<i class='icon-trash'></i>", "class='deleter'") . '</span>';
                $filesHtml .= '</li>';
            }
        }
        if($imagesHtml or $filesHtml) echo "<ul class='files-list clearfix'><li class='files-list-heading'>". $this->lang->thread->file . '</li>' . $imagesHtml . $filesHtml . '</ul>';
    }

    /**
     * Set the views counter + 1;
     * 
     * @param  int    $thread 
     * @access public
     * @return void
     */
    public function plusCounter($thread)
    {
        $this->dao->update(TABLE_THREAD)->set('views = views + 1')->where('id')->eq($thread)->exec();
    }

    /**
     * Update thread stats. 
     * 
     * @param  int    $threadID 
     * @access public
     * @return void
     */
    public function updateStats($threadID)
    {
        /* Get replies. */
        $replies = $this->dao->select('COUNT(id) as replies')->from(TABLE_REPLY)
            ->where('thread')->eq($threadID)
            ->andWhere('hidden')->eq('0')
            ->fetch('replies');

        /* Get replyID and repliedBy. */
        $reply = $this->dao->select('*')->from(TABLE_REPLY)
            ->where('thread')->eq($threadID)
            ->andWhere('hidden')->eq('0')
            ->orderBy('addedDate desc')
            ->limit(1)
            ->fetch();

        $data = new stdclass();
        $data->replies     = $replies;
        if($reply)
        {
            $data->repliedBy   = $reply->author;
            $data->repliedDate = $reply->addedDate;
            $data->replyID     = $reply->id;
        }

        $this->dao->update(TABLE_THREAD)->data($data)->where('id')->eq($threadID)->exec();
    }

    /**
     * Get all speakers of one thread.
     * 
     * @param  object   $thread 
     * @param  array    $replies 
     * @access public
     * @return array
     */
    public function getSpeakers($thread, $replies)
    {
        $speakers = array();
        $speakers[$thread->author] = $thread->author;
        if(!$replies) return $speakers;

        foreach($replies as $reply) $speakers[$reply->author] = $reply->author;
        return $speakers;
    }

    /**
     * print speaker.
     * 
     * @param  object   $speaker 
     * @access public
     * @return string
     */
    public function printSpeaker($speaker)
    {
        $this->app->loadLang('forum');
        if(isset($speaker->join)) $speaker->join = substr($speaker->join, 0, 10);
        if(isset($speaker->last)) $speaker->last = substr($speaker->last, 0, 10);
        $moderatorClass = ($speaker->admin == 'super' or $speaker->isModerator) ? "text-danger" : '';
        $moderatorTitle = ($speaker->admin == 'super' or $speaker->isModerator) ? "title='{$this->lang->forum->owners}'" : '';

        echo  <<<EOT
        <strong class='thread-author {$moderatorClass}' {$moderatorTitle}><i class='icon-user'></i> {$speaker->realname}</strong>
        <ul class='list-unstyled'>
          <li><small>{$this->lang->user->visits}: </small><span>{$speaker->visits}</span></li>
          <li><small>{$this->lang->user->join}: </small><span>{$speaker->join}</span></li>
          <li><small>{$this->lang->user->last}: </small><span>{$speaker->last}</span></li>
        </ul>
EOT;
    }

    /**
     * Judge the user can manage current board nor not.
     * 
     * @param  int    $boardID 
     * @param  string $users 
     * @access public
     * @return array
     */
    public function canManage($boardID, $users = '')
    {
        /* First check the user is admin or not. */
        if($this->app->user->admin == 'super') return true; 

        /* Then check the user is a moderator or not. */
        $user = ",{$this->app->user->account},";
        $board = $this->loadModel('tree')->getByID($boardID);
        $moderators = ',' . str_replace(' ', '', $board->moderators) . ',';
        $users = $moderators . str_replace(' ', '', $users) . ',';
        if(strpos($users, $user) !== false) return true;

        return false;
    }

    /**
     * Set editor tools for current user. 
     * 
     * @param  int    $boardID 
     * @param  string $page 
     * @access public
     * @return void
     */
    public function setEditor($boardID, $page)
    {
        if($this->canManage($boardID))
        {
            $this->config->thread->editor->{$page}['tools'] = 'full';
        }
    }

    /**
     * Get the moderators of one board.
     * 
     * @param string $thread 
     * @access public
     * @return string
     */
    public function getModerators($thread)
    {
        return $this->dao->select('moderators')
            ->from(TABLE_CATEGORY)->alias('t1')
            ->leftJoin(TABLE_THREAD)->alias('t2')->on('t1.id = t2.board')
            ->where('t2.id')->eq($thread)
            ->fetch('moderators');
    }

    /**
     * Set real name for author and editor of threads.
     * 
     * @param  array     $threads 
     * @access public
     * @return void
     */
    public function setRealNames($threads)
    {
        $speakers = array();
        foreach($threads as $thread)
        {
            $speakers[] = $thread->author;
            $speakers[] = $thread->editor;
            $speakers[] = $thread->repliedBy;
        }

        $speakers = $this->loadModel('user')->getRealNamePairs($speakers);

        foreach($threads as $thread) 
        {
           $thread->authorRealname    = !empty($thread->author) ? $speakers[$thread->author] : '';
           $thread->editorRealname    = !empty($thread->editor) ? $speakers[$thread->editor] : '';
           $thread->repliedByRealname = !empty($thread->repliedBy) ? $speakers[$thread->repliedBy] : '';
        }
    }

    /**
     * Get children board.
     * 
     * @param  array|int  $board 
     * @access public
     * @return array|int 
     */
    public function getSubBoard($board)
    {
        $parents  = $this->dao->select('*')->from(TABLE_CATEGORY)->where('parent')->eq(0)->andWhere('type')->eq('forum')->fetchAll('id');
        $children = $this->dao->select('*')->from(TABLE_CATEGORY)->where('parent')->ne(0)->andWhere('type')->eq('forum')->fetchAll('id');
        $parents  = array_keys($parents);
           
        if(in_array($board, $parents))
        {
            $subBoard = array();
            foreach($children as $child)
            {
                if($child->parent == $board) $subBoard[] = $child->id;
            }

            return $subBoard;
        }

        return $board;
    }
}
