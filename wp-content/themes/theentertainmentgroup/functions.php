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