<?php
$mensaje = "";
if (isset($_POST['email'])) {

    // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
    $email_to = "torneo@kenpohualpen.cl";
    $email_subject = "Formulario de Contacto - Kenpo Huelpen";
    $email_from = "torneo@kenpohualpen.cl";

    // Aquí se deberían validar los datos ingresados por el usuario
    if (
        !isset($_POST['nombre']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mensaje'])
    ) {

        $mensaje = 'Ocurrió un error y el formulario no ha sido enviado. Por favor, vuelva atrás y verifique la información ingresada';

    } else {
        $email_message = "Detalles del formulario de contacto:\n\n";
        $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
        $email_message .= "E-mail: " . $_POST['email'] . "\n";
        $email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";

        // Ahora se envía el e-mail usando la función mail() de PHP
        
        $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($email_to, $email_subject, $email_message, $headers);

        $mensaje = '¡El formulario se ha enviado con éxito!';
    }
} else {
    $mensaje = 'Ocurrió un error y el formulario no ha sido enviado\nFaltan campos por llenar';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de formulario - Kenpo Hualpen</title>
</head>

<body>
    <script>
        alert('<?php echo $mensaje; ?>');
        window.location = 'https://www.kenpohualpen.cl';
    </script>
</body>

</html>