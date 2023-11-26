<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./login.css">

    <title>login</title>
</head>
<body>

    <div class="form-conten">
     <form action="login.php"  method="post">

        <h2>Validación</h2>
      <div class="grupo-form">
        <input class="uno" type="text" name="usuario" placeholder="Usuario">
        <i class="fa fa-user    icono"></i>
    </div>
    <div>
        <input class="uno" type="password" name="contraseña" placeholder="Contraseña">
        <i class="fa fa-lock  icono "></i>
    </div>
        <input type="submit"  name="contacto" class="btn"   value="Entrar">
         <a href="#" class="recuerda">¿Has olvidado tu contraseña?</a>
         <p class="aqui">Si no tienes cuenta <a href="registro.php">Registrate aqui</a> </p>
     </form>
    </div>

<?php include("loginEntrar.php");
       
?>


</body>
</html>