<?php

class Rock_DbtGen_Front extends Rock_Core_Front
{

    public function __construct($controller = null, $method = null, $view = null)
    {
        $route = new Rock_Core_Route();
        $route->setVendor('DbtGen');
        $route->setController($controller);
        $route->setMethod($method);
        $route->setView($view);
        parent::__construct($route);
        // if (Rock_Access_Ctr_Check::check('DbtGen', $this->getCtrStr(), $this->getMethodStr())) {
        $this->go();
        // }
    }
}
