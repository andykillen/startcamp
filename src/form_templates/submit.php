<input class='<?php echo $array['name'] ?>-field <?php echo $array['name']; ?>-submit field' 
       name="<?php echo $array['name'] ?>" 
       id="<?php echo (isset($array['id']))? $array['id'] : $array['name']; ?>"
       type="submit"
       value="<?php echo (isset($array['value']))? $array['value'] : ''; ?>" />
