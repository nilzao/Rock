<?php

class Rock_Access_Dbt_Dao_RockMethods extends Rock_Access_Dbt_Dao_Gen_RockMethods
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
