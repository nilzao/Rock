<?php

abstract class Access_Dbt_Ent_Gen_RockUsers extends Rock_Dbt_EntityBase
{

    protected $id;
    protected $email;
    protected $passwd;
    protected $active;


    public function __construct()
    {
        $this->__tableName = 'rock_users';
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
	


}
