<?php

require "../model/Database.php";

class User{

    private $name;
    private $surname;
    private $email;
    private $password;
    private $database;

    public function __construct(){
        $this->database = new Database();
    }

    /**
     * Search user by email and password
     * @param $email String Email
     * @param $password String Password
     * @return void
     */
    public function isUserExisting($email, $password){

        $sql = "SELECT * FROM login WHERE email=? AND password=?;";

        $this->database->query($sql);
        $this->database->bindValues("ss", [$email, md5($password)]);
        $res = $this->database->getResult();

        if($res->num_rows == 1){
            return true;
        }else{
            return false;
        }
    }


}
