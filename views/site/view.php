<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <form id="form" name="form">
        <!--DATE PICKER-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 col-xs-6 col-xs-offset-2">
                <input type="text" id="datepicker" name="datepicker">
                <p class="help-block">Example block-level help text here.</p>
            </div>
        </div>
        <!--List-->


        <table class="table table-striped table-bordered" id = "table">
            <thead>
            <tr>
                <th class="col-xs-1 col-sm-2" scope="col">img</th>
                <th class="col-xs-3 col-sm-3" scope="col">events</th>
                <th class="col-xs-1 col-sm-1" scope="col">category</th>
                <th class="col-xs-3 col-sm-2" scope="col">places</th>
                <th class="col-xs-2 col-sm-1" scope="col">date and time</th>
                <th class="col-xs-1 col-sm-1" scope="col">free places</th>
                <th class="col-xs-1 col-sm-1" scope="col">first name user's</th>
            </tr>
            </thead>
            <tbody>


                <tr id="tr_<?=$model->id?>">
                    <td data-label="" scope="row" class="table-image"><img src="images/<?=$model->image->path?>")?></td>
                    <td data-label="event" contenteditable='true'><?=$model->description?></td>
                    <td data-label="category" contenteditable='true'><?=$model->category->category?></td>
                    <td data-label="places" contenteditable='true'>
                        city: <?=$model->place->city ?>,
                        <br/>street: <?=$model->place->street?>,
                        <br/>house:<?=$model->place->house?>,
                        <br/>room: <?=$model->place->room?>
                    </td>
                    <td data-label="date and time" contenteditable='true'><?=$model->date?><br/> <?=$model->time?></td>
                    <td data-label="free places" class="free_places" id="free_places_<?=$model->id?>" contenteditable='true'>
                        <?=$model->count_places?>
                    </td>
                    <td data-label="user" contenteditable='true'><?=$model->user->first_name?></td>
                </tr>

            </tbody>
        </table>
    </form>

</div>
