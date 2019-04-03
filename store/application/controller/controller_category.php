<?php

namespace application\controller;

use application\core\controller;
use application\core\sessionManipulation;
use application\helper\HelperCategory;
use application\model\model_category;

class Controller_category extends Controller
{
    public $modelCategory;
    public $categoryHelper;
    public $sessionManipulation;

    /**
     * Controller_category constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->modelCategory = new model_category();
        $this->categoryHelper = new HelperCategory();
        $this->sessionManipulation = new sessionManipulation();
        if ($this->userAuthentication->userIsLoged() == true) {
            ($this->userAuthentication->isAdmin() == true) ?: $this->response->redirect('/store/user/account');
        }
    }

    /**
     *
     */
    public function action_index()
    {
        $allCategory = $this->modelCategory->getDataCategory();
        $this->view->generate('category_template.php', 'template_view.php',['category' => $allCategory]);
    }

    /**
     *
     */
    public function action_addCategory()
    {
        $errors = [];
        $dataCategories = $this->modelCategory->getDataCategory();
        $postData = $this->request->postData;
        if (!empty($postData)) {
            $errors = $this->categoryHelper->checkValidNewCategoryData($postData);
            if (empty($errors)) {
                $this->modelCategory->createCategory($postData);
                $this->response->redirect('/store/category');
            }
        }

        $this->view->generate(
            'addCategory_template.php',
            'template_view.php',
            [
                'category' => $dataCategories,
                'errors' => $errors,
            ]);
    }

    /**
     *
     */
    public function action_deleteCategory()
    {
        $errors = [];
        $nameCategory = $this->request->getData;
        $postData = $this->request->postData;
        if (!empty($postData)) {
            if (isset($postData['Yes'])) {
                if ($this->modelCategory->deleteCategory($postData['name'])) {
                    $this->response->redirect('/store/category');
                }
                $errors[] = 'Category not delete';
            }
        }

        $this->view->generate(
            'deleteCategory_template.php',
            'template_view.php',
            [
                'name' => $nameCategory['name'],
                'errors' => $errors
            ]);
    }

    /**
     *
     */
    public function action_editCategory()
    {
        $errors = [];
        $getDataCategory = $this->request->getData;
        $dataCategories = $this->modelCategory->getDataCategory();
        $postData = $this->request->postData;

        if (!empty($postData)) {
            $getDataCategory = $postData;
            $errors = $this->categoryHelper->checkValidUpdateCategoryData($getDataCategory);
            if(empty($errors)) {
                if ($this->modelCategory->updateCategory($postData)) {
                    $this->response->redirect('/store/category');
                }
            }
        }
        $this->view->generate(
            'editCategory_template.php',
            'template_view.php',
            [
                'allCategory' => $dataCategories,
                'dataCategory' => $getDataCategory,
                'errors' => $errors
            ]);
    }
}
