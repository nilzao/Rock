<?php

abstract class Access_Dbt_Ent_Gen_RockPerms extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $id_vendor;
    protected $id_controller;
    protected $id_method;
    protected $id_group;
    protected $perm;


    public function __construct()
    {
        $this->__tableName = 'rock_perms';
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

    public function getIdVendor()
    {
        return $this->id_vendor;
    }

    public function setIdVendor($id_vendor)
    {
        $this->id_vendor = $id_vendor;
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

    public function getIdMethod()
    {
        return $this->id_method;
    }

    public function setIdMethod($id_method)
    {
        $this->id_method = $id_method;
        return $this;
    }

    public function getIdGroup()
    {
        return $this->id_group;
    }

    public function setIdGroup($id_group)
    {
        $this->id_group = $id_group;
        return $this;
    }

    public function getPerm()
    {
        return $this->perm;
    }

    public function setPerm($perm)
    {
        $this->perm = $perm;
        return $this;
    }


}
