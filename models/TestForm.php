<?php

namespace app\models;

use yii\db\ActiveRecord;

class TestForm extends ActiveRecord
{
    public static function tableName() {
        parent::tableName();
        return 'contacts';
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Текст сообщения'
        ];
    }
    
    public function rules()
    {
        return [
            // атрибут required указывает, что name, email, subject, body обязательны для заполнения
            [['name', 'text'], 'required'],

            // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
            ['email', 'email'],
            
            ['name', 'string', 'min' => 2],
            ['text', 'trim'],
        ];
    }
}
