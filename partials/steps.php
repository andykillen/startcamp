<?php 
// Don't load this information if there is not a step set
if (!isset($step)) {
    return;
} ?>
<ul class="steps">
    <li class="<?php echo ($step == 1)?"selected":""; ?>"><?php _e('Sign up','startcamp') ?></li>
    <li class="<?php echo ($step == 2)?"selected":""; ?>"><?php _e('Personal Information','startcamp') ?></li>
    <li class="<?php echo ($step == 3)?"selected":""; ?>"><?php _e('Dietary Needs','startcamp') ?></li>
    <li class="<?php echo ($step == 4)?"selected":""; ?>"><?php _e('Confirm','startcamp') ?></li>
</ul>