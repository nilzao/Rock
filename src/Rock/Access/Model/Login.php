<?php

class Rock_Access_Model_Login
{

    private $vwErrors = array();

    public function __construct()
    {
        $daoUser = Dbt_Rock_Access_Dao_RockUsers::getInstance();
        $input = Rock_Core_Input::getInstance();
        $email = $input->getPost('email');
        $user = $daoUser->getByEmail($email);
        $passwd = $input->getPost('passwd');
        $this->checkActive($user);
        $this->checkEmail($user, $email);
        $this->checkPasswd($user, $passwd);
    }

    private function checkActive(Dbt_Rock_Access_Ent_RockUsers $user)
    {
        $active = $user->getActive();
        if (! empty($active)) {
            return true;
        }
        $this->vwErrors['inative'] = true;
        return false;
    }

    private function checkEmail(Dbt_Rock_Access_Ent_RockUsers $user, $email)
    {
        $userMail = $user->getEmail();
        if (! empty($userMail) && $userMail == $email) {
            return true;
        }
        $this->vwErrors['email'] = true;
        return false;
    }

    private function checkPasswd(Dbt_Rock_Access_Ent_RockUsers $user, $passwd)
    {
        if ($user->getPasswd() == $this->crypt($passwd)) {
            return true;
        }
        $this->vwErrors['passwd'] = true;
        return false;
    }

    private function crypt($str)
    {
        return md5($str);
    }

    public function getVwErrors()
    {
        return $this->vwErrors;
    }
}
