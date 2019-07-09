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

    <div class="row" style="margin-bottom: 1em">
        <?php if($categories):?>
            <nav id ="category" class="col-md-10 col-md-offset-3">

                <div>
                    <ul class="nav-menu-top navbar-nav" style="margin: 1em 0.5em">
                        <?php foreach ($categories as $category):?>
                            <li><?=Html::a("{$category->category}",['site/category','id'=>$category->id])?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </nav>
        <?php endif;?>
    </div>
    <div class="row" style="margin-bottom: 4em;">
        <?php if($events):?>
            <div data-label class="col-md-6 col-xs-6">
                <a href="<?=Url::to(['site/event'])?>">
                    <button class="btn btn_table btn_add_new_events" name="add_new_events">новое событие</button>
                </a>
            </div>
            <form id="form" name="form" method="get" style="margin-bottom: 1em">
                <!--DATE PICKER-->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-xs-6 ">
                        <input type="text" id="datepicker" name="datepicker" value="" placeholder="выбрать дату">
                    </div>

                </div>
            </form>
            <form method="post">
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
                            <td data-label="" scope="row" class="table-image"><img src="/images/<?=$event->image->path?>" class ="img-thumbnail"></td>
                            <td data-label="event"><h4 id="id_<?=$event->id?>_modal_event_title"><?=$event->title?></h4>
                                <?=$event->description?><br/> <?=Html::a('читать далее ...',['site/page','id'=>$event->id]);?></td>
                            <td data-label="places"
                                id="id_<?=$event->id?>_modal_event_places">
                                город : <?=$event->city->city?>,<br/>
                                улица : <?=$event->street->street ?>,<br/>
                                дом : <?=$event->home->home ?>,<br/>
                                комната : <?=$event->room->room ?></td>
                            <td data-label="date and time" id="id_<?=$event->id?>_modal_event_date_time">
                                дата :<br/> <?=$event->date?>
                                <br/>время : <br/><?=$event->time?>
                            </td>
                            <td data-label="free places" class="free_places" id="id_<?=$event->id?>_modal_free_places"><?=$event->count_places?></td>
                            <td data-label="">
                                <?php if(Yii::$app->user->isGuest): ?>
                                    <a href="<?=Url::to(['site/register'])?>">
                                        <input type="button"
                                               class=" btn btn_table go"
                                               id="go_<?=$event->id?>"
                                               name="go"
                                               value="go">
                                    </a>
                                    <a href="<?=Url::to(['site/register'])?>">
                                        <input type="button"
                                               class=" btn btn_table delete"
                                               id="delete_<?=$event->id?>"
                                               name="delete"
                                               value="delete">
                                    </a>
                                    <br/>
                                <?php endif;?>
                                <?php if(!Yii::$app->user->isGuest): ?>
                                    <input type="button"
                                           class=" btn btn_table go"
                                           id="go_<?=$event->id?>"
                                           name="go_<?=$event->id?>"
                                           value="иду"
                                           data-toggle="modal"
                                           data-target="#myModal">
                                    <input type="button"
                                           class=" btn btn_table delete"
                                           id="delete_<?=$event->id?>"
                                           name="delete"
                                           value="передумал"
                                           data-toggle="modal"
                                           data-target="#myModal">
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </form>


        <?php endif;?>
    </div>

</main>

