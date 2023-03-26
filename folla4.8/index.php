<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['usuario'])) {
        echo " <a href='pechaSesion'> PECHAR SESION </a><br>";
    

    }
    ?>

    <form action='login.php' name="rexistro" method='post'>
    <p>NOME DE USUARIO: <input type='text' name='userNmae'> </p>
    <p>CONTRASINAL:  <input type='password' name='contrasinal'> </p>
    <p>SELECCION DE IDIOMA </p>
     <select for='idioma' name='idioma'>
            <option value='gal'> GALEGO </option>
            <option value='es'> ESPAÑOL </option>
            <option value='en'> INGLES </option>
    </select><br><br>
    
    <button type='submit' name='acceder'>  IDENTIFICARSE </button>
    <a href='rexistro.html'>   VOTAR A REXISTRO </a>
    </form>
</body>
</html>