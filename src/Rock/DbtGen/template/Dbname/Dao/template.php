<?php

class Dbt_DBGROUP_Dao_TABLENAMECLASS extends Dbt_DBGROUP_Dao_Gen_TABLENAMECLASS
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
