<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 001 01.02.19
 * Time: 22:37
 */

namespace app\controllers\admin;


use app\controllers\AppController;

class UserController extends AppController
{
    public function actionIndex()
    {
        return $this -> render('index');
    }
}