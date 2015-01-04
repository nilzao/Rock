<?php

abstract class Access_Dbt_Ent_Gen_RockUsersGroups extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $id_user;
    protected $id_group;


    public function __construct()
    {
        $this->__tableName = 'rock_users_groups';
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

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
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


}
