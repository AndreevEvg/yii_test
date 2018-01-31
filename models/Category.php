<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName() {
        parent::tableName();
        return 'categories';
    }
    
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}
