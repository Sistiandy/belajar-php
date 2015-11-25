<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SYSCMS | PORTAL</title>
        <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

        <!-- Bootstrap core CSS -->

        <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo media_url() ?>/css/custom.css" rel="stylesheet">

        <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>
        <script src="<?php echo media_url() ?>/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
            }

            #clock {
                position: relative;
                width: 250px;
                height: 250px;
                margin: 0px auto 0 auto;
                background: url(<?php echo media_url() ?>/images/clockface.png);
                list-style: none;
            }

            #sec, #min, #hour {
                position: absolute;
                width: 10px;
                height: 250px;
                top: 0px;
                left: 120px;
            }

            #sec {
                background: url(<?php echo media_url() ?>/images/sechand.png);
                z-index: 3;
            }

            #min {
                background: url(<?php echo media_url() ?>/images/minhand.png);
                z-index: 2;
            }

            #hour {
                background: url(<?php echo media_url() ?>/images/hourhand.png);
                z-index: 1;
            }

            .carousel-indicators .active{ background: #31708f; } .adjust1{ float:left; width:100%; margin-bottom:0; } .adjust2{ margin:0; } .carousel-indicators li{ border :1px solid #ccc; } .carousel-control{ color:#31708f; width:5%; } .carousel-control:hover, .carousel-control:focus{ color:#31708f; } .carousel-control.left, .carousel-control.right { background-image: none; } .media-object{ margin:auto; margin-top:15%; } @media screen and (max-width: 768px) { .media-object{ margin-top:0; } }

            .text-footer{
                margin-top:15px;
            }

            .footer{
                background-color: #446CB3;
                color:white;
            }

            .icons{
                color: white;
                background-color:#52B3D9;
                font-size: 70pt;
                /*padding-left: 50px;*/
                height:140px;
            }

            .texts{
                color: #E4F1FE;
                background-color:#52B3D9;
                font-size: 40pt;
                padding-left: 30px;
                padding-top: 20px;
                padding-bottom: 48px;
                height:140px;
            }

            .modul{
                margin-top:40px;
            }

        </style>
        <script type="text/javascript">

            $(document).ready(function() {

                setInterval(function() {
                    var seconds = new Date().getSeconds();
                    var sdegree = seconds * 6;
                    var srotate = "rotate(" + sdegree + "deg)";

                    $("#sec").css({"-moz-transform": srotate, "-webkit-transform": srotate});

                }, 1000);


                setInterval(function() {
                    var hours = new Date().getHours();
                    var mins = new Date().getMinutes();
                    var hdegree = hours * 30 + (mins / 2);
                    var hrotate = "rotate(" + hdegree + "deg)";

                    $("#hour").css({"-moz-transform": hrotate, "-webkit-transform": hrotate});

                }, 1000);


                setInterval(function() {
                    var mins = new Date().getMinutes();
                    var mdegree = mins * 6;
                    var mrotate = "rotate(" + mdegree + "deg)";

                    $("#min").css({"-moz-transform": mrotate, "-webkit-transform": mrotate});

                }, 1000);

            });

        </script>

    </head>


    <body style="background:#E4F1FE;">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-login">
                <center>
                    <h1>SISTEM INFORMASI PRESENSI PRAKRIN</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-header">
                <marquee><h5>Selamat datang di halaman dashboard Admin</h5></marquee>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <center>
                                <h2><strong><?php echo pretty_date(date('Y-m-d'), 'l, d M Y', FALSE) ?></strong></h2>
                            </center>
                        </div>
                        <div class="row">
                            <center>
                                <ul id="clock">	
                                    <li id="sec"></li>
                                    <li id="hour"></li>
                                    <li id="min"></li>
                                </ul>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <br>

        <div class="row">
            <a href="<?php echo site_url('member') ?>">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="padding:0px">
                <div class="modul texts">
                    <center>
                        <i class="fa fa-users"></i>
                        <i>MEMBER</i>
                    </center>
                </div>
            </div>
            </a>

            <a href="<?php echo site_url('member') ?>">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"  style="padding:0px">
                <div class="modul texts">
                    <center>
                        <i class="fa fa-lock"></i>
                        <i>ADMIN</i>
                    </center>
                </div>
            </div>
            </a>
        </div>


        <nav class="navbar navbar-default navbar-fixed-bottom footer">
            <div class="container">
                <div class="row">
                    <center>
                        <p class="text-footer">
                            Copyright © 2015 SIPP  |  @Sistiandy
                        </p>
                    </center>
                </div>
            </div>
        </nav>
    </body>

</html>