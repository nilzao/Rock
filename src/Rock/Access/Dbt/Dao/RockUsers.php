<?php

class Rock_Access_Dbt_Dao_RockUsers extends Rock_Access_Dbt_Dao_Gen_RockUsers
{

    protected static $instance;

    public static function getInstance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     * @param string $email            
     * @return Rock_Access_Dbt_Ent_RockUsers
     */
    public function getByEmail($email)
    {
        $entRockUsers = new Rock_Access_Dbt_Ent_RockUsers();
        $this->query = 'SELECT * FROM ';
        $this->query .= Rock_Dbt_EntityGet::getTable($entRockUsers);
        $this->query .= ' where email = ? ';
        $this->arrayBind = array(
            $email
        );
        //$this->conn->debug = 1;
        $stmt = $this->runQuery();
        $userArray = $this->fetchList($entRockUsers, $stmt);
        if (count($userArray) > 0) {
            return $userArray[0];
        }
        return $entRockUsers;
    }
}
