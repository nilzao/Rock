<?php

abstract class Rock_Access_Dbt_Ent_Gen_RockControllers extends Rock_Dbt_EntityBase
{

    protected $id;

    protected $id_vendor;

    protected $name;

    public function __construct()
    {
        $this->__tableName = 'rock_controllers';
        $this->__arrayPK = array(
            'id'
        );
        // $this->__encoding = 'ISO-8859-1';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id, $orderBy = false)
    {
        if ($orderBy) {
            $this->_addOrderBy('id');
        }
        $this->id = $id;
        return $this;
    }

    public function getIdVendor()
    {
        return $this->id_vendor;
    }

    public function setIdVendor($id_vendor)
    {
        $this->id_vendor = $id_vendor;
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
