<?php
 //$aux = $_SERVER;
 //var_dump($aux);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="recibir.php" method="post" id="formulario">
        <input type="text" placeholder="Username" name="user">
        <input type="text" placeholder="Password" name="password">
        <input type="checkbox" name="check" id="valido">
        <button type="button" onclick=usuario()>Enviar</button>
    </form>

    <script src=fn.js></script>
</body>
</html>