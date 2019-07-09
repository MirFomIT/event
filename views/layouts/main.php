<?php

use app\assets\AppAsset;
use app\assets\ltAppAsset;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\SocialButton;
use app\models\Reserve;


    AppAsset::register($this);
   // ltAppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enjoy It</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--DATEPICKER-->

    <?php $this->head(); ?>
    <script type="text/javascript">

        $(function() {

            $('#datepicker').datepicker($.datepicker.regional["ru"]);

        });
    </script>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
    <header class="row">
        <nav class="header">

            <!--LOGO-->
            <a href="<?= Url::home()?>">
                <img alt="Events" src="/../images/logo.png" class="menu-top-logo">
            </a>

            <!--MENU-->

             <nav class="navbar">
                <div id="menu-top">
                    <!--MENU-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <span STYLE="color: red">ПРИЛОЖЕНИЕ В РАЗРАБОТКЕ</span>
                        <ul class="nav-menu-top navbar-nav">
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><?=Html::a('регистрация',['site/register'])?></li>
                                <li><?=Html::a('войти',['site/login'])?></li>

                            <?php endif; ?>
                            <?php if(!Yii::$app->user->isGuest):?>
                            <li>
                                <a href="<?= Url::to('/site/logout')?>">
                                    <?php
                                    $name = Yii::$app->user->identity['first_name'];
                                    echo ucfirst($name);
                                    ?> (выход)
                                </a>
                            </li>
                                <li><?=Html::a('мои события',['user/index'])?></li>
                                <?php if(Yii::$app->user->identity['role_id'] == 1):?>
                                    <li><?=Html::a('admin',['/admin/event/'])?></li>

                                <?php endif;?>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>
            </nav>

            <!--MOBILE MENU-->
            <nav id="mobile_menu">
                <input type="checkbox" id="nav-toggle">
                <nav class="nav">
                    <label for="nav-toggle" class="nav-toggle" onclick></label>
                    <a href="<?= Url::home()?>">
                        <img alt="Events" src="../images/logo.png" class="mobile-logo">
                    </a>
                    <ul class="navbar-nav mobile_menu_list">
                        <li><?=Html::a('login',['site/login'])?></li>

                        <?php if(!Yii::$app->user->isGuest):?>
                            <li>
                                <a href="<?= Url::to('/site/logout')?>">
                                    <?= Yii::$app->user->identity['first_name']?> (Logout)
                                </a>
                            </li>
                            <?php if(Yii::$app->user->identity['first_name'] == 'elena'):?>
                                <li><?=Html::a('admin',['/admin'])?></li>
                                <li><?=Html::a('user/admin',['user/index'])?></li>
                            <?php endif;?>
                        <?php endif;?>
                    </ul>
                    <footer class="footer-mobile-menu">
                        <div class="footer-mobile-email">
                            <a href="#">
                                <br/> e-mail: <br/>enjoyit@gmai.com</a>
                        </div>
                        <div class="footer-mobile-phones">
                            <br/>phone: <br/>+38-099-999-99-99 <br/>
                            phone: <br/>+38-099-999-99-99
                        </div>
                    </footer>
                </nav>

                <div class="mask-content"></div>
            </nav>
        </nav>
    </header>
    <!--MENU-->

  <?= $content  ?>
    <?php
    $user_name = Yii::$app->user->identity['first_name'];
    $event = Yii::$app->request->post('event');
    ?>
        <!--MODAL WINDOW-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="cross" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thank you, <?=ucfirst($user_name)?>!!!</p>
                    <p><span id="modal-text"></span></p>
                    <p><span id="modal_event"></span></p>
                    <p><span id="modal_place"></span></p>
                    <p><span id="modal_address"></span></p>
                    <p><span id="modal_time"></span></p>
                </div>
                <?php
                //mailer
                Yii::$app->mailer->compose()
                    ->setFrom('elena.mironenko1201@gmail.com')
                    ->setTo(Yii::$app->user->identity['email'])
                    ->setSubject('Register from event')
                    ->setHtmlBody('<div class="modal-body">
                    <p>Thank you, <?=$user_name?>!!!</p>
                    <p> <span id="modal-text"></span></p>
                    <p>event: <span id="modal_event"></span></p>
                    <p>places: <span id="modal_place"></span></p>
                    <p>address: <span id="modal_address"></span></p>
                    <p>date and time: <span id="modal_time"></span></p>
                </div>')
                    ->send();
                ?>

            </div>
        </div>
        <style>
            .modal-body{
                color: white;
            }
        </style>
    <footer class="row">
        <nav class="panel-footer">
            <div class="row">
                <div class="col-md-4 footer_email">
                    <a href="#" class="footer_email">
                        <p>e-mail: enjoyit@gmail.com</p>
                    </a>
                    <a href="http://www.enjoyit.com" class="footer_http ">
                        <p>http:// enjoyit.com</p>
                    </a>
                </div>
                <div class="col-md-4 footer_year_manufacture">
                    <a href="http://www.mirfomit.dp.ua">MirFomIT</a>
                    <b>2018</b>
                </div>
                <div class="col-md-4 footer_social_button">
                    <?php $socials = SocialButton::find()->all();?>
                    <?php if($socials): ?>
                    <section>
                        <?php foreach($socials as $social):?>
                            <a href="http://<?= $social->http_path?>">
                                <img src="/images/<?=$social->image?>" style="width: 1.5em; height: 1.5em ; margin: 0.5em ">
                            </a>
                        <?php endforeach;?>
                    </section>
                    <?php endif;?>
                </div>
            </div>
        </nav>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
