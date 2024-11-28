<?php

function theme_featured_image(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_featured_image');


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}


function get_menu_with_children($menu_name){
    $navbar_items = wp_get_nav_menu_items($menu_name);
    $menu_with_children = array();
    $child_items = [];

    // pull all child menu items into separate object
    foreach ( (array) $navbar_items as $key => $item) {
        if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
    }

    // push child items into their parent item in the original object
    foreach ( (array) $navbar_items as $item) {
        foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->ID) {
                if (!$item->child_items) {
                    $item->child_items = [];
                }

                array_push($item->child_items, $child);
                unset($child_items[$key]);
            }
        }
    }

    return $navbar_items;
    }

add_action('after_setup_theme', function() {
    add_theme_support('woocommerce');
});

// In functions.php
require_once get_template_directory() . '/inc/woocommerce-customizations.php';

function allow_google_image_mime_types($mime_types) {
    $mime_types[''] = 'image/jpeg'; // Allow images without extensions (e.g., from Google)
    $mime_types['jpg'] = 'image/jpeg';
    $mime_types['jpeg'] = 'image/jpeg';
    $mime_types['png'] = 'image/png';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_google_image_mime_types');


function import_products_from_html() {
    $file_path = ABSPATH . 'catalog-entertainment-group.html';

    // Check if the file exists
    if (!file_exists($file_path)) {
        die('HTML file not found!');
    }

    $html = file_get_contents($file_path);

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    libxml_clear_errors();

    $rows = $dom->getElementsByTagName('tr');

    $current_category_name = '';
    $current_category_slug = '';

    foreach ($rows as $row) {
        $cells = $row->getElementsByTagName('td');

        // Skip rows with header or empty content
        if ($cells->length > 0) {
            $first_cell_value = trim($cells->item(0)->nodeValue);
            if ($first_cell_value === 'Denumire' || $first_cell_value === '') {
                continue;
            }
        }

        // Check if row is a category
        if ($cells->length == 1) {
            $current_category_name = trim($cells->item(0)->nodeValue);

            // Ensure category exists
            if (taxonomy_exists('product_cat')) {
                $term = get_term_by('name', $current_category_name, 'product_cat');
                if (!$term) {
                    $new_term = wp_insert_term($current_category_name, 'product_cat');
                    $current_category_slug = !is_wp_error($new_term) ? $new_term['slug'] : sanitize_title($current_category_name);
                } else {
                    $current_category_slug = $term->slug;
                }
            } else {
                $current_category_slug = sanitize_title($current_category_name); // Fallback
            }

            continue;
        }

        // Check if row contains product data
        if ($cells->length > 1) {
            $raw_name = trim($cells->item(0)->nodeValue);
            $unit = trim($cells->item(1)->nodeValue);
            $quantity = trim($cells->item(2)->nodeValue);
            $price = trim($cells->item(3)->nodeValue);
            $image_node = $cells->item(4)->getElementsByTagName('img')->item(0);

            // Extract and modify the image URL
            $image_src = $image_node ? $image_node->getAttribute('src') : '';
            if ($image_src) {
                // Replace width and height parameters
                $image_src = preg_replace('/\b=w\d+-h\d+/', '', $image_src);
            }

            // Replace "<br>" and "<br><br>" in name
            $cleaned_name = str_replace('<br><br>', ' - ', $raw_name);
            $cleaned_name = str_replace('<br>', ' ', $cleaned_name);

            // Check if the product already exists
            $existing_product = get_page_by_title($cleaned_name, OBJECT, 'product');
            if ($existing_product) {
                echo "Product '{$cleaned_name}' already exists. Skipping import.\n";
                continue;
            }

            // Create the product
            $post_id = wp_insert_post([
                'post_title'   => $cleaned_name,
                'post_content' => "Quantity: {$quantity} {$unit} <br> {$cleaned_name}",
                'post_status'  => 'publish',
                'post_type'    => 'product',
            ]);


            if (!function_exists('media_sideload_image')) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
                require_once ABSPATH . 'wp-admin/includes/media.php';
                require_once ABSPATH . 'wp-admin/includes/image.php';
            }

            if ($post_id) {
                // Assign category
                wp_set_object_terms($post_id, $current_category_slug, 'product_cat');

                // Process and attach the image
                if ($image_src) {
                    $temp_file = download_url($image_src);

                    if (is_wp_error($temp_file)) {
                        echo "Error downloading image for '{$cleaned_name}': " . $temp_file->get_error_message() . "\n";
                        continue;
                    }

                    $file = [
                        'name'     => 'imported-image.jpg', // Use a default name
                        'tmp_name' => $temp_file,
                    ];

                    $attachment_id = media_handle_sideload($file, $post_id);

                    if (!is_wp_error($attachment_id)) {
                        set_post_thumbnail($post_id, $attachment_id);
                    } else {
                        echo "Error attaching image for '{$cleaned_name}': " . $attachment_id->get_error_message() . "\n";
                    }

                    @unlink($temp_file); // Cleanup temp file
                }

                echo "Product '{$cleaned_name}' imported successfully.\n";
            }
        }
    }

    echo 'Products import completed!';
}

add_action('init', function() {
//    import_products_from_html();
}, 20); // Priority 20 to ensure WooCommerce has loaded

//function delete_all_products() {
//    // Get all products
//    $args = [
//        'post_type'      => 'product',
//        'post_status'    => 'any',
//        'posts_per_page' => -1, // Retrieve all products
//    ];
//
//    $products = get_posts($args);
//
//    if (!empty($products)) {
//        foreach ($products as $product) {
//            // Delete the product
//            wp_delete_post($product->ID, true); // true = force delete (bypass trash)
//            echo "Deleted product ID: " . $product->ID . "\n";
//        }
//        echo 'All products have been deleted.';
//    } else {
//        echo 'No products found to delete.';
//    }
//}
//add_action('init', 'delete_all_products');


