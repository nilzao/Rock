<?php

class Rock_Access_Dbt_Dao_RockMenu extends Rock_Access_Dbt_Dao_Gen_RockMenu
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
