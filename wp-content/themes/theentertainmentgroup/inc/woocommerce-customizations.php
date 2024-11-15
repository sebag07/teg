<?php
// Remove default WooCommerce elements
function remove_default_wc_elements(): void
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);  // Add this line
}

add_action('init', 'remove_default_wc_elements');

// Add your custom product loop
function my_custom_product_loop(): void
{
    // Get current category if we're on a category archive
    $current_category = get_queried_object();

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    // Add category filter if we're on a category page
    if ($current_category instanceof WP_Term && $current_category->taxonomy === 'product_cat') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $current_category->term_id,
            ),
        );
    }

    $products_query = new WP_Query($args);
    ?>
    <div class="ori-shop-top-filter-bar d-flex align-items-center justify-content-between">
        <div class="ori-filter-result">
            <?php
            $total = $products_query->found_posts;
            $current_category = get_queried_object();

            if ($current_category instanceof WP_Term && $current_category->taxonomy === 'product_cat') {
                printf('%s (%d produse)', $current_category->name, $total);
            } else {
                printf('%d Produse', $total);
            }
            ?>
        </div>
    </div>
    <div class="ori-shop-feed-post-items">
        <div class="row">
            <?php
            if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $product = wc_get_product();

                    $product_cats = get_the_terms(get_the_ID(), 'product_cat');
                    $cat_slugs = [];
                    if ($product_cats) {
                        foreach ($product_cats as $cat) {
                            $cat_slugs[] = $cat->slug;
                        }
                    }
                    ?>
                    <div class="col-sm-6 col-md-4" data-categories="<?php echo implode(',', $cat_slugs); ?>">
                    <div class="ori-shop-inner-item text-center">
                            <div class="shop-img-cart-btn position-relative">
                                <div class="shop-img">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                         alt="<?php echo get_the_title(); ?> image">
                                </div>
                                <div class="add-cart-btn text-uppercase text-center">
                                    <a href="<?php echo get_the_permalink(); ?>" class="btn">Vezi produs</a>
                                </div>
                            </div>
                            <div class="shop-text">
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata(); // Important: reset the query
            }
            ?>
        </div>
    </div>
    <?php
}

add_action('woocommerce_before_shop_loop', 'my_custom_product_loop', 20);