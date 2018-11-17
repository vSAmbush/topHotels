<?php
/**
 * Created by PhpStorm.
 * User: vovan
 * Date: 27.06.2018
 * Time: 15:04
 */

namespace app\controllers;

use app\forms\ApplicationForm;
use app\models\Application;
use Yii;
use yii\web\Controller;

class ApplicationController extends Controller
{

    /**
     * Handling adding application
     *
     * @return \yii\web\Response
     */
    public function actionAdd() {

        $model = new ApplicationForm();

        if($model->load(Yii::$app->request->post()) && $model->addApplication()) {
            Yii::$app->getSession()->setFlash('addMes', 'Спасибо, Ваша заявка отправлена и будет обработана в ближайшее время');

            $msg = 'Поступила заявка № '.Application::getLastIdApplication();
            $email = Yii::$app->params['adminEmail'];

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email => 'TopHotels'])
                ->setSubject('Добавлена новая заявка')
                ->setTextBody($msg)
                ->send();
        }

        return $this->goBack(['site/index']);
    }

    /**
     * Displays applications page
     *
     * @return string
     */
    public function actionIndex() {

        $applications = Application::getApplications();

        return $this->render('index', [
            'applications' => $applications,
        ]);
    }
}