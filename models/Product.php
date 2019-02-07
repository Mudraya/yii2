<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 007 07.02.19
 * Time: 21:23
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function TableName() {
        return 'products';
}



}