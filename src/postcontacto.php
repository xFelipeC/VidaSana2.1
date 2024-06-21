<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "default@example.com"; // Cambia esto por el correo al que quieres enviar los mensajes
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nTeléfono: $phone\nCorreo: $email\nMensaje:\n$message";
    $headers = "From: $email";

    if ($to = "default@example.com") {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

