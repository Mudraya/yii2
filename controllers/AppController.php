<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 002 02.02.19
 * Time: 14:57
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}

//function debug($arr)
//{
//    echo '<pre>' . print_r($arr, true) . '</pre>';
//}