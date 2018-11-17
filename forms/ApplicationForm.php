<?php
/**
 * Created by PhpStorm.
 * User: vovan
 * Date: 26.06.2018
 * Time: 17:12
 */

namespace app\forms;

use app\models\Application;

class ApplicationForm extends \yii\base\Model
{
    public $direction;

    public $body;

    public $name;

    public $phone;

    public $email;

    public function rules()
    {
        return [
          [['direction', 'name', 'phone', 'email'], 'required', 'message' => 'Поле должно быть заполненым!'],
          ['body', 'safe'],
          ['email', 'email', 'message' => 'Некорректный email!'],
          ['phone', 'number', 'message' => 'Использовать только цифры!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'direction' => 'Укажите страну, курорт или отель',
            'name' => 'Имя',
            'phone' => 'Телефон',
        ];
    }

    public function addApplication() {

        return Application::addApp($this->direction, $this->body, $this->name, $this->phone, $this->email);
    }
}