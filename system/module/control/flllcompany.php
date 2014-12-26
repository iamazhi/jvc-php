<?php
class flllcompany extends control
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('api');
    }

    public function control()
    {
        if(!empty($_POST))
        {
            $this->fetch('api', 'rest', "resources=company*{$this->app->user->id}&type=POST");
        }

        if($this->app->user->account == 'guest') $this->locate(inlink('login'));
        $this->display();
    }

    public function employees()
    {
        $this->display();
    }
}
