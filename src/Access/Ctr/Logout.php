<?php

class Access_Ctr_Logout implements Rock_Core_IController
{

    public function handle()
    {
        $session = Rock_Core_Session::getInstance();
        $session->clearSession();
        $ctrIndex = new Access_Ctr_Index();
        $ctrIndex->handle();
    }
}
