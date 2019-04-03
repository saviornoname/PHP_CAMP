<?php

namespace application\controller;

use application\core\controller;
use application\core\sessionManipulation;
use application\helper\HelperProduct;
use application\model\model_category;
use application\model\model_product;

class Controller_Product extends Controller
{
    public $modelProduct;
    public $modelCategory;
    public $productHelper;
    public $sessionManipulation;

    public function __construct()
    {
        parent::__construct();
        $this->modelProduct = new model_product();
        $this->modelCategory = new model_category();
        $this->productHelper = new HelperProduct();
        $this->sessionManipulation = new sessionManipulation();
        if ($this->userAuthentication->userIsLoged() == true) {
            ($this->userAuthentication->isAdmin() == true) ?: $this->response->redirect('/store/user/account');
        }
    }

    public function action_index()
    {
        $allProduct = $this->modelProduct->getDataProduct();
        $this->view->generate('products_template.php', 'template_view.php',['products' => $allProduct]);
    }

    public function action_addProduct()
    {
        $errors = [];
        $allCategory = $this->modelCategory->getDataCategory();
        $postData = $this->request->postData;
        if (!empty($postData)) {
            $errors = $this->productHelper->checkValidNewProductData($postData);
            if (empty($errors)) {
                $postData['image'] = $this->productHelper->loadImage($_FILES['image']);
                if ($this->modelProduct->createProduct($postData)) {
                    $this->response->redirect('/store/product');
                }
                $errors[] = 'Error!';
            }
        }

        $this->view->generate(
            'addProduct_template.php',
            'template_view.php',
            [
                'allCategory' => $allCategory,
                'errors' => $errors
            ]);
    }

    public function action_deleteProduct()
    {
        $errors = [];
        $nameProduct = $this->request->getData;
        $postData = $this->request->postData;
        if (!empty($postData)) {
            if (isset($postData['Yes'])) {
                if ($this->modelProduct->deleteProduct($postData['name'])) {
                    $this->response->redirect('/store/product');
                }
                $errors[] = 'Product not delete';
            }
        }

        $this->view->generate(
            'deleteProduct_template.php',
            'template_view.php',
            [
                'name' => $nameProduct['name'],
                'errors' => $errors
            ]);
    }

    /**
     *
     */
    public function action_editProduct()
    {
        $errors = [];
        $getDataProduct = $this->request->getData;
        $allCategory = $this->modelCategory->getDataCategory();
        $postData = $this->request->postData;
        if (!empty($postData)) {
            $getDataProduct = $postData;
            $errors = $this->productHelper->checkValidUpdateProductData($getDataProduct);
            if (empty($errors)) {
                $postData['image'] = $this->productHelper->loadImage($_FILES['image'] ?? null);
                if ($this->modelProduct->updateProduct($postData)) {
                    $this->response->redirect('/store/product');
                }
                $errors[] = 'Error!';
            }
        }

        $this->view->generate(
            'editProduct_template.php',
            'template_view.php',
            [
                'allCategory' => $allCategory,
                'dataProduct' => $getDataProduct,
                'errors' => $errors
            ]);
    }
}
