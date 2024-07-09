<?php
  $tabla_del_9 = [];
  for ($i=1; $i <= 10; $i++){
    $resultado = "9 x $i = ". (9*$i);
    array_push($tabla_del_9, $resultado);

    ///Metodo de depuracion
   /*  echo "<pre>";
    print_r($tabla_del_9);
    echo "</pre>"; */
  }
  /* die(); */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manera correcta de usar PHP con HTML</title>
</head>
<body>


<ul>
    <?php for ($i=0; $i < count($tabla_del_9); $i++): ?>
      <li><?= $tabla_del_9[$i] ?></li>
    <?php endfor; ?>

    <?php foreach ($tabla_del_9 as $resultado): ?>
      <li><?= $resultado ?></li>
    <?php endforeach; ?>

</ul>


</body>
</html>