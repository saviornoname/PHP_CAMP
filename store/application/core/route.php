<?php

namespace  application\core;

class Route
{
    public static function route()
    {
        $controllerName = 'main';
        $actionName = 'index';
        $url = $_SERVER['REQUEST_URI'];
        $routs = explode('/',$url);


            if (!empty($routs[2])) //controller
            {
                $controllerName = $routs[2];
                if (!empty($routs[3])) {
                    $actionName = $routs[3];
                }
            }


        $controllerClassName = 'application\controller\Controller_' . $controllerName;
        $actionName = 'action_' . $actionName;

        $controllerObject = new $controllerClassName;

        if(method_exists($controllerObject, $actionName)){
            $controllerObject->$actionName();
        }
    }
}