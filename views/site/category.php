<?php

use app\models\Article;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

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
            <form id="form" name="form" method="get">
            <!--DATE PICKER-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 col-xs-6 col-xs-offset-2" style="margin-bottom: 2em">
                    <input type="text" id="datepicker" name="datepicker" value="<?=$date?>" placeholder="выбрать дату">
                </div>
            </div>
            <div class="col-xs-12 col-md-12 right_bar">
                <div class="row">


                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="col-xs-1 col-sm-4" scope="col"></th>
                            <th class="col-xs-3 col-sm-3" scope="col">событие</th>
                            <th class="col-xs-3 col-sm-2" scope="col">место</th>
                            <th class="col-xs-2 col-sm-1" scope="col">дата и время</th>
                            <th class="col-xs-1 col-sm-1" scope="col">свободные места</th>
                            <th class="col-xs-1 col-sm-1" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($events as $event):?>
                            <tr>

                                <td data-label="" scope="row" class="table-image">
                                    <img src="/images/<?=$event->image->path?>" class ="img-thumbnail"></td>
                                <td data-label="событие" ><h4 id="id_<?=$event->id?>_modal_event_title"><?=$event->title?></h4>
                                    <h5 class="description"><?=$event->description?></h5><br/> <?=Html::a('читать далее ...',['site/page','id'=>$event->id]);?>
                                </td>
                                <td data-label="место">
                                    город : <?=$event->city->city ?>
                                    <br/> улица : <?=$event->street->street?>
                                    <br/>дом : <?=$event->home->home?>
                                    <br/>комната : <?=$event->room->room?>
                                </td>
                                <td data-label="дата и время">
                                    дата :<br/> <?=$event->date?>
                                    <br/>время :<br/> <?=$event->time?>
                                </td>
                                <td data-label="свободные места" class="free_places" id="id_<?=$event->id?>_modal_free_places"><?=$event->count_places?></td>
                                <td data-label="">
                                    <?php if(Yii::$app->user->isGuest): ?>
                                        <a href="<?=Url::to(['site/register'])?>">
                                            <input type="button"
                                                   class=" btn btn_table go"
                                                   id="go_<?=$event->id?>"
                                                   name="go_<?=$event->id?>"
                                                   value="go">
                                        </a>
                                        <a href="<?=Url::to(['site/register'])?>">
                                            <input type="button"
                                                   class=" btn btn_table delete"
                                                   id="delete_<?=$event->id?>"
                                                   name="delete_<?=$event->id?>"
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



                </div>


            </div>
        <?php else: echo"В данной категории нет пока событий ((("?>
            </form>
        <?php endif; ?>
    </div>

</main>

