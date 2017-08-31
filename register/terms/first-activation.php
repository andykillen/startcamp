<?php

$array_of_tax_terms = array(
    'audience' => [__("Beginner", "startcamp")      => array( 'desctiption' =>'', 'nicename' => 'beginner', 'parent' =>'' )],
    'audience' => [__("Intermediate", "startcamp")  => array( 'desctiption' =>'', 'nicename' => 'intermediate', 'parent' =>'' )],
    'audience' => [ __("Advanced", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'advanced', 'parent' =>'' )],
    'audience' => [ __("Coder", "startcamp")        => array( 'desctiption' =>'', 'nicename' => 'coder', 'parent' =>'' )],
    'audience' => [ __("Marketeer", "startcamp")    => array( 'desctiption' =>'', 'nicename' => 'marketeer', 'parent' =>'' )],
    'audience' => [ __("SEOer", "startcamp")        => array( 'desctiption' =>'', 'nicename' => 'seo', 'parent' =>'' )],
    'audience' => [ __("Administrator", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'administrator', 'parent' =>'' )],
    'audience' => [ __("Integrator", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'integrator', 'parent' =>'' )],

    'person-type' => [ __("Organizers", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'organizer', 'parent' =>'' )],
    'person-type' => [ __("Sponsor", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'sponsor', 'parent' =>'' )],
    'person-type' => [ __("Speaker", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'speaker', 'parent' =>'' )],

    'talk-type' => [ __("Workshop", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'workshop', 'parent' =>'' )],
    'talk-type' => [ __("Overview", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'overview', 'parent' =>'' )],
    'talk-type' => [ __("Inspirational", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'inspirational', 'parent' =>'' )],
    
    'sponsor-type' => [ __("Platinum", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'platinum', 'parent' =>'' )],
    'sponsor-type' => [ __("Gold", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'gold', 'parent' =>'' )],
    'sponsor-type' => [ __("Silver", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'silver', 'parent' =>'' )],
    'sponsor-type' => [ __("Bronze", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'bronze', 'parent' =>'' )],
);
foreach ($array_of_tax_terms as $tax => $term_details){
    wp_insert_term(array_key($term_details) , $tax, array_values($term_details) );
}