<?php
class index extends control
{
    /**
     * Construct, must create this contruct function since there's index() also
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The index page of whole site.
     * 
     * @access public
     * @return void
     */
    public function index($categoryID = 0, $pageID = 1)
    {
        if(isset($this->config->site->type) and $this->config->site->type == 'blog')
        {
            $param = ($categoryID == 0 and $pageID == 1) ? '' : "categoryID={$categoryID}&pageID={$pageID}";
            $this->locate($this->createLink('blog', 'index', $param));
        }

        $this->view->title = $this->config->site->indexKeywords;
        $this->display();
    }
}
