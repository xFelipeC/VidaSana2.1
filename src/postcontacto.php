<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "leitoxasnchez@gmail.com";
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nTeléfono: $phone\nCorreo: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    // } else {
        // echo "Error al enviar el mensaje.";
//     }
 } //else {
    // echo "Método de solicitud no válido.";
// }
?>
