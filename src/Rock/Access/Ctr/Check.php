<?php

class Rock_Access_Ctr_Check implements Rock_Core_IController
{

    public function handle()
    {
        // $vl = Rock_Core_ViewLoader::getInstance();
        // $vl->load('Index');
    }

    public static function check($vendor, $controller, $method)
    {
        // $vendor = Rock_Core_Front::getVendor();
        // verifica permissoes, abre tela de login
        $session = Rock_Core_Session::getInstance();
        // $email = $session->getSession('rock_access_email');
        $logged = $session->getSession('rock_access_logged');
        if (empty($logged)) {
            Rock_Core_Front::setVendor('Rock_Access');
            $ctrIndex = new Rock_Access_Ctr_Index();
            $ctrIndex->loginForm($vendor, $controller, $method);
            return false;
        }
        return true;
    }
}
