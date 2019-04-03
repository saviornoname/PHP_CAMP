<?php

namespace application\controller;

use application\core\controller;
use application\core\sessionManipulation;
use application\helper\HelperUser;
use application\model\model_users;

class Controller_Customer extends Controller
{
    public $modelUsers;
    public $userHelper;
    public $sessionManipulation;


    /**
     * Controller_User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->modelUsers = new model_users();
        $this->userHelper = new HelperUser();
        $this->sessionManipulation = new sessionManipulation();
        if ($this->userAuthentication->userIsLoged() == true) {
            ($this->userAuthentication->isAdmin() == true) ?: $this->response->redirect('/store/user/account');
        }
    }

    public function action_allUser()
    {
        $allUsers = $this->modelUsers->getDataUser();
        $this->view->generate(
            'allUsers_template.php',
            'template_view.php',
            ['user' => $allUsers]);
    }


    public function action_addCustomer()
    {
        $errors = [];
        $postData = $this->request->postData;
        if(!empty($postData)) {
            $errors = $this->userHelper->checkValidControllerRegisterData($postData);
            if(empty($errors)) {
                if ($this->modelUsers->singUp($postData)) {
                    $this->response->redirect('allUser');
                } else {
                    $errors[] = 'Error!';
                }
            }
        }
        $this->view->generate(
            'addCustomer_template.php',
            'template_view.php',
            ['errors' => $errors]);

    }


    public function action_editCustomer()
    {
        $errors = [];
        $dataUser = $this->request->getData;
        $postData = $this->request->postData;
        if(!empty($postData)) {
            $dataUser = $postData;
            $errors = $this->userHelper->checkValidControllerUpdateData($dataUser);
            if(empty($errors)) {
                if ($this->modelUsers->editUser($postData)) {
                    $this->response->redirect('/store/customer/allUser');
                }
                $errors[]= 'ERROR!';
            }
        }
        $this->view->generate(
            'editCustomer_template.php',
            'template_view.php',
            ['errors' => $errors,'dataUser' => $dataUser]);
    }

    public function action_deleteUser()
    {
        $errors = [];
        $loginUser = $this->request->getData;
        $postData = $this->request->postData;
        if (!empty($postData)) {
            $loginUser = $postData;
            if (isset($loginUser['Yes'])) {
                if ($this->modelUsers->deleteUser($loginUser['login'])) {
                    $this->response->redirect('/store/customer/allUser');
                }
                $errors[] = 'User not delete';
            }
        }

        $this->view->generate(
            'deleteUser_template.php',
            'template_view.php',
            [
                'login' => $loginUser['login'],
                'errors' => $errors
            ]);
    }
}