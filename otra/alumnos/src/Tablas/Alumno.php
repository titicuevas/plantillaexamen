<?php

namespace App\Tablas;

use PDO;

class Alumno
{

    public $id;
    public $nombre;
    public $apellido;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->nombre = $campos['nombre'];
        $this->nombre = $campos['apellido'];
    }

    public static function insertar($nombre, $apellido, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO alumnos (nombre,apellido)
                                    VALUES (:nombre, :apellido)');
        $sent->execute([':nombre' => $nombre , ':apellido' =>$apellido]);
    }

    public static function borrar($id, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("DELETE FROM alumnos
                                     WHERE id = :id");
        $sent->execute([':id' => $id]);
    }


    public static function meter($apellido, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO alumno (apellido)
                                    VALUES (:apellido)');
        $sent->execute([':nombre' => $apellido]);
    }




    public static function comprobar($alumno, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('SELECT *
                                 FROM alumno
                                WHERE nombre = :alumno');
        $sent->execute([':alumno' => $alumno]);
        $fila = $sent->fetch(PDO::FETCH_ASSOC);

        if ($fila === false) {
            return false;
        }

        return $fila['nombre'] ? new static($fila) : false;
    }
}
