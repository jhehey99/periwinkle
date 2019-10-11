<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 6:07 PM
 */

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);
