<?php

function get_product_price() {
    // Get the current product ID
    $product_ID = get_the_ID();
    
    // Get the WooCommerce product object
    $product = wc_get_product($product_ID);
    
    // Check if the product object is valid
    if (is_a($product, 'WC_Product')) {
        // Return the price 
        return $product->get_price_html(); // Use ->get_price() instead of ->get_price_html() for raw price
    }
    
    // Return an empty string if the product is not valid
    return '';
}
