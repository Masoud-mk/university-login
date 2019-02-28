<?php

session_start();
$username = $_GET['email'];
$_SESSION['email'] = $username;

var_dump($_SESSION['email']);
