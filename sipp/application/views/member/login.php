<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SYSCMS | LOGIN</title>
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

            <!--            <div id="wrapper">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                
                            </div>
                            <div id="login" class="animate form">
                                <section class="login_content">
                                    <form role="form" action="<?php echo site_url('member/auth/login') ?>" method="post">
            <?php
            echo form_open(current_url(), array('role' => 'form', 'class' => 'form-signin'));
            if (isset($_GET['location'])) {
                echo '<input type="hidden" name="location" value="';
                if (isset($_GET['location'])) {
                    echo htmlspecialchars($_GET['location']);
                }
                echo '" />';
            }
            ?>
                                        <h1>Admin Login</h1>
                                        <div>
                                            <input autofocus type="text" class="form-control" placeholder="Username" name="username" required="" />
                                        </div>
                                        <div>
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                                        </div>
                                        <div>
                                            <button class="btn btn-default submit" type="submit" >Log in</button>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="separator">
            
                                            <div class="clearfix"></div>
                                            <br />
                                            <div>
                                                <p>©2015 All Rights Reserved. Syscms. Privacy and Terms</p>
                                            </div>
                                        </div>
                                    </form>
                                     form 
                                </section>
                                 content 
                            </div>
                        </div>-->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-header">
                <marquee><h5>Selamat datang di halaman dashboard Member</h5></marquee>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 middle-login">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <center>
                            <ul id="clock">	
                                <li id="sec"></li>
                                <li id="hour"></li>
                                <li id="min"></li>
                            </ul>
                        </center>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 tbl-login">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Datang</th>
                                    <th>Pulang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bottom-login">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 left">
                        <form role="form" action="<?php echo site_url('member/auth/login') ?>" method="post">
                            <div class="form-group">
                                <h2>ABSENSI</h2>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input name="nip" typt="text" class="form-control" placeholder="Nip">
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-md-3" style="padding-left:0px">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="desc" value="0" > Datang
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="desc" value="1" > Pulang
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success btn-login" value="Submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <h2>BERITA</h2>
                            <div class="container content"> 
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators --> 
                                    <ol class="carousel-indicators"> 
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> 
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li> 
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li> 
                                    </ol> 
                                    <!-- Wrapper for slides --> 
                                    <div class="carousel-inner"> 
                                        <?php $i = 1;  foreach ($posts as $row): ?>
                                        <div class="item <?php echo ($i == 1)? 'active' : ''; ?>"> 
                                            <div class="row"> 
                                                <div class="col-xs-12"> 
                                                    <div class="thumbnail adjust1"> 
                                                        <div class="col-md-2 col-sm-2 col-xs-12"> 
                                                            <img class="media-object img-rounded img-responsive" src="<?php echo $row['posts_image'] ?>"> 
                                                        </div> 
                                                        <div class="col-md-10 col-sm-10 col-xs-12"> 
                                                            <div class="caption"> 
                                                                <p class="text-info lead adjust2"><?php echo $row['posts_title'] ?></p> 
                                                                <p><i> <?php echo pretty_date($row['posts_published_date'], 'l, d m Y', FALSE) ?></i></p> 
                                                                <blockquote class="adjust2"> <p><?php echo strip_tags(character_limiter($row['posts_title'], 250)) ?></p> 
                                                                </blockquote> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </div> 
                                        <?php $i++; endforeach; ?>
                                    </div> <!-- Controls --> 
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> 
                                        <span class="glyphicon glyphicon-chevron-left"></span> </a> 
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> 
                                        <span class="glyphicon glyphicon-chevron-right"></span> 
                                    </a> </div> 
                            </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 right">
                        <form role="form" action="<?php echo site_url('member/auth/login') ?>" method="post">
                            <div class="form-group">
                                <h2>LOGIN</h2>
                                <input name="nip" typt="text" class="form-control" placeholder="Nip">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                <input type="submit" class="btn btn-success btn-login" value="Login">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </body>

</html>