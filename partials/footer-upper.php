<div id="footer-upper" class="grid">
    <div class="">
        <div class="">
            <?php
            $args = array(
                'menu'  => 'footer',
            );
            wp_nav_menu($args)
            ?>
        </div>
        <div class="">
            <?php
            $args = array(
                'menu'  => 'social',
            );
            wp_nav_menu($args)
            ?>
        </div>
    </div>
</div>
