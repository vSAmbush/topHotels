<?php
/**
 * Created by PhpStorm.
 * User: vovan
 * Date: 27.06.2018
 * Time: 14:32
 */

namespace app\models;


use yii\db\ActiveRecord;

class Application extends ActiveRecord
{

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * Adding application to db
     *
     * @param $direction
     * @param $body
     * @param $name
     * @param $phone
     * @param $email
     * @return bool
     */
    public static function addApp($direction, $body, $name, $phone, $email) {

        $app = new Application();

        $app->direction = $direction;
        $app->body = $body;
        $app->name = $name;
        $app->phone = $phone;
        $app->email = $email;
        $app->created_at = time();

        return $app->save();
    }

    /**
     * Selecting applications from db
     *
     * @return Application[]|array|ActiveRecord[]
     */
    public static function getApplications() {

        return self::find()->all();
    }

    /**
     * Getting last id application
     *
     * @return integer
     */
    public static function getLastIdApplication() {

        return self::find()->max('id');
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDirection() {
        return $this->direction;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return integer
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return integer
     */
    public function getCreatedAt() {
        return $this->created_at;
    }
}