<?php

session_start();

require ('init.php');

if (isset($_SESSION['user'])) {
    header ("Location: /index.php");
    unset($_SESSION['user']);
    exit;
} else {
    header ("Location: /index.php");
};