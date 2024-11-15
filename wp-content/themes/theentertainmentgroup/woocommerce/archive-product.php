<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

    <!-- Start of Breadcrumbs  section
        ============================================= -->
    <section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="assets/img/bg/bread-bg.png">
        <div class="container">
            <div class="ori-breadcrumb-content text-center ul-li">
                <h1><?php woocommerce_page_title(); ?></h1>
<!--                <ul>-->
<!--                    <li><a href="index.html">orixy</a></li>-->
<!--                    <li>Shop</li>-->
<!--                </ul>-->
            </div>
        </div>
        <div class="line_animation">
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
            <div class="line_area"></div>
        </div>
    </section>
    <!-- End of Breadcrumbs section
        ============================================= -->

    <div class="shop-container">

        <!-- Start of Shop Feed Post section
	============================================= -->
        <section id="ori-shop-feed" class="ori-shop-feed-section">
            <div class="container">
                <div class="ori-shop-feed-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ori-shop-feed-post-content">
                                <div class="ori-shop-feed-post-items">
                                    <div class="row">
                                        <?php
                                        if ( woocommerce_product_loop() ) {
                                            do_action( 'woocommerce_before_shop_loop' );
                                            // Your custom product loop function will be called here through the hook
                                            do_action( 'my_custom_product_loop' );
                                            do_action( 'woocommerce_after_shop_loop' );
                                        } else {
                                            do_action( 'woocommerce_no_products_found' );
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ori-shop-sidebar-wrap">
                                <div class="ori-shop-sidebar-widget">
                                    <div class="category-widget ul-li-block">
                                        <h3 class="widget-title">Categorii de produse</h3>
                                        <ul>
                                            <?php
                                            // Add "All" option
                                            printf(
                                                '<li><a href="#" data-category="all" class="category-filter active">%s<span>(%d)</span></a></li>',
                                                'Toate',
                                                wp_count_posts('product')->publish
                                            );

                                            $product_categories = get_terms(array(
                                                'taxonomy' => 'product_cat',
                                                'hide_empty' => true,
                                            ));

                                            if (!empty($product_categories) && !is_wp_error($product_categories)) {
                                                foreach ($product_categories as $category) {
                                                    printf(
                                                        '<li><a href="#" data-category="%s" class="category-filter">%s<span>(%d)</span></a></li>',
                                                        $category->slug,
                                                        $category->name,
                                                        $category->count
                                                    );
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
<!--                                <div class="ori-shop-sidebar-widget">-->
<!--                                    <div class="tag-widget ul-li">-->
<!--                                        <h3 class="widget-title">Tags</h3>-->
<!--                                        <ul>-->
<!--                                            --><?php
//                                            // Add "All" option
//                                            printf(
//                                                '<li><a href="#" data-category="all" class="category-filter active">%s</a></li>',
//                                                'Toate'
//                                            );
//
//                                            $product_tags = get_terms(array(
//                                                'taxonomy' => 'product_cat',
//                                                'hide_empty' => true,
//                                            ));
//
//                                            if (!empty($product_tags) && !is_wp_error($product_tags)) {
//                                                foreach ($product_tags as $tag) {
//                                                    printf(
//                                                        '<li><a href="#" data-category="%s" class="category-filter">%s</a></li>',
//                                                        $tag->slug,
//                                                        $tag->name
//                                                    );
//                                                }
//                                            }
//                                            ?>
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="shop-main">
        </div>
    </div>

<?php get_footer( 'shop' ); ?>