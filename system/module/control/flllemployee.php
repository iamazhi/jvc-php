<?php
class flllemployee extends control
{
    public function control()
    {
        if($this->app->user->account == 'guest') $this->locate(inlink('login'));
        $this->view->tpldata = $this->app->user;
        $this->display();
    }
}
