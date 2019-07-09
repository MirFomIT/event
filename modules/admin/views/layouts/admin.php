<?php

use app\assets\AppAsset;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php
$categories = Category::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Enjoy It</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My CSS-->
    <link rel="stylesheet" href="../css/style.css" >

    <!--DATEPICKER-->
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <header >
        <nav class="header">

            <!--LOGO-->
            <a href="<?= Url::home()?>">
                <img alt="Events" src="../../images/logo.png" class="menu-top-logo">
            </a>

            <!--MENU-->

            <nav class="navbar">
                <div id="menu-top">
                    <!--MENU-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav-menu-top navbar-nav">

                            <?php if(!Yii::$app->user->isGuest):?>
                                <li>
                                    <a href="<?= Url::to('/site/logout')?>">
                                        <?= Yii::$app->user->identity['first_name']?> (Logout)
                                    </a>
                                </li>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>
            </nav>

            <!--MOBILE MENU-->
            <nav id="mobile_menu">
                <input type="checkbox" id="nav-toggle" hidden>
                <nav class="nav">
                    <label for="nav-toggle" class="nav-toggle" onclick></label>
                    <a href="<?= Url::home()?>">
                        <img alt="Joit It" src="../../images/logo.png" class="mobile-logo">
                    </a>
                    <ul class="navbar-nav mobile_menu_list"> <li><?=Html::a('login',['site/login'])?></li>

                        <?php if(!Yii::$app->user->isGuest):?>
                            <li>
                                <a href="<?= Url::to('/site/logout')?>">
                                    <?= Yii::$app->user->identity['first_name']?> (Logout)
                                </a>
                            </li>
                            <?php if(Yii::$app->user->identity['first_name'] == 'elena'):?>
                                <li><?=Html::a('admin',['/admin'])?></li>
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
    <main>
        <!--MENU-->
        <?= $content ?>
        <footer>
            <nav class="panel-footer">
                <div class="row">
                    <div class="col-md-4 footer_email">
                        <a href="#"class="footer_email">
                            <p>e-mail: enjoyit@gmail.com</p>
                        </a>
                        <a href="#" class="footer_http ">
                            <p>http:// enjoyit.com</p>
                        </a>
                    </div>
                    <div class="col-md-4 footer_phones" >
                        <p>phone: +38-099-999-99-99 </p>
                        <p>phone: +38-099-999-99-99</p>
                    </div>
                    <div class="col-md-4 footer_social_button">
                        <p>Social buttons</p>
                        <a href="#">
                            <img src="../../images/facebook.png" style="width: 30px; height: 30px">
                        </a>
                        <a href="#">
                            <img src="../../images/facebook.png" style="width: 30px; height: 30px">
                        </a>
                        <a href="#">
                            <img src="../../images/facebook.png" style="width: 30px; height: 30px">
                        </a>
                        <a href="#">
                            <img src="../../images/facebook.png" style="width: 30px; height: 30px">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3 footer_year_manufacture">
                        <?= Html::a('MirFomIt',['http://mirfomit.dp.ua']);?>
                        <b>2018</b>
                    </div>
                </div>
            </nav>
        </footer>

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
