<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
        <div class="col-md-12"><h3 class="center-block"><?=$event->title?></h3></div>
        <div class="col-md-4 page">
                <img src="/images/<?=$event->image->path?>" class ="img-thumbnail">
        </div>
        <div class="col-md-8">
            <p class="text"><?=$event->description?></p>
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
        </div>
    </div>

</main>
