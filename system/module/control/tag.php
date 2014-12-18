<?php
/**
 * The control file of tag module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     tag
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class tag extends control
{
    /**
     * Admin tags.
     * 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function admin($orderBy = 'rank_asc', $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $tag = $this->post->tag ? $this->post->tag : '';

        $this->view->title   = $this->lang->tag->admin;
        $this->view->pager   = $pager;
        $this->view->tags    = $this->tag->getList($tag, $orderBy, $pager);
        $this->view->orderBy = $orderBy;
        $this->display();
    }   

    /**
     * Set link for a tag.
     * 
     * @param  int    $tagID 
     * @access public
     * @return void
     */
    public function link($tagID)
    {
        if($_POST)
        {
            $link = fixer::input('post')->stripTags('link', $this->config->allowedTags->admin)->get();
            $this->dao->update(TABLE_TAG)->data($link)->autoCheck()->where('id')->eq($tagID)->exec();
            if(!dao::isError()) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->title = "<i class='icon-edit'></i> " . $this->lang->tag->editLink;
        $this->view->tag   = $this->dao->select('*')->from(TABLE_TAG)->where('id')->eq($tagID)->fetch();
        $this->display();
    }
}
