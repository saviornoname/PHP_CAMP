<?php

namespace application\components;

class Request
{
    public $postData;
    public $getData;

    public function __construct()
    {
        $this->postData = $this->setPostData();
        $this->getData = $this->setGetData();
    }

    private function setPostData()
    {
        $postData = $this->trimData($_POST);
        unset($_POST);
        return $postData;
    }

    private function setGetData()
    {
        return $this->trimData($_GET);
    }

    protected function trimData($array)
    {
        $trimArray = [];
        foreach ($array as $key => $value) {
            $trimArray[$key] = trim($value);
        }
        return $trimArray;
    }

    public function isIssetPost($value)
    {
        return isset($_POST[$value]);
    }
}
