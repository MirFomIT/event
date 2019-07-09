<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<main>

    <div class="row">
        <?php if($categories):?>
            <nav id ="category" class="col-md-6 col-md-offset-3">
                <div>
                    <ul class="nav-menu-top navbar-nav center slider">
                        <?php foreach ($categories as $category):?>
                            <li><?=Html::a("{$category->category}",['user/category','id'=>$category->id])?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </nav>
        <?php endif;?>
    </div>
    <?php if($events):?>
        <form id="form" name="form" method="get">
            <!--DATE PICKER-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 col-xs-6 col-xs-offset-2">
                    <input type="text" id="datepicker" name="datepicker" value="<?=$date?>" placeholder="add date">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
            </div>
            <!--List-->

            <table class="table table-striped table-bordered" id = "table">
                <thead>
                <tr>
                    <th class="col-xs-1 col-sm-4" scope="col"></th>
                    <th class="col-xs-3 col-sm-3" scope="col">events</th>
                    <th class="col-xs-3 col-sm-2" scope="col">places</th>
                    <th class="col-xs-2 col-sm-1" scope="col">date and time</th>
                    <th class="col-xs-1 col-sm-1" scope="col">free places</th>
                    <th class="col-xs-1 col-sm-1" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($events as $event):?>

                    <tr id="tr_<?=$event->id?>">
                        <td data-label="" scope="row" class="table-image">
                            <img src="/images/<?=$event->image_path?>"?></td>
                        <td data-label="event"><?=$event->description?><br/><?=Html::a('read more ...',['site/page','id'=>$event->id]);?></td>
                        <td data-label="places"><?=$event->place->city ?> <?=$event->place->street?>, <?=$event->place->house?>,room: <?=$event->place->room?></td>
                        <td data-label="date and time"><?=$event->date?> <?=$event->time?></td>
                        <td data-label="free places" class="free_places" id="free_places_<?=$event->id?>"><?=$event->count_places?></td>
                        <td data-label="">
                            <a href="<?=Url::to(['user/view','id'=>$event->id])?>"
                               title="View"
                               aria-label="View"
                               data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a href="<?=Url::to(['user/update','id'=>$event->id])?>"
                               title="Update"
                               aria-label="Update"
                               data-pjax="0"><span class="glyphicon glyphicon-pencil"></span>
                            </>
                            <a href="<?=Url::to(['user/delete','id'=>$event->id])?>"
                               title="Delete"
                               aria-label="Delete"
                               data-pjax="0"
                               data-confirm="Are you sure you want to delete this item?"
                               data-method="post"><span class="glyphicon glyphicon-trash"></span>
                            </a> </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </form>

        <div class="row">
            <div data-label class="col-md-12 col-xs-12">
                <a href="<?=Url::to(['site/event'])?>">
                    <button class="btn btn_table btn_add_new_events" name="add_new_events" >add new events</button>
                </a>
            </div>
        </div>

    <?php endif;?>
</main>

