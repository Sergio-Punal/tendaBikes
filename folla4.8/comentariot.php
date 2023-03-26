<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['bicicleta'], $_POST['comentario'])) {
    require_once 'config.php';

    $stmt = $pdo->prepare('INSERT INTO comentarios (usuario, bicicleta, comentario) VALUES (?, ?, ?)');
    $stmt->execute([$_SESSION['usuario'], $_POST['bicicleta'], $_POST['comentario']]);

    header('Location: mostra.php');
    exit();
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Comentarios</title>
  </head>
  <body>
    <h1>Comentarios</h1>
    <p>Bienvenido, <?php echo $_SESSION['usuario']; ?> (<a href="pechaSesion.php">Cerrar sesión</a>)</p>

    <form method="POST">
      <div>
        <label for="bicicleta">Bicicleta:</label>
        <select name="bicicleta" id="bicicleta">
          <?php
          require_once 'config.php';

          $stmt = $pdo->query('SELECT nome FROM bicicletas');
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div>
        <label for="comentario">Comentario:</label>
        <textarea name="comentario" id="comentario"></textarea>
      </div>
      <div>
        <input type="submit" value="Enviar">
      </div>
    </form>

    <p><a href="mostra.php">Volver a la lista de bicicletas</a></p>
  </body>
</html>
