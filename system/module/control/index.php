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
        $this->display('flll', 'index');
    }
}
