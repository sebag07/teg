<!doctype html>
<html lang="en">
<head>

    <title><?php echo get_bloginfo('name'); ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/fontawesome-all.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/animate.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/video.min.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/slick-theme.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/slick.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/global.css'?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/style.css'?>">

    <link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css' ?>">

    <?php wp_head(); ?>
</head>
<body <?php post_class('ori-digital-studio'); ?>>

<!--<div id="preloader"></div>-->
<!--<div class="up">-->
<!--    <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>-->
<!--</div>-->
<!--<div class="cursor"></div>-->

<!-- Start of header section
	============================================= -->
<header id="ori-header" class="ori-header-section header-style-one">
    <div class="ori-header-content-area">
        <div class="ori-header-content d-flex align-items-center justify-content-between">
            <div class="brand-logo">
                <a href="/"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo-teg-color.png';?>" alt=""></a>
            </div>
            <div class="ori-main-navigation-area">
                <nav class="ori-main-navigation clearfix ul-li">
                    <ul id="main-nav" class="nav navbar-nav clearfix">
                    <?php
                  $menu = get_menu_with_children("PrimaryMenu");
                  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                  foreach ($menu as $item) {
                    if (isset($item->child_items)) {
                      echo "<li class='has-children dropdown'><a href='$item->url' class='nav-link'>$item->title</a>
                            <ul class='dropdown-menu clearfix'>";
                      foreach ($item->child_items as $child_item) {
                        echo "<li><a href='$child_item->url'>$child_item->title</a></li>";
                      }
                      echo "</ul>
                            </li>";
                    } else {
                      echo "<li><a href='$item->url'>$item->title</a></li>";
                    }
                }
                    ?>
                    </ul>
                </nav>
            </div>
            <div class="ori-header-sidebar-search d-flex align-items-center">
                <div class="ori-search-btn">
                    <button class="search-box-outer"><i class="fal fa-search"></i></button>
                </div>
                <div class="ori-sidenav-btn navSidebar-button">
                    <button><i class="fal fa-bars"></i></button>
                </div>
            </div>
        </div>
        <div class="mobile_menu position-relative">
            <div class="mobile_menu_button open_mobile_menu">
                <i class="fal fa-bars"></i>
            </div>
            <div class="mobile_menu_wrap">
                <div class="mobile_menu_overlay open_mobile_menu"></div>
                <div class="mobile_menu_content">
                    <div class="mobile_menu_close open_mobile_menu">
                        <i class="fal fa-times"></i>
                    </div>
                    <div class="m-brand-logo">
                        <a href="/"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo-teg-color.png';?>" alt=""></a>
                    </div>
                    <nav class="mobile-main-navigation  clearfix ul-li">
                    <ul id="m-main-nav" class="nav navbar-nav clearfix">
                    <?php
                  $menu = get_menu_with_children("PrimaryMenu");
                  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                  foreach ($menu as $item) {
                    if (isset($item->child_items)) {
                      echo "<li class='has-children dropdown'><a href='$item->url' class='nav-link'>$item->title</a>
                            <ul class='dropdown-menu clearfix'>";
                      foreach ($item->child_items as $child_item) {
                        echo "<li><a href='$child_item->url'>$child_item->title</a></li>";
                      }
                      echo "</ul>
                            </li>";
                    } else {
                      echo "<li><a href='$item->url'>$item->title</a></li>";
                    }
                }
                    ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /Mobile-Menu -->
        </div>
    </div>
</header><!-- /header -->

<!-- Search PopUp -->
<div class="search-popup">
    <button class="close-search style-two"><span class="fal fa-times"></span></button>
    <button class="close-search"><span class="fa fa-arrow-up"></span></button>
    <form method="post" action="blog.html">
        <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search Here" required="">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!-- Sidebar sidebar Item -->
<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black">
        <div class="row loader-area">
            <div class="col-3 preloader-wrap">
                <div class="loader-bg"></div>
            </div>
            <div class="col-3 preloader-wrap">
                <div class="loader-bg"></div>
            </div>
            <div class="col-3 preloader-wrap">
                <div class="loader-bg"></div>
            </div>
            <div class="col-3 preloader-wrap">
                <div class="loader-bg"></div>
            </div>
        </div>
    </div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    X
                </a>
            </div>
            <div class="sidebar-textwidget">

                <div class="sidebar-info-contents headline pera-content">
                    <div class="content-inner">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-teg-color.png';?>" alt="">
                        </div>
                        <div class="content-box">
                            <h5>Despre noi</h5>
                            <p class="text">The Entertainment Group este o forță dinamică și experimentată în lumea organizării de evenimente. Sub forma unei agenții de evenimente  pune în scenă experiențe memorabile prin evenimentele pe care le inițiază și le construiește de la concept până la atragerea publicului și participare. </p>
                            <p class="text">Cu o echipă ce are experiența a peste 500 de evenimente reușite, The Entertainment Group a devenit un nume cunoscut pentru cei 200.000 de participanți care au trăit momente unice la diversele  producții realizate sub această umbrelă. Experiența vastă a echipei, ce se întinde pe mai mult de un deceniu, este evidentă în detaliile rafinate și în execuția fără cusur a fiecărui eveniment.</p>
                            <p class="text">Astfel, The Entertainment Group se impune ca un lider inovator în industria evenimentelor, un partener de încredere pentru organizatori și un creator de momente inegalabile pentru participanți, fiind o piatră de temelie a scenei de evenimente din Timișoara și dincolo de aceasta.</p>
                        </div>
                        <div class="content-box">
                            <h5>Social Media</h5>
                            <ul class="social-box">
                                <li><a href="https://www.facebook.com/theentertainmentgroup.r" class="fab fa-facebook-f"></a></li>
                                <li><a href="https://www.instagram.com/theentertainmentgroup.ro/" class="fab fa-instagram"></a></li>
                                <li><a href="https://www.linkedin.com/company/theentertainmentgroupromania/" class="fab fa-linkedin"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of header section
	============================================= -->

