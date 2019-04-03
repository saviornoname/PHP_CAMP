<?php

namespace application\controller;

use application\core\controller;
use application\core\sessionManipulation;
use application\helper\HelperUser;
use application\model\model_users;

class Controller_User extends Controller
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
    }

    public function action_allUser()
    {
        $allUsers = $this->modelUsers->getDataUser();
        $this->view->generate(
            'allUsers_template.php',
            'template_view.php',
            ['user' => $allUsers]);
    }
    /**
     *
     */
    public function action_register()
    {
        $errors = [];
        $postData = $this->request->postData;
        if(!empty($postData)) {
            $errors = $this->userHelper->checkValidControllerRegisterData($postData);
            if(empty($errors)) {
                if ($this->modelUsers->singUp($postData)) {
                    $this->userAuthentication->userLogIn($postData);
                    $this->response->redirect('account');
                } else {
                    $errors[] = 'Сталася помилка! <br>';
                }
            }
        }
        $this->view->generate(
            'register_template.php',
            'template_view.php',
            ['errors' => $errors]);

    }

    public function action_logout()
    {
        $postData = $this->request->postData;
        if(isset($postData['yes'])){
            unset ($_SESSION['loggedUser']);
            $this->response->redirect('/store/main');
        }
        if(isset($postData['no'])){
            $this->response->redirect('account');
        }
        $this->view->generate(
            'logout_template.php',
            'template_view.php');

    }

    public function action_addAddress()
    {
        $errors = [];
        $postData = $this->request->postData;
        $userInfo = $this->sessionManipulation->getSection('loggedUser');
        $userInfo['address'] = $this->modelUsers->getDataAddress($userInfo['id']);

        if(!empty($postData)) {
            $postData['user_id'] = $userInfo['id'];
            $errors = $this->validate->checkAllField($postData);
            if(empty($errors)) {
                if($userInfo['address']) {
                    if ($this->modelUsers->editAddress($postData)) {
                        $this->response->redirect('account');
                    }
                    $errors[] = 'ERROR!';
                }
                if ($this->modelUsers->addAddress($postData)) {
                    $this->response->redirect('account');
                }
                $errors[] = 'ERROR!';
            }
        }

        $this->view->generate(
            'addAddress_template.php',
            'template_view.php',
            [
                'errors' => $errors,
                'loggedUser' => $userInfo,
                'address' => $userInfo['address']
            ]
        );
    }

    public function action_edit()
    {
        $errors = [];
        $postData = $this->request->postData;
        $userInfo = $this->sessionManipulation->getSection('loggedUser');
        if(!empty($postData)) {
            $errors = $this->userHelper->checkValidControllerUpdateData($postData);
            if(empty($errors)) {
                if ($this->modelUsers->editUser($postData)) {
                    $this->userAuthentication->updateSessionData($userInfo['login']);
                    if($this->userAuthentication->isAdmin()){
                        $this->response->redirect('accountAdmin');
                    }
                    $this->response->redirect('account');
                }
                $errors[]= 'ERROR!';
            }
        }
        $this->view->generate(
            'editAccount_template.php',
            'template_view.php',
            ['errors' => $errors,'loggedUser' => $userInfo]);
    }


    public function action_account()
    {
        if (false == $this->validate->IsUseLoged()) {
            $this->response->redirect('index');
        }
        if($this->userAuthentication->isAdmin()){
            $this->response->redirect('accountAdmin');
        }
        $this->view->generate(
            'account_template.php',
            'template_view.php',
            $this->sessionManipulation->getSection('loggedUser')
        );

    }

    public function action_accountAdmin()
    {
        if (false == $this->validate->IsUseLoged()) {
            $this->response->redirect('index');
        }
        if (false == $this->userAuthentication->isAdmin()) {
            $this->response->redirect('account');
        }
        $this->view->generate(
            'accountAdmin_template.php',
            'template_view.php',
            $_SESSION['loggedUser']);

    }

    public function action_login()
    {
        $errors = [];
        $postData = $this->request->postData;
        if(!empty($postData)) {
            $errors = $this->userHelper->checkValidControllerLoginData($postData);
            if(empty($errors)) {
                   if ($this->userAuthentication->userLogIn($postData)){
                       if($this->userAuthentication->isAdmin()){
                           $this->response->redirect('accountAdmin');
                       }
                       $this->response->redirect('account');
                   }
                    $errors[] = 'Wrong login or password!';
                }
            }
        $this->view->generate(
            'login_template.php',
            'template_view.php',
            ['errors' => $errors]);
    }

}