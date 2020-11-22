<?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['contra'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM usuarios WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">Ya te has registrado con este correo</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO usuarios(USUARIO,CONTRA,EMAIL) VALUES (:usuario,:contra_hash,:email)");
        $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
        $query->bindParam("contra_hash", $contra_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Te has registrado!</p>';
        } else {
            echo '<p class="error">Ha habido un error...</p>';
        }
    }
}
 
?>