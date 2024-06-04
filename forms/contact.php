<?php
  $receiving_email_address = 'santiago.bldn@gmail.com';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validación básica
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
      // Configurar el correo
      $to = $receiving_email_address;
      $email_subject = "Contacto: $subject";
      $email_body = "Has recibido un nuevo mensaje de $name.\n\n".
                    "Aquí están los detalles:\n\n".
                    "Nombre: $name\n".
                    "Correo electrónico: $email\n".
                    "Mensaje:\n$message";
      $headers = "From: $email\n";
      $headers .= "Reply-To: $email";

      // Enviar el correo
      if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'Mensaje enviado con éxito.';
      } else {
        echo 'Error al enviar el mensaje.';
      }
    } else {
      echo 'Por favor, completa todos los campos.';
    }
  } else {
    echo 'Método de solicitud no permitido.';
  }
?>