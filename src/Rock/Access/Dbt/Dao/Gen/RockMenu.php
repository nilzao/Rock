<?php

abstract class Rock_Access_Dbt_Dao_Gen_RockMenu extends Rock_Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Rock_Access_Dbt_DbConnect::getDataBase();
    }

    /**
     *
     * @return Rock_Access_Dbt_Ent_RockMenu[]
     */
    public function getAll(Rock_Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Rock_Access_Dbt_Ent_RockMenu
     */
    public function getByPk(Rock_Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }
}
