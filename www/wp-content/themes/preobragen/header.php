<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Жилой комплекс Преображенский</title>
    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <header class="header">
        <div class="head_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <div class="logo">
                            <a href="/">
                                <img src="<?php bloginfo('template_url');?>/img/logo.png" alt="Жилой комплекс Преображенский">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="descr">
                            <p>Жилой комплекс<br><span>Преображенский</span></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="phone">
                            <a href="#">+7 (861) 945 05 15</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right_button">
                            <a href="#" class="btn">Позвонить мне за 30 секунд</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .head_top -->
        <nav class="main_menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--<ul class="menu">
                            <li><a href="#">214 Ф3</a></li>
                            <li><a href="#">Ипотека</a></li>
                            <li><a href="#">Материнский капитал</a></li>
                            <li><a href="#">Планировки квартир</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Студия</a></li>
                                    <li><a href="#">1 к. квартира 44 м<sup>2</sup></a></li>
                                    <li><a href="#">1 к. квартира 64 м<sup>2</sup></a></li>
                                    <li><a href="#">2 к. квартира 64 м<sup>2</sup></a></li>
                                    <li><a href="#">2 к. квартира 74 м<sup>2</sup></a></li>
                                </ul>
                            </li>
                            <li><a href="#">Офис продаж</a></li>
                            <li><a href="#">Расположение ЖК</a></li>
                            <li><a href="#">Ход строительства</a></li>
                        </ul> -->
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'header_menu',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav',
                        )); ?>
                    </div>
                </div>
            </div>
        </nav><!-- .main_menu -->
    </header><!-- .header -->
