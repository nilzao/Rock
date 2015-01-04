<?php

class Rock_Access_Front extends Rock_Core_Front
{

    public function __construct($controller = null, $method = null, $view = null)
    {
        $route = new Rock_Core_Route();
        $route->setVendor('Rock_Access');
        $route->setController($controller);
        $route->setMethod($method);
        $route->setView($view);
        parent::__construct($route);
        $this->go();
    }
}
