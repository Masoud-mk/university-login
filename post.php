<?php
$user = $_POST['username'];
$password = $_POST['password'];
echo $_SERVER['REQUEST_METHOD'] . "<br>";
//var_dump($_POST);


if($_SERVER['REQUEST_METHOD'] == "POST"){
    var_dump($_POST);
}