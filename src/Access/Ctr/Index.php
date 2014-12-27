<?php

class Access_Ctr_Index implements Rock_Core_IController
{

    private $vendorFrm = 'Sample';

    private $ctrFrm = 'Index';

    private $methodFrm = 'handle';

    private $viewError = array();

    public function handle()
    {
        $data = array(
            'vendor' => $this->vendorFrm,
            'ctr' => $this->ctrFrm,
            'method' => $this->methodFrm,
            'vwError' => $this->viewError
        );
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Index', $data);
    }

    public function loginForm($vendor, $ctr, $method, array $vwError = array())
    {
        $this->vendorFrm = $vendor;
        $this->ctrFrm = $ctr;
        $this->methodFrm = $method;
        $this->viewError = $vwError;
        $this->handle();
    }
}
