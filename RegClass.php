<?php

session_start();

require ('init.php');

class RegisterClass {
    
    public function validation() {
        
        $db = new Database;
        $connect = $db->connect();
            
        $email = $_POST['reg_email'];
        $pass = $_POST['reg_pass'];
        $name = $_POST['reg_name'];
        $surname = $_POST['reg_surname'];
        $description = $_POST['description'];
        $errors = [];
        
        if ($result = $db->forDublicateChecking()) {
            foreach($result as $value) {
                if ($email == $value['email']) {
                    $errors['email'] = '';
                };
            };
        };

        if ($errors) {
            $errors['email'] = '';
        } else {
            $sql = "INSERT INTO `users` (name, surname, description, email, pass) VALUES (?, ?, ?, ?, ?)";
            $stmt = db_get_prepare_stmt($connect, $sql, $_POST);
            mysqli_stmt_execute($stmt);
            header("Location: myprofile.php");
        };
        
    }
            
};

$register = new RegisterClass();

if ($_POST['reg_email'] && $_POST['reg_pass'] && $_POST['reg_name'] && $_POST['reg_surname'] && $_POST['reg_description']) {
    $register->validation();
}