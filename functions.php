<?php
// Autoloader for any theme Classes
require 'src/autoloader.php';
// Register the Autoloader so it looks for StartCamp files
StartCamp_Autoloader::register();

// Start by registering forms that are available
$forms = StartCampRegisterForms::get_instance();
// Array of forms to register
$include_forms = [
  'step1' => 'forms/step1.php',
  'step2' => 'forms/step2.php'
];
// load up the file and register the form as needed
foreach($include_forms as $name => $file) {
    include $file;
    $forms->register($name, $form);
}