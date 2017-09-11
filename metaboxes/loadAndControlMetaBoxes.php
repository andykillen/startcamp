<?php
function get_metabox_posttype(){
    return array('people','sponsors','talks','venues');
}

foreach(get_metabox_posttype() as $file){
    require "$file.php";
}

// actions
//
add_action('admin_menu', 'startcamp_meta_box', 100); // show general meta
add_action('save_post', 'startcamp_save_meta_data', 1); // save general meta

function startcamp_meta_box() {
    foreach(get_metabox_posttype() as $type){
        add_meta_box('page-meta-boxes', __($type.' configuration', 'startcamp'), 'custom_meta_boxes', $type, 'normal', 'high');
    }
}

function clear_divider($array) {
    foreach ($array as $key => $data) {
        if ($data['type'] == 'divider') {
            unset($array[$key]);
        }
    }
    return $array;
}

function get_linkable_data($post_type){
    
    $arg = array(
      'post_type'      => $post_type,
      'posts_per_page' => -1,
      'post_status'    => 'publish',        
    );
    $output[] = '-- select --';  
    $loop = new WP_Query($arg);
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $output[get_the_ID()]= get_the_title();
        endwhile;
    endif;
    return $output;
}

//
// save posts
//
function startcamp_save_meta_data($post_id) {

    global $post;

    if (isset($post) && !empty($post)) {
        
        switch ($post->post_type) {                                   
            case 'people':
                $meta_boxes = people_meta_boxes();
                break; 
            case 'talks':
                $meta_boxes = people_meta_boxes();
                break;  
            case 'venues':
                $meta_boxes = people_rss_meta_boxes();
                break;
              case 'sponsors':
                $meta_boxes = sponsors_meta_boxes();
                break;
              
            default:
                $meta_boxes = array();
                break;
        }           
        
        $meta_boxes = clear_divider($meta_boxes); // needed or the save fails.
        
        foreach ($meta_boxes as $meta_box) :
            
            if (!wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], $meta_box['name'] . '_noncename')) {
                error_log("no no no, not verified : " .$meta_box['name'] );
                return $post_id;
            }

            if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
              error_log("cannot edit : " .$meta_box['name'] );
                return $post_id;
            } elseif ('post' == $_POST['post_type'] && !current_user_can('edit_post', $post_id)) {
                error_log("no rights : " .$meta_box['name'] );
                return $post_id;
            }

            $data = stripslashes($_POST[$meta_box['name']]);          

            if (get_post_meta($post_id, $meta_box['name']) == '')
                add_post_meta($post_id, $meta_box['name'], $data, true);

            elseif ($data != get_post_meta($post_id, $meta_box['name'], true))
                update_post_meta($post_id, $meta_box['name'], $data);

            elseif ($data == '')
                delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));

        endforeach;
    }
    
}

function custom_meta_boxes() {
    global $post;
    switch ($post->post_type) {                  
        case 'people':
            $meta_boxes = people_meta_boxes();
            break; 
        case 'talks':
            $meta_boxes = people_meta_boxes();
            break;  
        case 'venues':
            $meta_boxes = people_rss_meta_boxes();
            break;
          case 'sponsors':
            $meta_boxes = sponsors_meta_boxes();
            break;
        default:
            $meta_boxes = array();
            break;
    }

    $fields = new StartCampMetaboxFields();
    ?>        
    <table class="form-table">
    <?php
    foreach ($meta_boxes as $meta) :
        $value = get_post_meta($post->ID, $meta['name'], true);
        switch ($meta['type']) {
            case 'text':
                $fields->get_meta_text_input($meta, $value);
                break;
            case 'textarea':
                $fields->get_meta_textarea($meta, $value);
                break;
            case 'select':
                $fields->get_meta_select($meta, $value);
                break;
            case 'checkbox':
                $fields->get_meta_checkbox($meta, $value);
                break;
            case 'radio':
                $fields->get_meta_radio($meta, $value);
                break;
            case 'radioicons':
                $fields->get_meta_radio_icons($meta, $value);
                break;  
            case 'media':
                $fields->get_meta_media_upload($meta, $value);
                break;
            case 'divider':
                $fields->get_divider();
                break;
            case 'post':
                $fields->get_meta_posts_dropdown($meta, $value);
                break;
            case 'hidden':
                $fields->get_hidden($meta, $value);
                break;
            case 'screen':
                $fields->get_meta_radio_screen_choice($meta,$value);
                break;
        }

    endforeach;
    ?>
    </table>
<?php }