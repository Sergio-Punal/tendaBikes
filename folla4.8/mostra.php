<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header("Location:login.php");
}

$servidor = "localhost";
$db = "tendaBikes";
$usuario = "root";
$contrasinal = "root";

try {
    $pdo = new PDO("mysql:host=$servidor; dbname=$db; charset=utf8mb4", $usuario, $contrasinal);
    $po->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die ("non se puido establer a conexion: " . $e->getMessage());
}

//FUNCIÓN PARA IMPRIMIR OS PRODUCTOS
function imprimirProductos($pdo) {
    $comentarios = $pdo->prepare("SELECT * FROM comentarios WHERE  user = ");
    $comentarios->execute();
    echo "<h2>Comentarios </h2>";
    while ($el = $comentarios->fetch(pdo::FETCH_ASSOC)){
        echo "<div><p>Bicleta: ".htmlentities($el['bicicleta']) ."</p></div> <div><p>Comentario: ".htmlentities($el['cometario']);
    }
}

?>