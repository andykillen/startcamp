<?php

if('yes' == get_theme_mod('show_share', 'no') ) {    
    ?>
    <div id="share-buttons">
        <?php 
        $networks = get_theme_mod('share_buttons', ''); 
        $wanted = explode(",",$networks);
        $share_array = startcamp_share_urls($wanted);
        foreach($share_array as $net => $share_url){
            ?>
        <a href='<?php echo $share_url ?>' class='spritefont spritefont-<?php echo $net ?>'>
            <span><?php echo $net ?></span>
        </a>
        <?php
        }
        ?>
    </div>
<?php }
