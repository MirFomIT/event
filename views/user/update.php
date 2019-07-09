<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\Url;
use app\models\Event;
use app\models\User;
use app\models\Place;
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

    <div class="event-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <?=$form->field($event,'title')->textInput([' class' => 'form-control', 'id' => 'event_title', 'placeholder' => 'title'])?>
                    <p class="help-block">Это поле должно быть заполнено.</p>
                </div>
                <?=$form->field($event,'description')->textarea(['rows'=>'6','id' => 'form_textarea','class' => 'form-control','placeholder' => 'description'])?>
                <p class="help-block">Это поле должно быть заполнено.</p>
                <label>Старая картинка</label>
                <img src="/images/<?=$event->image_path?>">
                <label>Новая картинка</label>
                <div id="event_img_mini"></div>
                <?=$form->field($event,'image_path')->fileInput(['id' => 'update_img'])->label('')?>
                <p class="help-block">Это поле должно быть заполнено.</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                        <?=$form->field($event,'category_id')->dropdownList(
                            Category::find()
                                ->select(['category', 'id'])
                                ->indexBy('id')
                                ->column(),['id'=>'select_category_id'])
                            ->label('Category');?>
                        <?=$form->field($event,'category_id')->textInput(['id' =>'input_new_category'])->label('')?>



                    <p class="help-block">Example block-level help text here.</p>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <!--DATE PICKER-->
                            <?= $form->field($event,'date')->input('text',
                                [
                                    'id'=>'datepicker',
                                    'name'=>'datepicker',
                                    'placeholder' => 'enter date'
                                ])?>
                            <p class="help-block">Example block-level help text here.</p>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm16 col-md-6 col-lg-6">
                        <div class="form-group">
                            <?=$form->field($event,'time')->input('text',
                                ['id'=>'basicExample',
                                    'class'=>'form-control',
                                    'placeholder' => 'enter time'
                                ])?>
                            <p class="help-block">Это поле должно быть заполнено.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <?=$form->field($event,'event_duration')->input('time',
                                [
                                    'class' => 'form-control',
                                    'id' => 'event_duration_hour',
                                    'placeholder' => '00:00'
                                ])?>
                            <p class="help-block">Это поле должно быть заполнено.</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <?=$form->field($event,'count_places')->textInput(
                                [
                                    'class' => 'form-control',
                                    'id' => 'event_count_places',
                                    'placeholder' => 'кол-во мест',
                                    'type' =>'number',
                                    'min' =>'0'
                                ])?>
                            <p class="help-block">Это поле должно быть заполнено.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <?=$form->field($event,'place_id')->dropdownList(
                        Place::find()->select(['city', 'id'])->indexBy('id')->column(),
                        ['prompt'=>' '])->label('City');?>
                    <p class="help-block">Это поле должно быть заполнено.</p>
                </div>

                <div class="form-group">
                    <?=$form->field($event,'place_id')->dropdownList(
                        Place::find()->select(['street', 'id'])->indexBy('id')->column(),
                        ['prompt'=>'Select Category'])->label('Street');?>
                    <p class="help-block">Это поле должно быть заполнено.</p>
                </div>
                <div class="form-group">
                    <?=$form->field($event,'place_id')->dropdownList(
                        Place::find()->select(['house', 'id'])->indexBy('id')->column(),
                        ['prompt'=>'Select Category'])->label('House');?>
                    <p class="help-block">Это поле должно быть заполнено.</p>
                </div>
                <div class="form-group">
                    <?=$form->field($event,'place_id')->dropdownList(
                        Place::find()->select(['room', 'id'])->indexBy('id')->column(),
                        ['prompt'=>'Select Category'])->label('Room');?>
                    <p class="help-block">Это поле должно быть заполнено.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3 col-xs-offset-9 col-sm-12 col-md-12 col-lg-12 ">
                <?= Html::submitButton('Submit',['class' => 'btn btn_save','id' =>'btn_submit'])?>
                <span> or </span>
                <a href="<?=Url::home()?>">
                    <?=Html::buttonInput('Cancel',['class' =>'btn btn_cancel'])?>
                </a>
                <span> or </span>
                <button type="reset" class="btn btn_reset">Reset</button>
                <!--
                <span> or </span>
                <button type="button" class="btn btn_cancel">Cancel</button>
                -->
            </div>

        </div>




        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
