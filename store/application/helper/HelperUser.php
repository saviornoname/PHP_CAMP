<?php

namespace application\helper;


use application\model\model_users;


class HelperUser
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = new model_users();
    }

    public function checkValidControllerRegisterData($inputData) {
        $errors = [];
        if (!empty($check = $this->modelUser->validate->checkAllField($inputData))){
            $errors[] = $check;
        }
        if (!empty($check = $check = $this->modelUser->validate->isEmailValid($inputData['email']))){
            $errors[] = $check;
        }

        if (!empty($check = $check = $this->modelUser->validate->checkPassword($inputData['password']))){
            $errors[] = $check;
        }
        if (!empty($check = $this->modelUser->validate->checkMatchString($inputData['password'],$inputData['confirm_password']))){
            $errors[] = $check;
        }
        if (!empty($check = $this->modelUser->validate->isPhoneValid($inputData['phone']))){
            $errors[] = $check;
        }
        if (false == $this->modelUser->isUniqLogin($inputData['login'])){
            $errors[] = 'Login is busy!';
        }


        return $errors;
    }

    public function checkValidControllerUpdateData($inputData) {
        $errors = [];
        if (!empty($check = $this->modelUser->validate->checkAllField($inputData))){
            $errors[] = $check;
        }

        if (!empty($check = $check = $this->modelUser->validate->isEmailValid($inputData['email']))){
            $errors[] = $check;
        }

        if (!empty($check = $this->modelUser->validate->isPhoneValid($inputData['phone']))){
            $errors[] = $check;
        }

        return $errors;
    }

    public function checkValidControllerLoginData(array $postData)
    {
        $errors = [];
        if (!empty($check = $this->modelUser->validate->checkAllField($postData))){
            $errors[] = $check;
        }
        return $errors;
    }
}