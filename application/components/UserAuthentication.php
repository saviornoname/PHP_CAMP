<?php

namespace application\components;

use application\core\sessionManipulation;
use application\model;

class UserAuthentication
{
    public $modelUser;
    public $sessionManipulation;

    /**
     * UserAuthentication constructor.
     */
    public function __construct()
    {
        $this->modelUser = new model\model_users();
        $this->sessionManipulation = new sessionManipulation();
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        $userInfo = $userInfo = $this->sessionManipulation->getSection('loggedUser');
        return $userInfo['Role'] == '1' ? true : false;
    }

    /**
     * @param $loginData
     * @return bool
     */
    public function userLogIn($loginData)
    {
        $userInfo = $this->modelUser->userAuthorization($loginData['login'],$loginData['password']);
        if ($userInfo) {
            unset($userInfo["password"]);
            $this->sessionManipulation->setSessionData('loggedUser', $userInfo);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function userIsLoged()
    {
        return isset($_SESSION['loggedUser']) ? true : false;
    }

    /**
     * @param $postData
     * @return bool
     */
    public function updateSessionData($postData)
    {
        $userInfo = $this->modelUser->userDataByLogin($postData);
        if ($userInfo) {
            unset($userInfo["password"]);
            $this->sessionManipulation->setSessionData('loggedUser', $userInfo);
            return true;
        }
        return false;
    }
}
