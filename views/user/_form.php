<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Place;
use app\models\Event;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">



    <?php $form = ActiveForm::begin(); ?>
    <div class="event-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category')->dropdownList(
            Category::find()->select(['category', 'id'])->indexBy('id')->column()); ?>
        <?= $form->field($model, 'count_places')->textInput(
                [
                    'type' =>'number',
                    'min' =>'0'
                ]) ?>

        <?= $form->field($model, 'date')->textInput(
            [
                'id'=>'datepicker',
                'name'=>'datepicker',
                'placeholder' => 'enter date'
            ]
        ) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'event_duration')->textInput(
            [
                'type' =>'time'
            ]
        ) ?>

        <?= $form->field($model, 'image_path')->fileInput() ?>

        <?= $form->field($model, 'status')->dropDownList(
            Event::find()->select(['status','id'])->indexBy('id')->groupBy('status')->column()); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'user')->dropDownList(
            User::find()->select(['first_name', 'id'])->indexBy('id')->column()
        ); ?>

        <?= $form->field($model, 'place')->dropDownList(
            Place::find()->select(['city','id'])->indexBy('id')->column()
        )->label('City'); ?>

        <?= $form->field($model, 'place')->dropDownList(
            Place::find()->select(['street','id'])->indexBy('id')->column()
        )->label('Street'); ?>

        <?= $form->field($model, 'place')->dropDownList(
            Place::find()->select(['house','id'])->indexBy('id')->column()
        )->label('House'); ?>

        <?= $form->field($model, 'place')->dropDownList(
            Place::find()->select(['room','id'])->indexBy('id')->column()
        )->label('Room'); ?>

        <?= $form->field($model, 'time')->textInput(
            [
                'type' =>'time'
            ]
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
