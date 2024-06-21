<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("bbdd.php");

    $admin = 1;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from profesionales where id_profesional = :username;";
    $stmt = $con->prepare($sql); // Preparar la consulta
    $stmt->bindParam(':username', $username, PDO::PARAM_STR); // Asignar parámetro
    $stmt->execute(); // Ejecutar la consulta
    $reg = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener resultado

    $_SESSION["nombreProfesional"] = $reg['nombre'];

    if ($stmt->rowCount() !== 0) {
        //quiere decir que el correo esta
        if ($password == $reg["contraseña"]) {
            if ($username == $admin) {
                header("Location: admin.php");
            } else {
                header("Location: login.php");
            }
        }
    } 
?>
