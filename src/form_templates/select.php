<label class='select-label' 
       id="<?php echo $array['name'] ?>_label" 
       for="<?php echo (isset($array['id']))? $array['id'] : $array['name'] ?>">
           <?php echo (isset($array['title']))?$array['title']:''; ?>
</label>
<select class='<?php echo $array['name'] ?>-field <?php echo $array['name'] ?>-select field' 
        name="<?php echo $array['name'] ?>" 
        id="<?php echo (isset($array['id']))? $array['id'] : $array['name'] ?>">
<?php foreach ($array as $value => $text) {
    $selected = ($value == $array['value']) ? "selected" : "" ; ?>
    <option value="<?php echo $value ?>"  <?php echo $checked ?>>
        <?php echo $text ?>
    </option>
<?php } ?>
</select>
