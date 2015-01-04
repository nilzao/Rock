<?php

abstract class Rock_Access_Dbt_Ent_Gen_RockVendors extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $name;


    public function __construct()
    {
        $this->__tableName = 'rock_vendors';
        $this->__arrayPK = array(
            'id'
        );
        // $this->__encoding = 'ISO-8859-1';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}
