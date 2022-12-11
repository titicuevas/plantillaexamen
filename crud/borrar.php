<?php
require '../vendor/autoload.php';
use App\Tablas\Alumno;


session_start();

$id = obtener_post('id');


if (!isset($id)) {
    return volver();
}

$pdo = conectar();

$sent = $pdo->prepare("SELECT count(id) 
                       FROM alumnos
                       WHERE id = :id");
$sent->execute([':id' => $id]);
$existe = $sent->fetchColumn();
if ($existe != 1) {
    $_SESSION['error'] = 'No existe el departamento.';
    return volver_admin();
}

Alumno::borrar($id);
$_SESSION['exito'] = 'El artículo se ha borrado correctamente.';

volver();