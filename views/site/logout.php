<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enjoy It</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--JQuery-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="vertical-news-slider-master/css/vertical.news.slider.css">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!--Date Picker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- My CSS-->
    <link rel="stylesheet" href="../css/style.css" >

    <!--DATEPICKER-->
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</head>
<body>
<div class="container">
    <header >
        <nav class="header">

            <!--LOGO-->
            <a href="index.html">
                <img alt="Joit It" src="../images/Logotip.png" class="menu-top-logo">
            </a>

            <!--MENU-->
            <nav class="navbar">
                <div class="menu-top">
                    <!--MENU-->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav-menu-top navbar-nav">
                            <li><a href="events.html">Events</a></li>
                            <li><a href="places.html">Places</a></li>
                            <li><a href="users.html">Users</a></li>
                            <li><a href="logout.html">Logout</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <!--MOBILE MENU-->
            <nav class="mobile_menu">
                <input type="checkbox" id="nav-toggle" hidden>
                <nav class="nav">
                    <label for="nav-toggle" class="nav-toggle" onclick></label>
                    <a href="index.html">
                        <img alt="Joit It" src="../images/Logotip.png" class="mobile-logo">
                    </a>
                    <ul class="navbar-nav mobile_menu_list">
                        <li><a href="events.html">Events</a></li>
                        <li><a href="places.html">Places</a></li>
                        <li><a href="users.html">Users</a></li>
                        <li><a href="logout.html">Logout</a></li>
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
    <form id="form">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 facebook_account">

                <p>Create youre account</p>
                <p>Sign in with your Facebook account</p>


                <button type="submit" class="btn btn_facebook">Facebook</button>
                <button type="reset" class="btn btn_cancel" onclick='location.href="index.html"'>Cancel</button>
            </div>

            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 or">
                <h2>or</h2>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 login">
                <div class="form-group">
                    <label for="first_name_form">Name or Login</label>
                    <input type="text" class="form-control" id="first_name_form" placeholder="Name or Login ">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                    <label for="password_form">Password</label>
                    <input type="text" class="form-control" id="password_form" placeholder="Password">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <button type="button" class="btn btn_log_in" data-toggle="modal" data-target="#myModal">Log in</button>
                <button type="reset" class="btn btn_cancel" onclick='location.href="index.html"'>Cancel</button>
            </div>

        </div>
    </form>
        <!--MODAL WINDOW-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="cross" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your message is safed
                </div>
            </div>
        </div>

    </main>
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
                        <img src="../images/facebook.png" style="width: 30px; height: 30px">
                    </a>
                    <a href="#">
                        <img src="../images/facebook.png" style="width: 30px; height: 30px">
                    </a>
                    <a href="#">
                        <img src="../images/facebook.png" style="width: 30px; height: 30px">
                    </a>
                    <a href="#">
                        <img src="../images/facebook.png" style="width: 30px; height: 30px">
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3 footer_year_manufacture">
                    <b>2018</b>
                </div>
            </div>
        </nav>
    </footer>
</div>
</body>
</html>