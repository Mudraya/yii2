<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 004 04.02.19
 * Time: 22:18
 */

namespace app\models;
use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;

    // lables for fields (instead of lables in test.php - view)
    public function attributeLabels()
    {
        return [
            'name' => 'NAME',
            'email' => 'E-MAIL',
            'text' => 'TEXT',
        ];
    }

    //возвращает массив с правилами валидации формы
    //без валидации поле не будет загружено в модель
    public function rules() {
        return [
            // имя поля + валидатор + текст сообщения
            [['name','email'], 'required'/*, 'message' => 'Поле обязательное'*/],
            ['email', 'email'],
//            ['name', 'string' , 'min' => 2, 'tooShort' => 'Wrong'],
//            ['name', 'string' , 'max' => 5, 'tooLong' => 'Wrongg'],
            ['name', 'string' , 'length' => [2,5] ],
            ['name', 'myRule' ],
            //['text', 'trim' ],
            ['text', 'safe' ],
            ];
    }

    // собственный валидатор
    // валидатор работает на сервере
    public function myRule($attr) {
        if ( !in_array($this->$attr, ['hello', 'world'])){
            $this->addError($attr, 'Wrong');
        }
    }
}
