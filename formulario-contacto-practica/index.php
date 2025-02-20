<?php

   require("./mail.php");
  // Creando la lógica en el mismo archivo, aunque perfectamente puede estar en otro archivo separado

  // Status: Permite guardar un estado para más adelante mostrar una alerta si el correo es enviado o no
  $status = "";

  // Comprobamos si el formulario no se envío vacío
  function validateForm($name, $email, $subject, $message, $form){    
    return !empty(trim($name)) && !empty(trim($email)) && !empty(trim($subject)) && !empty(trim($message));
  }

  // Comprobamos si el formulario fue enviado
  if(isset($_POST['form'])){
    // Invocamos función para validar y con el unpacking array le pasamos los parametros que vienen del POST solicitados a la función
    if(validateForm(...$_POST)){

        $name = (htmlentities($_POST['name']));
        $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $subject = (htmlentities($_POST['subject']));
        $message = (strip_tags($_POST['message']));

        $body = "$name <$email> te envia el siguiente mensaje: <br><br> $message";

        sendMail($subject, $body, $email, $name, true);
  
      $status = "success";
    }else{
      $status = "error";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Formulario de contacto</title>
</head>

<body>
    <?php if ($status === 'error') : ?>

        <div class="message">
            <div class="container">
                <div class="message-error">
                    <p class="message-paragraph">Surgió un problema</p>
                </div>
            </div>
        </div>

    <?php endif; ?>


    <?php if ($status === 'success') : ?>

        <div class="message">
            <div class="container">
                <div class="message-success">
                    <p class="message-paragraph">¡Mensaje enviado con éxito!</p>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <!-- Creación de la estructura del Formulario -->
    <div class="form-container">
        <div class="container">
            <form action="./index.php" class="form" method="post">
                <div class="form-header">
                    <h2 class="form-title">¡Contactanos!</h3>
                </div>
                <div class="form-body">
                    <label class="form-label" for="name">Nombre: </label>
                    <input class="form-input" type="text" required name="name" id="name" placeholder="Harold montes">

                    <label class="form-label" for="email">Correo: </label>
                    <input class="form-input" type="text" required name="email" id="email" placeholder="harold@dev.com.do">

                    <label class="form-label" for="subject">Asunto: </label>
                    <input class="form-input" type="text" required name="subject" id="subject" placeholder="Solicitud de documentación final">

                    <label class="form-label" for="message">Mensaje: </label>
                    <textarea class="form-area" name="message" id="message" placeholder="Me urge obtener la documentación del proyecto de la papelería debido a que ya estoy en fecha límite para entregarlos al área correspondiente"></textarea>

                    <button class="form-cta" name="form">Enviar</button>
                </div>
            </form>
            <div class="form-footer">
                <p class="form-paragraph"><i class="fa-solid fa-location-dot"></i> 13 Saw Mill Circle, North Olmested.</p>
                <p class="form-paragraph"><i class="fa-solid fa-phone"></i> +1 123 456 7890</p>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/36b3528883.js" crossorigin="anonymous"></script>
</body>

</html>