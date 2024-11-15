<!-- Start of Footer section
	============================================= -->
<footer id="ori-footer" class="ori-footer-section footer-style-one">
    <div class="container">
        <div class="ori-footer-title text-center text-uppercase">
            <a href="/careers"><h2>Jobs <i class="fas fa-arrow-right"></i></h2></a>
        </div>
        <div class="ori-footer-widget-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ori-footer-widget">
                        <div class="logo-widget">
                            <a href="/"><img
                                        src="<?php echo get_template_directory_uri() . '/assets/img/logo-teg-color.png' ?>"
                                        alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ori-footer-widget">
                        <div class="menu-location-widget ul-li-block">
                            <h2 class="widget-title text-uppercase">Navigație</h2>
                            <ul>
                                <?php
                                $menu = get_menu_with_children("FooterMenu");
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ori-footer-widget">
                        <div class="contact-widget ul-li-block">
                            <h2 class="widget-title text-uppercase">Informații de contact</h2>
                            <div class="contact-info">
                                <span>Timișoara</span>
                                <span><a href="tel:0767850052">+40 767 850 052</a></span>
                                <span>hello@teg.ro</span>
                                <span>Disponibil: 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ori-footer-widget">
                        <div class="contact-widget ul-li-block">
                            <h2 class="widget-title text-uppercase">Asistență și informații</h2>
                            <div class="contact-info">
                                <span>Politică cookies</span>
                                <span>Politică de confidențialitate</span>
                                <a href="#">ANPC</a>
                                <span>ANPC - SAL</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="col-lg-3 col-md-6">-->
                <!--                    <div class="ori-footer-widget">-->
                <!--                        <div class="newslatter-widget ul-li-block">-->
                <!--                            <h2 class="widget-title text-uppercase">Newslatter</h2>-->
                <!--                            <div class="newslatter-form">-->
                <!--                                <form action="#" method="get">-->
                <!--                                    <input type="email" name="email" placeholder="Enter mail">-->
                <!--                                    <button type="submit">Subscribe <i class="fas fa-paper-plane"></i></button>-->
                <!--                                </form>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>
        <div class="ori-footer-copyright d-flex justify-content-between">
            <div class="ori-copyright-text">
                © 2024 All Rights Reserved - The Entertainment Group
            </div>
            <div class="ori-copyright-social">
                <a href="https://www.facebook.com/theentertainmentgroup.ro"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/theentertainmentgroup.ro/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/theentertainmentgroupromania/"><i class="fab fa-linkedin"></i></a>
                <!--                <a href="#"><i class="fab fa-youtube"></i></a>-->
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer section
	============================================= -->

<!-- For Js Library -->
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery-ui.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/popper.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/appear.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/slick.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/twin.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/wow.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/knob.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.filterizr.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/rbtools.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/rs6.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jarallax.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.inputarrow.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/swiper.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.counterup.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/waypoints.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.marquee.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/script.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/products-filter.js' ?>"></script>
<?php wp_footer(); ?>
</body>

</html>