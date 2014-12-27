<?php

class Access_Ctr_Login implements Rock_Core_IController
{

    private $vwErrors = array();

    public function handle()
    {
        $session = Rock_Core_Session::getInstance();
        $input = Rock_Core_Input::getInstance();
        $vendor = $input->getPost('vendor');
        $controller = $input->getPost('ctr');
        $method = $input->getPost('method');
        if(empty($vendor) || empty ($controller) || empty($method)){
            throw new Exception('Vendor, Controller ou Method');
        }
        $ajax = $input->getPost('ajax');
        $modelLogin = new Access_Model_Login();
        $vwErrors = $modelLogin->getVwErrors();
        if (count($vwErrors) === 0) {
            $session->setSession('rock_access_logged', true);
            if (empty($ajax)) {
                Rock_Core_Front::setVendor($vendor);
                $ctrStr = $vendor . '_Ctr_' . $controller;
                $ctr = new $ctrStr();
                $ctr->$method();
            } else {
                $ctrIndex = new Access_Ctr_Index();
                $ctrIndex->loginForm($vendor, $controller, $method);
            }
        } else {
            $session->setSession('rock_access_logged', false);
            $ctrIndex = new Access_Ctr_Index();
            $ctrIndex->loginForm($vendor, $controller, $method, $vwErrors);
        }
    }
}
