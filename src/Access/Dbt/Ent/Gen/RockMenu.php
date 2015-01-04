<?php

abstract class Access_Dbt_Ent_Gen_RockMenu extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $id_method;
    protected $id_parent;
    protected $ord;
    protected $title;


    public function __construct()
    {
        $this->__tableName = 'rock_menu';
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

    public function getIdMethod()
    {
        return $this->id_method;
    }

    public function setIdMethod($id_method)
    {
        $this->id_method = $id_method;
        return $this;
    }

    public function getIdParent()
    {
        return $this->id_parent;
    }

    public function setIdParent($id_parent)
    {
        $this->id_parent = $id_parent;
        return $this;
    }

    public function getOrd()
    {
        return $this->ord;
    }

    public function setOrd($ord)
    {
        $this->ord = $ord;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


}
