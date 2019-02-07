<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 001 01.02.19
 * Time: 22:08
 */

namespace app\controllers;


//use yii\web\Controller;

class MyController extends AppController
{
    public function actionIndex($id = null)
    {
        $hi = 'Hello World';
        $names = ['555','44'];
        //return $this -> render('index', ['hello' => $hi]);
        return $this -> render('index', compact('hi','names', 'id'));
    }
    public function actionBlogPost()
    {
        return 'ffffffffff';
    }

}