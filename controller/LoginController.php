<?php

require "../service/User.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userService = new User();
    $isExisting = $userService->isUserExisting($email, $password);

    if($isExisting){
        echo "Esiste";
    }else{
        echo "Non esiste";
    }
}
