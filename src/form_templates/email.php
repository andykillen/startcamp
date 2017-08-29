<label class='email-label' 
       id="<?php echo $array['name'] ?>_label" 
       for="<?php echo (isset($array['id']))? $array['id'] : $array['name'] ?>">
           <?php echo (isset($array['title']))?$array['title']:''; ?>
</label>
<input class='<?php echo $array['name'] ?>-field <?php echo $array['name']; ?>-email field' 
       name="<?php echo $array['name'] ?>" 
       id="<?php echo (isset($array['id']))? $array['id'] : $array['name']; ?>"
       type="email"
       value="<?php echo (isset($array['value']))? $array['value'] : ''; ?>" />
