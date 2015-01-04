<?php

abstract class Access_Dbt_Dao_Gen_RockGroups extends Rock_Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Access_Dbt_DbConnect::getDataBase();
    }

    /**
     *
     * @return Access_Dbt_Ent_RockGroups[]
     */
    public function getAll(Rock_Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Access_Dbt_Ent_RockGroups
     */
    public function getByPk(Rock_Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }
}
