<?php

class Rock_Access_Dbt_Dao_RockUsersGroups extends Rock_Access_Dbt_Dao_Gen_RockUsersGroups
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
