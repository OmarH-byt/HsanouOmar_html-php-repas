<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['usuario'];
    $password = $_POST['contra'];
 
    $query = $connection->prepare("SELECT * FROM usuarios WHERE USUARIO=:usuario");
    $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Intentalo de nuevo.</p>';
    } else {
        if (password_verify($password, $result['CONTRA'])) {
            $_SESSION['id'] = $result['ID'];
            echo '<p class="success">Bienvenido!</p>';
        } else {
            echo '<p class="error">Algo salio mal...</p>';
        }
    }
}
 
?>