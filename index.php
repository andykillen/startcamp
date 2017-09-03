<?php

get_header();


if(is_singular() || is_feed()){ 
    /**
     * Will load for singleloop-POST_TYPE_NAME.php if it exists,
     * otherwise it will default back to singleloop.php.
     * 
     * This is also loaded for is_feed() if your using instant articles
     * to keep the content the same.
     */
    get_template_part('partials/singleloop',  get_post_type());
} elseif (is_archive()) {
    /**
     * Will load for archiveloop-TAXONOMY_NAME.php if it exists,
     * otherwise it will default back to archiveloop.php.
     */
    get_template_part('partials/archiveloop');
} else {
    /**
     * For all other loops.
     */
    get_template_part('partials/loop');
}

get_footer();