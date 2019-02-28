<?php

require_once "functions.php";
$status = null;

AuthLogout();

if( isPost() ) {
    extract($_POST);
    if( validation_required([$name , $family ,$username , $email , $password]) ) {
        if(validation_email($email)) {

            $password = hash_hmac("sha256" , $password , "secert");

            $data = [
                "fullname" => $name . " " . $family,
                "username" => $username ,
                "email" => $email,
                "password" => $password
            ];

            $conn = connectToDB();

            if( ! userGet($username , $conn)) {
                userSave($data , $conn) ? redirect("login.php") : $status = "user not save plase try again" ;
            } else {
                $status = "this username is exists";
            }
        } else {
            $status = "Invalid email format";
        }
    } else {
        $status = "username or password is required";
    }
}

require "index.view.php";
