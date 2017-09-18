<?php

/**
 * This is a very old class I have been carrying round for years.  I just
 * quickly slapped it in to do the job.  Creates fields based on being fed
 * arrays of data. Its only used on the metaboxes.
 * 
 * Probably I would not do things like this again, but its made and so cool.
 * 
 * @author Andrew Killen
 */
class StartCampMetaboxFields {
    
    /**
     * Create a text input field
     * 
     * @param array $args [width, echo, title, name, class, helper, default]
     * @param string $value the value of the field
     * @return type
     */
    public function get_meta_text_input( $args = array(), $value = false) {
        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
        if($value == false && isset($default)){
          $value = $default;
        }


        if(isset($echo) && $echo == 0 ){
          ob_start();
        } ?>
        <tr>
                <th <?php echo $width ?> >
                        <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
                </th>
                <td>
                        <input type="text" name="<?php echo $name; ?>" class="<?php if(isset($class)){ echo $class; } ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;" />
                        <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
                        <?php if(!empty($helper) ) {?>
                        <br/><small><?php echo $helper ?></small>
                        <?php } ?>
                </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
          $output = ob_get_contents();
          ob_end_clean();
          return $output;
        }
    }


    /**
     * Present a listing of all posts as a drop down select.
     * 
     * @global object $wpdb
     * @param array $args [width, echo, title, name, class, helper]
     * @param string $value
     * @return string
     */ 
    public function get_meta_posts_dropdown( $args = array(), $value = false ) {

        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
         if(isset($echo) && $echo == 0 ){
              ob_start();   
            }
        ?>
        <tr>
            <th <?php echo $width ?> >
                    <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </th>
            <td>
                <?php $val = esc_html( $value, 1 ); ?>                        
                <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" style="width: 97%;">
                    <option value=''><?php _e('Select a post','startcamp'); ?></option>
                     <?php
                     global $wpdb;
                     $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = 'post'  AND post_status ='publish' ";
                     $result = $wpdb->get_results($query);

                     foreach ($result as $row){
                         $selected = ($row->ID == $val) ? "selected" : "" ;
                         ?><option value='<?php echo $row->ID ?>'  <?php echo $selected ?>><?php echo $row->post_title ?></option><?php
                     }
                    ?>                                                                                            
                </select>

                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
                <?php if(!empty($helper) ) {?>
                <br/><small><?php echo $helper ?></small>
                <?php } ?>
            </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
              $output = ob_get_contents();
              ob_end_clean();
              return $output;
            }
    }

    /**
     * Create a textarea.
     * 
     * @param array $args [width, echo, title, name, class, helper]
     * @param string $value 
     * @return type
     */
    function get_meta_textarea( $args = array(), $value = false ) {

        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
         if(isset($echo) && $echo == 0 ){
            ob_start();
        }
        ?>

        <tr>
            <th <?php echo $width ?> >
                    <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </th>
            <td>
                <textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value, 1 ); ?></textarea>
                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
                <?php if(!empty($helper) ) {?>
                <br/><small><?php echo $helper ?></small>
                <?php } ?>
            </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }


    /**
     * Upload a file into the media library
     * 
     * @param array $args [width, echo, title, name, class, helper]
     * @param string $value
     * @param type $echo
     * @return type
     */
    public function get_meta_media_upload( $args = array(), $value = false, $echo = 1) {

        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
        if(isset($echo) && $echo == 0 ){
         ob_start();
       }
        ?>
        <tr>
            <th <?php echo $width ?> >
                    <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </th>
            <td>

                <table style="width:97%" class="media-upload"><tr>
                     <th><input id="<?php echo $name; ?>_button" value="Upload Media" type="button" class="button-secondary"/></th>
                     <td><input  class="<?php if(isset($class)){ echo $class; } ?>" id="<?php echo $name; ?>" size="36" name="<?php echo $name; ?>" type="text" value="<?php echo esc_html( $value, 1 ); ?>" style="width:100%"/></td>
                    </tr>
                </table>
                <script>
                    jQuery(document).ready(function() {

                        jQuery('#<?php echo $name; ?>_button').click(function() {
                         formfield = jQuery('#<?php echo $name; ?>').attr('name');
                         tb_show('','media-upload.php?type=image&amp;TB_iframe=true');
                         return false;
                        });
                        // send url back to plugin editor

                        window.send_to_editor = function(html) {
                         url = html.match(/'(.*)'/g);
                         output = url[0].replace(/\'/g,"");                             
                         jQuery('#<?php echo $name; ?>').val(output);
                         tb_remove();
                        }

                        });

                </script>

                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
                <?php if(!empty($helper) ) {?>
                <br/><small><?php echo $helper ?></small>
                <?php } ?>
            </td>
        </tr>
        <?php
       if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }

    }

    /**
     * Create a select drop down.
     * 
     * @param array $args [width, echo, title, name, class, helper, options]
     * @param string $value
     * @return string
     */
    public function get_meta_select( $args = array(), $value = false ) {

        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
        if(isset($echo) && $echo == 0 ){
            ob_start();
        }
        ?>

        <tr>
            <th <?php echo $width ?> >
                    <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </th>
            <td>                                
                <select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
                <?php foreach ( $options as $option => $item ) : ?>
                        <option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ){ echo ' selected="selected"';} ?> value="<?php echo ($option != 0 )?$option:'';

                                ?>" >
                                <?php echo $item; ?>
                        </option>
                <?php endforeach; ?>
                </select>
                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
           <?php if(!empty($helper) ) { ?>
                <br/><small><?php echo $helper ?></small>
            <?php } ?>
            </td>
        </tr>
      <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }

    /**
     * Make a singular checkbox.
     * 
     * @param array $args [width, echo, title, name, class, helper, options]
     * @param string $value
     * @return string
     */
    public function get_meta_checkbox( $args = array(), $value = false ) {
        extract( $args );
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
        if(isset($echo) && $echo == 0 ){
            ob_start();
        }
        $i =1;
        ?>
        <tr>
            <th <?php echo $width ?> >
                <?php foreach($options as $option => $item){ 
                        if(!isset($item['imcrement'])){
                            $imcrement = '';
                        }
                        else{
                            $imcrement = $item['imcrement'];
                        }

            if($i < 2){ ?>
                <label for="<?php echo $option; ?>"><?php echo $title; ?></label>
            </th>
            <td>
            <?php } ?>
                <input  id="<?php echo $option ?><?php echo $error_name?>" type="hidden" value="<?php echo $item['error_value'] ?>" name="<?php echo $option ?><?php echo $item['error_name'];?>">
                <input type="hidden" id="<?php echo $option ?><?php echo $imcrement ?>" name="<?php echo $option ?><?php echo $imcrement ?>" value="no"  />
                <input type="checkbox" id="<?php echo $option ?><?php echo $imcrement ?>" name="<?php echo $option ?><?php echo $imcrement ?>" value="yes" <?php if ( htmlentities( $item['value'], ENT_QUOTES ) == 'yes' ) echo ' checked'; ?>  />
                <label for="<?php echo $option ?><?php echo $imcrement ?>"><?php echo $option ?></label><br/>

                <?php $i++; }
                if(!empty($helper) ) {?>
                <br/><small><?php echo $helper ?></small>
                <?php } ?>
            </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }  
    }

    /**
     * Show a simple devider.  
     * 
     * @param bool $echo should it echo or return (false for return).
     */
    public function get_divider($echo = true){
        if(isset($echo) && $echo == 0 ){
                ob_start();
        }
        ?>
            <tr><th style="padding-top:1em; border-bottom: solid 1px #ccc" >                            
                </th><td style="padding-top:1em; border-bottom: solid 1px #ccc"></td></tr>
            <tr><th style="padding-top:1em;" ></th><td style="padding-top:1em;"></td></tr>
        <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }



    public function get_meta_radio( $args = array(), $value = false ) {
        extract( $args );
        if(($value == false || empty($value)) && isset($default)){
          $value = $default;
        }
        if(!isset($width)){
           $width = 'style="width:25%;"';
        }
        if(isset($echo) && $echo == 0 ){
            ob_start();
        }
        ?>
        <tr>
            <th <?php echo $width ?> >
                    <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </th>
            <td id="<?php echo $option ?>-cell">
                <?php foreach($options as $option){ ?>
                        <input type="radio" id="<?php echo $name ?>" name="<?php echo $name ?>" value="<?php echo $option ?>" <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' checked'; ?>  />
                        <label for="<?php echo $name ?>"><?php echo $text ?></label><br/>
                <?php } 
                if(!empty($helper) ) {?>
                <br/><small><?php echo $helper ?></small>
                <?php } ?>
                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" />
            </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }

    /**
     * Add a hidden value.
     * 
     * @param type $args
     * @param type $value
     * @return type
     */
    public function get_hidden( $args = array(), $value) {
        extract( $args );
        if(isset($echo) && $echo == 0 ){
            ob_start();
        }      
        if(($value == false || empty($value)) && isset($default)){
          $value = $default;

        }
        ?>
        <tr>
            <th></th>
            <td>                                                           
                <input type="hidden" id="<?php echo $name ?>" name="<?php echo $name ?>" value="<?php echo  (isset($value) ) ? $value : $default; ?>"  />                                                                                            
                <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( $name."_noncename" ); ?>" /> 
            </td>
        </tr>
        <?php
        if(isset($echo) && $echo == 0 ){
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }

}
