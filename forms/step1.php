<?php

$form = array(
        'name'=> 'step1',
        'action' => get_permalink( get_page_by_path( 'step2' )),
        'fields' => array(
            array(
                'type' => 'hidden',
                'name' => 'hiden1',
                'id' =>'other',
                'value' => ''
                ),
            array(
                'type' => 'submit',
                'name' => 'submit',
                'value' => 'Next'
                ),
            ),
);