<?php

abstract class Access_Dbt_Dao_Gen_RockControllers extends Rock_Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Access_Dbt_DbConnect::getDataBase();
        $this->quoteFields = Access_Dbt_DbConnect::isQuotedFields();
        $this->quoteTableNames = Access_Dbt_DbConnect::isQuoteTableNames();
    }

    /**
     *
     * @return Access_Dbt_Ent_RockControllers[]
     */
    public function getAll(Rock_Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Access_Dbt_Ent_RockControllers
     */
    public function getByPk(Rock_Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }

    /**
     *
     * @return Access_Dbt_Ent_RockControllers[]
     */
    public function getFiltered(Rock_Dbt_EntityBase $entity)
    {
        return parent::getFiltered($entity);
    }
}
