<?php

abstract class Rock_Dbt_DBGROUP_Dao_Gen_TABLENAMECLASS extends Rock_Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Rock_Dbt_DBGROUP_DbConnect::getDataBase();
        $this->quoteFields = Rock_Dbt_DBGROUP_DbConnect::isQuotedFields();
        $this->quoteTableNames = Rock_Dbt_DBGROUP_DbConnect::isQuoteTableNames();
    }

    /**
     *
     * @return Rock_Dbt_DBGROUP_Ent_TABLENAMECLASS[]
     */
    public function getAll(Rock_Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Rock_Dbt_DBGROUP_Ent_TABLENAMECLASS
     */
    public function getByPk(Rock_Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }

    /**
     *
     * @return Rock_Dbt_DBGROUP_Ent_TABLENAMECLASS[]
     */
    public function getFiltered(Rock_Dbt_EntityBase $entity, $start = NULL, $limit = NULL)
    {
        return parent::getFiltered($entity, $start, $limit);
    }
}
