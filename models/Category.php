<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 007 07.02.19
 * Time: 14:30
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    // имя нужной таблицы, если имя класа с назв. таблицы не совпадает
    public static function tableName() {
        return 'categories';
    }


}