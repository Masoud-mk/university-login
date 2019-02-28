<?php


function connectToDB() {
    try {
        return new PDO("mysql:host=127.0.0.1;dbname=phplearn","root","123456");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function userGet($username , $conn) {
    $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindparam("username" , $username );
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_OBJ);

    return $user ? $user : false;
}

function userSave($data , $conn) {
    extract($data);
    $statment = $conn->prepare("INSERT INTO users (fullname , username , email , password ) VALUES (:fullname , :username , :email , :password )");
    $statment->bindParam("fullname" , $fullname );
    $statment->bindParam("username" , $username );
    $statment->bindParam("email" , $email );
    $statment->bindParam("password" , $password );
    return $statment->execute() ? true : false;
}
