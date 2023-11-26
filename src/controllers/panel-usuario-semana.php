<?php
/* require("/var/www/html/models/login.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $logindata = new LoginModel($username, $password);

    if (LoginModel::CheckLogin($logindata)){
        header("Location: /landing");
        exit;
    }else{
        $error = "Usuario o Contraseña incorrectos";
    }
    
} */

require("/var/www/html/views/panel-usuario-semana.php");

?>