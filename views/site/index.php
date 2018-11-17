<?php

/* @var $this yii\web\View */
/* @var $model \app\forms\ApplicationForm */

$this->title = 'My Yii Application';
?>
<div class="subcontainer">

    <div class="subnav">
        <ul class="subnavigation">
            <li class="tab active-tab"><a href="#">Простая форма</a></li>
        </ul>
    </div>

    <?php if(Yii::$app->session->hasFlash('addMes')): ?>
        <div class="message">
            <?= Yii::$app->session->getFlash('addMes'); ?>
        </div>
    </div>
    <?php else: ?>

    <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'application-form',
            'action' => ['application/add'],
            'fieldConfig' => [
                    'labelOptions' => [
                            'class' => 'form-label',
                    ],
                    'template' => '{label}{input}<div class="block-hint">
                        <i class="fa fa-question-circle question-error"></i>
                        <div class="hint">{error}</div>
                    </div>',
            ],
    ]); ?>

        <!--
        <div class="block-hint">
            <i class="fa fa-question-circle question-error"></i>
            <div class="hint">{error}</div>
        </div>
        -->

        <div id="direction-block" class="form-block">

            <?= $form->field($model, 'direction')
                ->textInput([
                    'class' => 'form-input',
                ])
                ->label('Укажите страну, курорт или отель', [
                    'id' => 'direction-label'
                ]); ?>
            <!--
            <label class="form-label">Укажите страну, курорт или отель</label>
            <?= \yii\helpers\Html::textInput('direction', '', [
                'class' => 'form-input'
            ]); ?>-->
        </div>

        <div id="body-block" class="form-block">

            <?= $form->field($model, 'body', [
                    'template' => '{label}{input}',
            ])
                ->textarea([
                    'class' => 'form-area',
                 ])
                ->label('- укажите ваши предпочтения по отелю
            <br>- ваш бюджет
            <br>- другие пожелания', [
                    'id' => 'area-label',
                ]); ?>
            <!--
            <label id="area-label" class="form-label">- укажите ваши предпочтения по отелю
            <br>- ваш бюджет
            <br>- другие пожелания
            </label>
            <?= \yii\helpers\Html::textarea('body', '', [
                'class' => 'form-area'
            ]); ?>-->
        </div>

        <div class="form-section">
            <div id="name-block" class="form-block-item">

                <?= $form->field($model, 'name')
                    ->textInput([
                        'class' => 'form-input-item',
                    ])
                    ->label('Имя', [
                        'id' => 'name-label'
                    ]); ?>
                <!--
                <label class="form-label">Имя</label>
                <?= \yii\helpers\Html::textInput('direction', '', [
                    'class' => 'form-input-item'
                ]); ?>-->
            </div>

            <div id="phone-block" class="form-block-item">

                <?= $form->field($model, 'phone')
                    ->textInput([
                        'class' => 'form-input-item',
                     ])
                    ->label('Телефон', [
                        'id' => 'phone-label'
                    ]); ?>
                <!--
                <label class="form-label">Телефон</label>
                <?= \yii\helpers\Html::textInput('direction', '', [
                    'class' => 'form-input-item'
                ]); ?>-->
            </div>

            <div id="email-block" class="form-block-item">

                <?= $form->field($model, 'email')
                    ->textInput([
                        'class' => 'form-input-item',
                    ])
                    ->label('Email', [
                        'id' => 'email-label'
                    ]); ?>
                <!--
                <label class="form-label">Email</label>
                <?= \yii\helpers\Html::textInput('direction', '', [
                    'class' => 'form-input-item'
                ]); ?>-->
            </div>
        </div>

        <?= \yii\helpers\Html::submitButton('<span id="spin">Отправить заявку*</span><div class="spinner invis">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
        </div>', [
           'class' => 'form-submit',
        ]); ?>
    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>

<div class="dich">
    <div class="subcontainer">
        <!-- <?= \yii\helpers\Url::to(['site/agreement'])?> -->
        *Нажимая на кнопку "отправить", я принимаю <a href="#">Соглашение об обработке личных данных</a> и <a href="#">Правила сайта</a>
    </div>
</div>
<?php endif; ?>