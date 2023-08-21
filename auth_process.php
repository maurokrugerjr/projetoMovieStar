<?php

require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("globals.php");
require_once("connection.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);

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
        if ($password === $confirmpassword){
            if ($userDao->findByEmail($email) === false){
                $user = new User();

                //Criação do token
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword();

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $authUser = true;

                $userDao->create($user, $authUser);
            }else{
                $message->setMessage("Usuario ja esta cadastrado, tente outro e-mail.", "error", "back");
            }
        }else{
            $message->setMessage("As senhas não são iguais.", "error", "back");
        }
    }else{
        //mostrar mensagem de erro
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }

}elseif ($type === "login"){

}