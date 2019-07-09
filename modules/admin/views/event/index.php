<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin | Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-striped table-bordered" id = "table">
        <thead>
        <tr>
            <th class="col-xs-1 col-sm-3" scope="col"></th>
            <th class="col-xs-3 col-sm-3" scope="col">events</th>
            <th class="col-xs-3 col-sm-2" scope="col">places</th>
            <th class="col-xs-2 col-sm-2" scope="col">date and time</th>
            <th class="col-xs-1 col-sm-1" scope="col">free places</th>
            <th class="col-xs-1 col-sm-1" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $event):?>

            <tr id="tr_<?=$event->id?>">
                <td data-label="" scope="row" class="table-image" >
                    <img src="/images/<?=$event->image->path?>" style="width: 19em; background-size: cover"></td>
                <td data-label="event"><?=$event->description?><br/><?=Html::a('read more ...',['site/page','id'=>$event->id]);?></td>
                <td data-label="places">
                    <?=$event->city->city ?>
                    <?=$event->street->street?>,
                    <?=$event->home->home?>,
                    room: <?=$event->room->room?></td>
                <td data-label="date and time"><?=$event->date?> <?=$event->time?></td>
                <td data-label="free places" class="free_places" id="free_places_<?=$event->id?>"><?=$event->count_places?></td>
                <td data-label="">
                    <a href="<?=Url::to(['event/view','id'=>$event->id])?>"
                       title="View"
                       aria-label="View"
                       data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                    <a href="<?=Url::to(['event/update','id'=>$event->id])?>"
                       title="Update"
                       aria-label="Update"
                       data-pjax="0"><span class="glyphicon glyphicon-pencil"></span>
                    </>
                    <a href="<?=Url::to(['event/delete','id'=>$event->id])?>"
                       title="Delete"
                       aria-label="Delete"
                       data-pjax="0"
                       data-confirm="Are you sure you want to delete this item?"
                       data-method="post"><span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
