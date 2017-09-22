<?php
if(function_exists('wp_pagenavi')){
    wp_pagenavi();
} else {
    the_posts_pagination( array(
        'prev_text'             => '<span class="screen-reader-text">' . __( 'Previous page', 'startcamp' ) . '</span>',
        'next_text'             => '<span class="screen-reader-text">' . __( 'Next page', 'startcamp' ) . '</span>' ,
        'before_page_number'    => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'startcamp' ) . ' </span>',
    ) );
}
