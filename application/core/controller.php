<?php

namespace  application\core;

use application\components\Request;
use application\components\Response;
use application\components\UserAuthentication;
use application\components\Validate;

class  Controller {

    public $view;
    protected $validate;
    protected  $request;
    protected $response;

    public function  __construct()
    {
        $this->validate = new Validate();
        $this->view = new View();
        $this->request = new Request();
        $this->response = new Response();
        $this->userAuthentication = new UserAuthentication();

    }

    public function action_index()
    {
        $this->view->generate('homepage_view.php', 'template_view.php');
    }

}