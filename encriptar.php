<style>
table{
  width: 70%;
  margin: 0 auto;
}
td{
  border: 1px solid black;
  text-align: center;
  padding: 5px 10px 5px 10px;
  width: 16.6%;
  border-collapse: collapse;
  margin: 0;
}
#referencia{
  color: blue;
  font-weight: bold;
}
p{
  font-size: 24px;
  font-weight: bold;
  color: navy;
  text-align: center;
  margin-top: 35px;
}
</style>


<?php

require("datos_conexion.php");  

$nombre=$_POST["nombre"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];

//PASSWORD_HASH TIENE 2 PARAMETROS_ 0 3->'12' fuerza o peso que le hemos metido
$pass_cifrada=password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));


    	try{

        // Creamos la conexión
        $conexion=new PDO('mysql:host=localhost; dbname=pruebas', 'root', 'iusenma');
                echo "La conexión se ha establecido correctamente";
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");

        // Consulta SQL-query-:
        $consulta="INSERT INTO usuarios (`NOMBRE`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `USUARIO`, `PASSWORD`) VALUES (:nombre, :1apellido, :2apellido, :usuario, :contra)";


        // preparar consulta
        $resultado=$conexion->prepare($consulta);
        //ejecutar execute/bind
        $resultado->bindValue(":nombre", $nombre); 
        $resultado->bindValue(":1apellido", $apellido1); 
        $resultado->bindValue(":2apellido", $apellido2); 
        $resultado->bindValue(":usuario", $usuario); 
        $resultado->bindValue(":contra", $pass_cifrada); 

        $resultado->execute();

        echo "Registro guardado correctamente <br><br>";
        echo "<table><tr><td>$nombre</td>";
        echo "<td>$apellido1</td>";
        echo "<td>$apellido2</td>";
        echo "<td>$usuario</td>";
        echo "<td>$pass_cifrada </td></tr></table>";

        //cerramos
        $resultado->CloseCursor();



      }// Comprobamos la conexión
      catch(Exception $e){ 
        die ("Se ha producido el error: " . $e->getMessage());
      }
      finally{
        $conexion=null;//vaciar
      }
  
     
?>


