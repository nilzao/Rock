<?php

abstract class Rock_Access_Dbt_Dao_Gen_RockControllers extends Rock_Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Rock_Access_Dbt_DbConnect::getDataBase();
        $this->quoteFields = Rock_Access_Dbt_DbConnect::isQuotedFields();
        $this->quoteTableNames = Rock_Access_Dbt_DbConnect::isQuoteTableNames();
    }

    /**
     *
     * @return Rock_Access_Dbt_Ent_RockControllers[]
     */
    public function getAll(Rock_Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Rock_Access_Dbt_Ent_RockControllers
     */
    public function getByPk(Rock_Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }

    /**
     *
     * @return Rock_Access_Dbt_Ent_RockControllers[]
     */
    public function getFiltered(Rock_Dbt_EntityBase $entity)
    {
        return parent::getFiltered($entity);
    }
}
