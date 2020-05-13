<?php

require ('functions.php');

class Database {
    
    public function connect() {
        if (mysqli_connect_errno()) {
            echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        } else
            return mysqli_connect("localhost", "root", "", "twitter");
    }

    public function emailWhereEmail($for_check) {
       return
           mysqli_query(self::connect(), "SELECT `email` FROM `users` WHERE `email` = '$for_check'");
    }
    
    public function passWhereEmail($for_check) {
       return 
           mysqli_fetch_array(mysqli_query(self::connect(), "SELECT `pass` FROM `users` WHERE `email` = '$for_check'"), MYSQLI_ASSOC);
    }
    
    public function employeeWhereEmail($for_check) {
        return 
            mysqli_query(self::connect(), "SELECT `id`, `email`, `name`, `description` FROM `users` WHERE `email` = '$for_check'");    
    }
    
    public function getUserProfile($id) {
        return 
            mysqli_query(self::connect(), "SELECT `id`, `email`, `name`, `surname`, `description` FROM `users` WHERE `id` = '$id'");    
    }
    
    public function getMyProfile($id) {
        return 
            mysqli_query(self::connect(), "SELECT `id`, `email`, `name`, `surname`, `description` FROM `users` WHERE `id` = '$id'");    
    }
    
    public function getPosts($id) {
        return 
            mysqli_fetch_all(mysqli_query(self::connect(), "SELECT `id`, `text`, `user_id` FROM `posts` WHERE `user_id` = '$id' AND `is_visible` = 1"), MYSQLI_ASSOC);
    }
    
    public function getUsers() {
        return 
            mysqli_fetch_all(mysqli_query(self::connect(), "SELECT * FROM `users`"), MYSQLI_ASSOC);
    }
    
    public function isSent($sender) {
        return
            mysqli_fetch_all(mysqli_query(self::connect(), "SELECT * FROM `friends` WHERE `sender_id` = '$sender'"), MYSQLI_ASSOC);
    }

    public function forDublicateChecking() {
        return
            mysqli_fetch_all(mysqli_query(self::connect(), 
                    "SELECT email FROM `users`"), MYSQLI_ASSOC);
    }

}

if (!$connect) {

    print(mysqli_connect_error());
	
} else {

    mysqli_set_charset ($connect, "utf-8");

};