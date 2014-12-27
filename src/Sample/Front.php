<?php

class Sample_Front extends Rock_Core_Front
{

    public function __construct($controller = null, $method = null, $view = null)
    {
        $route = new Rock_Core_Route();
        $route->setVendor('Sample');
        $route->setController($controller);
        $route->setMethod($method);
        $route->setView($view);
        parent::__construct($route);
//         if (Access_Ctr_Check::check('Sample', $this->getCtrStr(), $this->getMethodStr())) {
            $this->go();
//         }
    }
}
