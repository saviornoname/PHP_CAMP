<?php

namespace application\helper;


use application\model\model_category;


class HelperCategory
{
    private $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new model_category();
    }

    /**
     * @param $inputData
     * @return array
     */
    public function checkValidNewCategoryData($inputData)
    {
        $errors = [];
        if (empty($inputData['name'])){
            $errors[] = 'Please enter field ' . 'name';
        }
        if (!$this->modelCategory->isUniqCategory($inputData['name'])){
            $errors[] = 'Name category is busy!';
        }
        return $errors;
    }

    public function checkValidUpdateCategoryData($inputData)
    {
        $getDataById = $this->modelCategory->isIdCategory($inputData['id']);
        $errors = [];
        if (empty($inputData['name'])){
            $errors[] = 'Please enter field ' . 'name';
        }
        if (!$this->modelCategory->isUniqCategory($inputData['name'])) {
            if ($this->modelCategory->validate->checkMatchString($inputData['name'], $getDataById['name']) !== '') {
                $errors[] = 'Please change name name';
            }
        }
        return $errors;
    }

}