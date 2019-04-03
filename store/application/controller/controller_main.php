<?php

namespace application\controller;

use application\core\controller;
use application\model\model_users;

class Controller_Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function action_index()
    {
        $this->view->generate('homepage_view.php', 'template_view.php');
    }
}