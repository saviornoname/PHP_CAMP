<?php

namespace  application\core;

class View {
    private $data = [];

    private $template;

    private $contentView = 'main';

    public function setData(array $value){
        $this->data = array_merge($this->data,$value);
    }

    public function generate($contentView, $templateView, $data = null)
    {
        include 'application/view/' . $templateView;
    }

}