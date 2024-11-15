<?php
/**
 * The Template for displaying all single products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');

// At the top of the file, after get_header
global $product;

// Make sure we have a valid product
if (!is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}
?>

    <!-- Start of Breadcrumbs section -->
    <section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="assets/img/bg/bread-bg.png">
        <div class="container">
            <div class="ori-breadcrumb-content text-center ul-li">
                <h1><?php the_title(); ?></h1>
                <ul>
                    <li><a href="/rentals">Toate produsele</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
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
    <!-- End of Breadcrumbs section -->

    <!-- Start of Shop Details section
        ============================================= -->
    <section id="ori-shop-details" class="ori-shop-details-section position-relative">
        <div class="container">
            <div class="ori-shop-details-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ori-shop-details-slider-wrapper">
                            <div class="ori-shop-details-slide-for">
                                <?php
                                if ($product) {
                                    $attachment_ids = $product->get_gallery_image_ids();

                                    // Add featured image first
                                    if (has_post_thumbnail()) {
                                        echo '<div class="slider-inner-img">';
                                        echo "<img src='" . get_the_post_thumbnail_url($product->get_id(), 'full') . "' alt=''>";
                                        echo '</div>';
                                    }

                                    // Then add gallery images
                                    if (!empty($attachment_ids)) {
                                        foreach ($attachment_ids as $attachment_id) {
                                            echo '<div class="slider-inner-img">';
                                            echo "<img src='" . wp_get_attachment_image_url($attachment_id, 'full') . "' alt=''>";
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="ori-shop-details-slide-nav">
                                <?php
                                if ($product) {
                                    // Repeat for thumbnails
                                    if (has_post_thumbnail()) {
                                        echo '<div class="nav-inner-img">';
                                        echo "<img src='" . get_the_post_thumbnail_url($product->get_id(), 'full') . "' alt=''>";
                                        echo '</div>';
                                    }

                                    if (!empty($attachment_ids)) {
                                        foreach ($attachment_ids as $attachment_id) {
                                            echo '<div class="nav-inner-img">';
                                            echo "<img src='" . wp_get_attachment_image_url($attachment_id, 'full') . "' alt=''>";
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ori-shop-details-text-wrapper">
                            <div class="ori-shop-details-title">
                                <h3><?php echo $product->get_name(); ?></h3>
<!--                                <span class="pro_price">Preț: Cere ofertă</span>-->
                            </div>
                            <div class="ori-shop-details-desc">
                                <?php echo $product->get_short_description(); ?>
                            </div>
                            <div class="ori-shop-quantity-btn d-flex align-items-center">
                                <div class="add-cart-btn text-uppercase">
                                    <a href="<?php echo home_url('/cerere-oferta/') . '?wpf536_4=' . $product->get_id(); ?>">Cere ofertă</a>
                                </div>
                            </div>
                            <div class="ori-code-category ul-li-block">
                                <ul>
                                    <li><span>SKU:</span> <?php echo $product->get_sku(); ?></li>
                                    <li>
                                        <span>Categorie:</span>
                                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                                    </li>
                                    <li>
                                        <span>Tag:</span>
                                        <?php echo wc_get_product_tag_list($product->get_id()); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ori-shop-related-product">
                <h3>Produse similare</h3>
                <div class="ori-related-product-content">
                    <div class="row">
                        <?php
                        $related_products = wc_get_related_products($product->get_id(), 4);

                        foreach ($related_products as $related_product_id) {
                            $related_product = wc_get_product($related_product_id);
                            ?>
                            <div class="col-md-3">
                                <div class="ori-shop-inner-item text-center">
                                    <div class="shop-img-cart-btn position-relative">
                                        <?php if ($related_product->is_on_sale()) : ?>
                                            <span class="label-tag position-absolute">Sale!</span>
                                        <?php endif; ?>
                                        <div class="shop-img">
                                            <?php echo get_the_post_thumbnail($related_product_id, 'full'); ?>
                                        </div>
                                        <div class="add-cart-btn text-uppercase text-center">
                                            <a href="<?php echo get_permalink($related_product_id); ?>">Vezi produs</a>
                                        </div>
                                    </div>
                                    <div class="shop-text">
                                        <h3><a href="<?php echo get_permalink($related_product_id); ?>"><?php echo $related_product->get_name(); ?></a></h3>
                                        <span class="pro_price"><?php echo $related_product->get_price_html(); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
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
    <!-- End of Shop Details  section
        ============================================= -->

<?php
get_footer('shop');
?>