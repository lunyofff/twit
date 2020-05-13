<?php 

session_start();

require_once ('AuthClass.php');
require_once ('init.php');

$db = new Database;
$connect = $db->connect();

$table = $db->getUsers();

$authContent = include_template('auth.php', [
    'content' => $content,
	'title' => 'Auth Page'
]);

$layout_content = include_template('layout.php', [
	'title' => 'Twitter',
    'content' => $content,
    'table' => $table
]);

if ($auth->maybe()) {
    print($layout_content);
} else {  
    print($authContent);
};