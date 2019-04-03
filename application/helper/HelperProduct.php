<?php

namespace application\helper;


use application\model\model_product;


class HelperProduct
{
    private $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new model_product();
    }

    /**
     * @param $inputData
     * @return array
     */
    public function checkValidNewProductData($inputData)
    {
        $errors = [];
        if (!empty($check = $this->modelProduct->validate->checkAllField($inputData))) {
            $errors[] = $check;
        }
        if (!$this->modelProduct->isUniqProduct($inputData['name'])) {
                $errors[] = 'Name product is busy!';
        }
        return $errors;
    }

    public function checkValidUpdateProductData(array $inputData)
    {
        $errors = [];
        $getDataById = $this->modelProduct->isIdProduct($inputData['productID']);
        if (!empty($check = $this->modelProduct->validate->checkAllField($inputData))){
            $errors[] = $check;
        }
        if (!$this->modelProduct->isUniqProduct($inputData['name'])) {
            if ($this->modelProduct->validate->checkMatchString($inputData['name'], $getDataById['name']) !== '') {
                $errors[] = 'Please change name name';
            }
        }
        return $errors;
    }

    public function loadImage($file)
    {
        if (isset($_FILES['image'])) {
            $name = $file['name'];
            $target_dir = "images/";
            $target_file = $target_dir . basename($name);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Upload file
            move_uploaded_file($file['tmp_name'], $target_dir . $name);
            return $target_dir.$name;
        }
        return null;
    }

}