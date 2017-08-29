<?php

$form = array(
        'name'=> 'step2',
        'action' => get_permalink( get_page_by_path( 'step3' )),
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