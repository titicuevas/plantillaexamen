<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 



if ($_POST ['buscar']) {
    $buscar = $_POST['palabra'];

if (empty($buscar)) {
    echo"Esta vacia";
}else {
    $pdo = conectar();

$sent = $pdo->query("SELECT * FROM alumnos where nombre LIKE '%$buscar%' ORDER BY id DESC");

$resultado = $sent;

echo "REsultado $buscar";



}

}


echo "No hay resultado $buscar";
?>


</body>
</html>