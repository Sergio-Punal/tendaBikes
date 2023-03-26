<?php
session_start();

//control de fixacion de sesion
/*if(!isset($_SESSION['probaControl'])) {
    session_regenerate_id(true);
    $_SESSION['probaControl'] = true;
} */

$servidor = "localhost";
$usuario = "user_tenda";
$contrasinal = "root";
$db = "tendabikes";

try {
    $conexion = new PDO("mysql:host=$servidor; dbname=$db; charset=utf8mb4", $usuario, $contrasinal);
   
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die ("Erro " . $e->getMessage());
}

// FORMULARIO DE LOGUEO

function printFormLogin(){
    echo "<a href='pechaSesion'> PECHAR SESION </a><br>
    <form action='login.php' method='post'>
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
    </form>";


}

// CREACIÓN INSERCIÓN DE USUARIOS NA BD
if(isset($_POST['rexistro'])){
    $existe = $conexion->prepare("SELECT nomeUsuario FROM usuarios WHERE user like '{$_POST['nomeUsuario']}'  ");
    $existe->execute();
    if ($existe) {
        echo "Xa existe o usuario " .$_POST['nomeUsuario'];
    } else {
        $insertUser = $conexion->prepare("INSERT INTO usuarios (user, contrasinal, email) VALUES (:user, :contrasinal, :email)");
        $insertUser->bindParam(':user', $_POST['nomeUsuario']);
        $insertUser->bindParam(':contrasinal', password_hash($_POST['contrasinal'], PASSWORD_DEFAULT));
        $insertUser->bindParam(' :email', $_POST['email']);
        $insertUser->execute();
        }
}

// VERIFICACION DE USUARIO REXISTRADO, CREACIÓN DE SESIÓN USUARIO E COOKIES DE IDIOMA

if(isset($_POST['acceder'])) {
    $verificarUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE user= :userName ");
    $verificarUsuario->bindParam(' :userName', $_POST['userName']);
    $verificarUsuario->execute();
    $datosUser = $verificarUsuario->fetch(PDO::FETCH_ASSOC);

    if(!password_verify($_POST['contrasinal'], $datosUser['contrasinal'])) {
        echo "Credenciais incorrectas";
    }  else {
        $_SESSION['usuario'] = $dataUser['user'];
        setcookie("idioma", $_POST['idioma'], time() + 5000);
        header("Location:mostra.php");
    }
}

printFormLogin();











?>