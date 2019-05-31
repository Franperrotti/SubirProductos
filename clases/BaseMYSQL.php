<?php
class BaseMYSQL{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la db ". $errores->getmessage();
            exit;
        }
    }

} 

?>