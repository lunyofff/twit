<?php 

session_start();

require_once ('AuthClass.php');
require_once ('init.php');

if ($_SESSION['user']['id'] == $_GET['id'])
    header('Location: ../myprofile.php');

$db = new Database;
$connect = $db->connect();

$id = $_GET['id'];
$table = $db->getUserProfile($id);
$posts = $db->getPosts($id);
$is_sent = $db->isSent($_SESSION['user']['id']);

foreach ($is_sent as $value) {
    if ($_GET['id'] == $value['receiver_id']) {
        $already_sent = true;
    };
};

foreach ($is_sent as $value) {
    if ($value['status'] == 1) {
        $is_accepted = true;
    } else {
        $is_accepted = false;
    };
};

if ($_POST['friend_send']) {
    mysqli_query($connect, "INSERT INTO `friends` (sender_id, receiver_id) VALUES (".$_SESSION['user']['id'].", ".$_GET['id'].")");
    header("Refresh:0");
};

if ($_POST['unfollow']) {
    mysqli_query($connect, "DELETE FROM `friends` WHERE `sender_id` = ".$_SESSION['user']['id']." AND `receiver_id` = ".$_GET['id']."");
    header("Refresh:0");
};

$authContent = include_template('auth.php', [
    'content' => $content,
	'title' => 'Auth Page'
]);

$layout_content = include_template('profile.php', [
	'title' => 'Twitter',
    'content' => $content,
    'table' => $table,
    'posts' => $posts,
    'can_accept' => $can_accept,
    'already_sent' => $already_sent,
    'is_sent' => $is_sent,
    'is_accepted' => $is_accepted,
    'id' => $id
]);

if ($auth->maybe()) {
    print($layout_content);
} else {  
    print($authContent);
};