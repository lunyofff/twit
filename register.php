<?php

session_start();

require ('RegClass.php');

$regContent = include_template('register.php', ['errors' => $errors]);
$layout = include_template('register.php', [
    'content' => $regContent,
	'title' => 'Register',
    'errors' => $errors
]);

print($layout);