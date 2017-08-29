<input class='<?php echo $array['name'] ?>-field <?php echo $array['name']; ?>-radio field' 
       group="<?php echo (isset($array['group']))? $array['group'] : $array['name']; ?>"
       name="<?php echo $array['name'] ?>" 
       id="<?php echo (isset($array['id']))? $array['id'] : $array['name']; ?>"
       type="radio"
       value="<?php echo (isset($array['value']))? $array['value'] : ''; ?>" />&nbsp;
<label for="<?php echo (isset($array['id']))? $array['id'] : $array['name']; ?>">
    <?php echo (isset($array['title']))? $array['title'] : ''; ?>
</label>