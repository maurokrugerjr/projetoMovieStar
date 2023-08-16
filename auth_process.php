<?php

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("globals.php");
require_once("connection.php");

//Resgata tipo usuario
$type = filter_input(INPUT_POST, "type");

//Verifica tipo usuario
if ($type === "register"){

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    if ($name && $lastname && $email &&$password){

    }elseif{
        //mostrar mensagem de erro

    }

}elseif ($type === "login"){

}