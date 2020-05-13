<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once('init.php');

class AuthClass {
    
    private $_email;
    private $_pass;
    
    // Проверка сессии
    public function maybe() {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        };
    }
    
    public function validation($email, $pass) {
        
        $email_verify = false;
        $pass_verify = false;
        
        $db = new Database();
        $connect = $db->connect();

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Проверка почты
            if (!empty($_POST['email'])) {

                $for_check = mysqli_real_escape_string($connect, $_POST['email']);

                if ($result_login = $db->emailWhereEmail($for_check)) {
                    
                    $email_verify = emailVerify ($result_login);

                } else {
                    $error = mysqli_error($connect);
                    $loginPage = renderTemplate('templates/error.php', ['error' => $error]);
                };

            } else {

                $errors['Email'] = '';

            };
            
            // Проверка пароля
            if (!empty($_POST['pass'])) {

                $for_check = $_POST['email'];

                $for_check = mysqli_real_escape_string($connect, $for_check);

                if ($result_login = $db->passWhereEmail($for_check)) {

                    $for_verify = $result_login['pass'];

                    $pass_verify = $_POST['pass'] == $for_verify ? true : false;

//                    $pass_verify = passCheck($pass_check);

                } else {

                    $error = mysqli_error($connect);
                    print ("Ошибка" . $error);

                };

            } else {

                $errors['noPass'] = '';

            };

            if ($email_verify == true && $pass_verify == true) {

                $for_check = mysqli_real_escape_string($connect, $_POST['email']);

                if ($result_session = $db->employeeWhereEmail($for_check)) {
                    
                    $result_session = mysqli_fetch_array($result_session, MYSQLI_ASSOC);

                } else {

                    $result_session = [];

                    $error = mysqli_error($connect);

                    print("Произошла ошибка: " . $error);

                };

                $_SESSION['user'] = $result_session;
//                header ("Location: /index.php");

            } else {
                $errors['falseData'] = '';

            };

        };
        
        
    }
    
    // Возврат email
    public function getEmail() {
        if ($this->maybe())
            return $_SESSION['user']['email'];
    }
    
    // Возврат имени
    public function getName() {
        if ($this->maybe())
            return $_SESSION['user']['name'];
    }
    
    // Возврат имени
    public function getSurname() {
        if ($this->maybe())
            return $_SESSION['user']['surname'];
    }
    
    // Возврат логина
    public function getDescription() {
        if ($this->maybe())
            return $_SESSION['user']['description'];
    }
    
    // Закрытие сессии
    public function sessionOff() {
        $_SESSION = array();
        session_destroy();
    }
    
    
};

$auth = new AuthClass();

if (isset($_POST["email"]) && isset($_POST["pass"])) {
    $auth->validation($_POST["email"], $_POST["pass"]);
}