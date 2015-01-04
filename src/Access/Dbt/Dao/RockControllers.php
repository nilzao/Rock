<?php

class Access_Dbt_Dao_RockControllers extends Access_Dbt_Dao_Gen_RockControllers
{

    protected static $instance;

    public static function getInstance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
