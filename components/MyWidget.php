<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 010 10.02.19
 * Time: 15:18
 */

namespace app\components;
use yii\base\Widget;

// прим. для повт. частей в Видах
class MyWidget extends Widget
{

    // parameters from view
    public $name;

    // нормализация свойств виджета
    public function init() {
        parent::init();
        // проверка, передан ли параметр
        //if ($this->name === null ) $this->name = 'Гусь';

        // буферезируем пол контент. между бэгин и энд
        ob_start();
    }

    // запуск
    public function run() {
        // кавычки двойные, что бы переменные интерпритировались
        //return "<h1> {$this->name}, Chao-cocoa</h1>";

        // подружаем вид, если много кода
        //return $this->render('my', ['name' => $this->name]);

        //хотим перевести весь пол. контент в верхний регистр
        $content = ob_get_clean();
        $content = mb_strtoupper($content, 'utf-8');
        return $this->render('my', compact('content'));
    }

}