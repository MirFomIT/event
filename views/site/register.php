<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>
    <div class="row">
        <div class="col-md-8">
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email')->textInput(); ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <a class="form-group">

                <p>  if you have a login</p>
                <a href="<?=Url::to(['site/login'])?>">
                    <?= Html::button('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </a>
            </a>
        </div>
    </div>




</div>
