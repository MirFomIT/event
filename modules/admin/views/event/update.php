<?php

use app\models\City;
use app\models\Home;
use app\models\Room;
use app\models\Street;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Event;
use app\models\User;
use yii\widgets\Pjax;
use app\models\Image;
/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Update Event: ' . $event->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $event->title, 'url' => ['view', 'id' => $event->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="event-form row">

        <?php $form = ActiveForm::begin(); ?>

        <div class="col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($event, 'category')->dropdownList(
                Category::find()->select(['category', 'id'])->indexBy('id')->column()); ?>
            <?= $form->field($event, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($event, 'description')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">

            <label>Картинка</label><br/>
            <img src="/images/<?=$event->image->path?>" class = "event_img_form">
            <br/><br/>
            <?= $form->field($image, 'path')->fileInput() ?>

            <label>Новая картинка</label>

            <img src="#" class = "event_img_form">

        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <?= $form->field($event, 'city_id')->dropDownList(
                    City::find()->select(['city','id'])->indexBy('id')->column()
                )?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <?= $form->field($event, 'street_id')->dropDownList(
                    Street::find()->select(['street','id'])->indexBy('id')->column()
                )?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 col-md-12 col-lg-12 row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?= $form->field($event, 'home_id')->dropDownList(
                        Home::find()->select(['home','id'])->indexBy('id')->column()
                    ) ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?= $form->field($event, 'room_id')->dropDownList(
                        Room::find()->select(['room','id'])->indexBy('id')->column()
                    ) ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?= $form->field($event, 'count_places')->textInput(['type' =>'number']) ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 col-md-12 col-lg-12 row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($event, 'event_duration')->textInput(
                        [
                            'type' =>'time'
                        ]
                    ) ?>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($event, 'user')->dropDownList(
                        User::find()->select(['first_name', 'id'])->indexBy('id')->column()
                    ); ?>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <?= $form->field($event, 'date')->textInput(
                        [
                            'id'=>'datepicker',
                            'name'=>'datepicker',
                            'placeholder' => 'enter date',
                            'min' =>'0'
                        ]
                    ) ?>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?= $form->field($event, 'time')->textInput(
                        [
                            'type' =>'time'
                        ]
                    ) ?>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($event, 'status')->checkbox(['checked'=>true])?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
<br/><br/><br/>


