<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?= $title ?? 'Stukalov blog' ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/style1.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <!-- <li class=""><a href="">Свой собственный блог с блекджеком и на php</a></li> -->
                    <li class="cat-1"><a href="#">Новые</a></li>
                    <li class="cat-2"><a href="#">Популярные</a></li>
                    <li class="cat-3"><a href="#">PHP</a></li>
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->

                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- section-row -->
            <div class="section-row">
                <ul class="nav-aside-menu">
			        <?php if (!empty($user)): ?>
                        <li style="font-weight: bold">Привет, <?= $user->getNickname() ?>!
                            <a href="/../users/logout" name="exit">Выход</a>
                        </li>
                        <li><a href="/profile">Мой профиль</a></li>

				        <?php if ($user->isAdmin()): ?>
                            <li><a href="/../articles/add">Добавить статью</a></li>
                            <li><a href="/../admin/view/1">Последнии статьи</a></li>
                            <li><a href="/../admin/comments/1">Комментарии</a></li>
				        <? endif; ?>
			        <?php else: ?>
                        <li><a href="/../users/login">Вход</a></li>
                        <li><a href="/../users/register">Регистрация</a></li>
			        <?php endif; ?>
                </ul>
            </div>
            <!-- /section-row -->

            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="/">На главную</a></li>
                    <li><a href="/about">О сайте</a></li>
                    <li><a href="/contact">Контакты</a></li>
                </ul>
            </div>
            <!-- /nav -->

            <!-- social links -->
            <!--доделать
            <div class="section-row">
                <h3>Подписывайтесь</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            -->
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
</header>
<!-- /Header -->