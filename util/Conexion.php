<?php  

class Conexion {
    public static function getConexion(){
        $con=null;
        try{
            $con = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "seee";
        } catch (Exception $ex) {
            echo 'ERROR: '.$ex->getMessage();
        }
        return $con;
    }
}