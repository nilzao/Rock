<?php

abstract class Dbt_DBGROUP_Dao_Gen_TABLENAMECLASS extends Dbt_DaoBase
{

    protected function __construct()
    {
        $this->conn = Dbt_DBGROUP_DbConnect::getDataBase();
        $this->quoteFields = Dbt_DBGROUP_DbConnect::isQuotedFields();
        $this->quoteTableNames = Dbt_DBGROUP_DbConnect::isQuoteTableNames();
    }

    /**
     *
     * @return Dbt_DBGROUP_Ent_TABLENAMECLASS[]
     */
    public function getAll(Dbt_EntityBase $entity, $start = null, $limit = null)
    {
        return parent::getAll($entity, $start, $limit);
    }

    /**
     *
     * @return Dbt_DBGROUP_Ent_TABLENAMECLASS
     */
    public function getByPk(Dbt_EntityBase $entity)
    {
        return parent::getByPk($entity);
    }

    /**
     *
     * @return Dbt_DBGROUP_Ent_TABLENAMECLASS[]
     */
    public function getFiltered(Dbt_EntityBase $entity, $start = NULL, $limit = NULL)
    {
        return parent::getFiltered($entity, $start, $limit);
    }
}
