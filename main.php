<?php

require 'index.php';
require 'form.php';
//include the class file


//creating an instance
$page = new structure();
$form = new UserForm();
//call the methods
$page->heading();
$form->displayForm();
$page->footer();
