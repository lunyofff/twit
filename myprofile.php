<?php 

session_start();

require_once ('AuthClass.php');
require_once ('init.php');

$db = new Database;
$connect = $db->connect();

$id = $_SESSION['user']['id'];
$table = $db->getMyProfile($id);
$posts = $db->getPosts($id);

$authContent = include_template('auth.php', [
    'content' => $content,
	'title' => 'Auth Page'
]);

$layout_content = include_template('myprofile.php', [
	'title' => 'Twitter',
    'content' => $content,
    'table' => $table,
    'posts' => $posts
]);

if (!empty($_POST['tweet'])) {
    
    $query = "INSERT INTO `posts` (text, user_id) VALUES (?, ".$_SESSION['user']['id'].")";
    $stmt = mysqli_prepare($connect, $query);
    
    mysqli_stmt_bind_param($stmt, "s", $val1);
    
    $val1 = $_POST['tweet'];
    
    mysqli_stmt_execute($stmt);
    
    header('Location: ../myprofile.php');

};

if ($auth->maybe()) {
    print($layout_content);
} else {  
    print($authContent);
};