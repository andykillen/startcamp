<?php

$form = array(
        'name'=> 'buy',
        'action' => get_permalink( get_page_by_path( 'step2' )),
        'nonce_action' => 'Iloveagoodnonceinthemorning',
        'nonce_field' => 'Iloveagoodnonceinthemorning',
);

$form['fields'][] = array(
                'type' => 'text',
                'name' => 'name',
                'id' =>'name',
                'value' => '',
                'title' => __('Your name', 'startcamp'),
                );

$form['fields'][] = array(
                'type' => 'email',
                'name' => 'name',
                'id' =>'name',
                'value' => '',
                'title' => __('Your email', 'startcamp'),
                );

$form['fields'][] = array(
                'type' => 'hidden',
                'name' => 'hiden1',
                'id' =>'other',
                'value' => ''
                );

$form['fields'][] = array(
                'type' => 'submit',
                'name' => 'submit',
                'value' => 'Buy'
            );