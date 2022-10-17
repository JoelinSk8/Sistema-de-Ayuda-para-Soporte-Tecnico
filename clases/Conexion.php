<?php 

class Conexion
{
 public function conectar(){
        $servidor = "localhost";
        $usuario = "root";
        $password ="";
        $db="helpdesk";

        $conexion = mysqli_connect($servidor,$usuario,$password,$db) or die("Error en la conexion");
        return $conexion;
    }
}
