<?php
//obtener info de la imagen con la variable global $_FILES
$image = $_FILES["image"]["tmp_name"];
$type = $_FILES["image"]["type"];
//se usa la funcion interna de php para extraer la parte deseado del string
$type_of_img = substr($type, 6, 5);

//obtener info del input con la var global $_POST
$inputname = $_POST["nombre"];

$ruta_a_subir = "images/$inputname".".".$type_of_img;

move_uploaded_file($image, $ruta_a_subir);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<img src="<?= $ruta_a_subir ?>" alt="<?= $inputname ?>">
    

</body>
</html>