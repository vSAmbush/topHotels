<?php
/**
 * Created by PhpStorm.
 * User: vovan
 * Date: 27.06.2018
 * Time: 16:22
 */
/* @var $this \yii\web\View */
/* @var $applications \app\models\Application[]|array|\yii\db\ActiveRecord[] */

?>
<div class="subcontainer">

    <!-- Table Block -->
    <div class="applications">

        <p class="app-caption">Заявки</p>
        <table class="table table-bordered">

            <thead>
                <td class="col-lg-1">ID</td>
                <td class="col-lg-3">Дата</td>
                <td class="col-lg-2">Направление</td>
                <td class="col-lg-5">Подробности</td>
                <td class="col-lg-1">Имя</td>
                <td class="col-lg-1">Телефон</td>
                <td class="col-lg-2">Email</td>
            </thead>
            <?php foreach ($applications as $app): ?>
                <tr>
                    <td class="col-lg-1"><?= $app->getId(); ?></td>
                    <td class="col-lg-3"><?= date('d-m-Y H:i', $app->getCreatedAt()); ?></td>
                    <td class="col-lg-2"><?= $app->getDirection(); ?></td>
                    <td class="col-lg-5"><?= $app->getBody(); ?></td>
                    <td class="col-lg-1"><?= $app->getName(); ?></td>
                    <td class="col-lg-1"><?= $app->getPhone(); ?></td>
                    <td class="col-lg-2"><?= $app->getEmail(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
