<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 002 02.02.19
 * Time: 15:00
 */

namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\TestForm;

class PostController extends AppController
{
    public $layout = 'basic';

    public function beforeAction($action){
        if ($action->id == 'index'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        if( Yii::$app->request->isAjax) {
            //debug($_POST);
            Yii::$app->request->post();
            return 'test;';
        }

        $model = new TestForm();
        // загружаем данные в модель, используя маасовое заполнение
        // проверяем загрузку и валтдацию данных
        if ($model -> load(Yii::$app->request->post())){
            //debug($model);
            //die;
            if ($model->validate()) {
                //записываем одноразовое флеш сообщение
                Yii::$app->session->setFlash('success', 'Данные приняты');
                //обновление страниці - сброс формы
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        return $this -> render('test', compact('model'));
    }

    public function actionShow()
    {
$this->view->title = 'One artiicle';
        //$this -> layout = 'basic';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ooo']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'otoo']);

        // работаем с бд
        // select * from categries
        //$cats = Category::find()->all();
        //$cats = Category::find()->orderBy(['id' => SORT_ASC])->all();
        // извлекать данные из бд в виде массива (не обьекта)
        // потребляется меньше памяти и выполняется меньше запросов
        //$cats = Category::find()->asArray()->orderBy(['id' => SORT_ASC])->all();

        // where
       // $cats = Category::find()->asArray()->where('parent=691')->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->all();
        // like - without %
        //$cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
        // <= where
        //$cats = Category::find()->asArray()->where(['<=', 'id', 695])->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->limit(1)->all();
        // limit is better then one(), query isnt excess
        //$cats = Category::find()->asArray()->where(['parent' => 691])->one();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->count();

        //$cats = Category::findOne(['parent' => 691]);
        //$cats = Category::findAll(['parent' => 691]);

        // SQL!!
        //$query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
        //$cats = Category::findBySql($query)->all();

        // параметризарованный запрос
        //$query = "SELECT * FROM categories WHERE title LIKE :search";
        //$cats = Category::findBySql($query, [':search' => '%app%'])->all();

        // DB - 2 tables
        // lazy
        //$cats = Category::findOne(694);
        // greedy
        //$cats = Category::find()->with('products')->where('id=694')->all();

        $cats = Category::find()->with('products')->all();

        return $this -> render('show', compact('cats'));
    }
}