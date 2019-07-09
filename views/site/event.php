<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Category;
?>
<style>
    #category{
        display: none;
    }
</style>

        <?php $form = ActiveForm::begin(['id'=>'form', 'method' => 'post'])?>

        <div class="row" style="margin-top: 4em">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <?=$form->field($event,'title')->textInput(['class' => 'form-control', 'id' => 'event_title', 'placeholder' => 'title'])?>
                </div>
                <?=$form->field($event,'description')->textarea(['rows'=>'6','id' => 'form_textarea','class' => 'form-control','placeholder' => 'description'])?>
                <div id="event_img_mini"></div>
                <?=$form->field($image,'path')->fileInput([' class' => 'form-control', 'id' => 'event_image'])?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php if($categories):?>
                <div class="form-group">
                    <?=$form->field($event,'category_id')->dropdownList(
                        Category::find()
                            ->select(['category', 'id'])
                            ->indexBy('id')
                            ->column(),
                        [
                            'prompt'=>'Select Category',
                            'name'=>'select_category',
                            'id'=>'select_category_id'
                        ]);?>
                </div>
                <?php endif;?>
                <div class="form-group">
                    <?= $form->field($category,'category'
                    )->textInput(['id'=>'input_new_category','placeholder'=>'write the new category'])->label(false);?>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <!--DATE PICKER-->

                            <?= $form->field($event, 'date')
                                ->textInput(['id'=>'datepicker','class' => 'form-control']) ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm16 col-md-6 col-lg-6">
                        <div class="form-group">
                            <?=$form->field($event,'time')->input('text',
                                ['id'=>'basicExample',
                                    'class'=>'form-control',
                                    'placeholder' => 'enter time'
                                ])?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                            <?=$form->field($event,'event_duration')->input('time',
                                [
                                    'class' => 'form-control',
                                    'id' => 'event_duration_hour',
                                    'placeholder' => '00:00'
                                ])?>
                         </div>
                    </div>

                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                            <?=$form->field($event,'count_places')->textInput(
                                [
                                    'class' => 'form-control',
                                    'id' => 'event_count_places',
                                    'placeholder' => 'кол-во мест',
                                    'type' =>'number',
                                    'min' =>'0'
                                ])?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                   <?=$form->field($city,'city')->textInput(
                        [
                            'class' => 'form-control',
                            'id' => 'event_places_city',
                            'placeholder' => 'city'
                        ])?>
                </div>

                <div class="form-group">
                    <?=$form->field($street,'street')->textInput(
                        [
                            'class' => 'form-control',
                            'id' => 'event_places_street',
                            'placeholder' => 'street'
                        ])?>
                </div>
                <div class="form-group">
                    <?=$form->field($home,'home')->textInput(
                        [
                            'class' => 'form-control',
                            'id' => 'event_places_house',
                            'placeholder' => 'house'
                        ])?>
                </div>
                <div class="form-group">
                    <?=$form->field($room,'room')->textInput(
                        [
                            'class' => 'form-control',
                            'id' => 'event_places_room',
                            'placeholder' => 'room'
                        ])?>
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3 col-xs-offset-9 col-sm-12 col-md-12 col-lg-12 ">
                <?= Html::submitButton('Submit',['class' => 'btn btn_save','id' =>'btn_submit','name'=>'submit'])?>
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

<?php ActiveForm::end()?>

    </main>
