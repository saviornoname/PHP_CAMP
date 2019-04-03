<?php

namespace  application\core;

use application\components\UserAuthentication;
use application\components\Validate;

/**
 * @property Validate validate
 */
class sessionManipulation
{
    public function  setSessionData($section,$data)
    {
        $_SESSION[$section] = $data;
    }

    public function  unsetSessionData($section)
    {
        unset($_SESSION[$section]);
    }

    public function  getSection($section)
    {
        return (empty($_SESSION[$section])) ?: $_SESSION[$section];
    }

}