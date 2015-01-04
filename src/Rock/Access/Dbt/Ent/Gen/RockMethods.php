<?php

abstract class Rock_Access_Dbt_Ent_Gen_RockMethods extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $id_controller;
    protected $name;


    public function __construct()
    {
        $this->__tableName = 'rock_methods';
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

    public function getIdController()
    {
        return $this->id_controller;
    }

    public function setIdController($id_controller)
    {
        $this->id_controller = $id_controller;
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
