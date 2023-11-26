<?php
require("/var/www/html/models/login.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if  (LoginModel::CheckLogin($username, $password)){
        header("Location: /landing");
        exit;
    }else{
        $error = "Usuario o Contraseña incorrectos";
    }
    
}

require("/var/www/html/views/Login.php");

?>
