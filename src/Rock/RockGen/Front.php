<?php

class Rock_RockGen_Front extends Rock_Core_Front
{

    public function __construct($controller = null, $method = null, $view = null)
    {
        $route = new Rock_Core_Route();
        $route->setVendor('RockGen');
        $route->setController($controller);
        $route->setMethod($method);
        $route->setView($view);
        parent::__construct($route);
        // if (Rock_Access_Ctr_Check::check('RockGen', $this->getCtrStr(), $this->getMethodStr())) {
        $this->go();
        // }
    }
}
