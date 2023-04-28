
<!-- LIBRERIA PDO SIRVE PARA CONECTAR CON TODAS LAS BASES DE DATOS, asi si un codigo es de otra base de datos diferente a mysql, cambiando el tipo de base de datos, lo lee tmb -->


<?php


$contador=0;

          
          try{ 
            $conexion=new PDO('mysql:host=localhost; dbname=pruebas', 'root', 'iusenma');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            //CONSULTA
            $consulta="SELECT * FROM usuarios WHERE USUARIO= :usuario";


$resultado=$conexion->prepare($consulta);

$usuario=htmlentities(addslashes($_POST["usuario"]));
$contra=htmlentities(addslashes($_POST["password"]));
 

// $resultado->execute(array(':usuario'=>$usuario)); 
$resultado->bindValue(":usuario",$usuario);
$resultado->execute();



while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ 

  // echo "Usuario: " . $fila['USUARIO'] . " // Contraseña: " . $fila['PASSWORD'] . "<br>";
  //la funcion pass_verify->devuelve true si COINCIDE la contraseña(es igual) y false si no son iguales
  if(password_verify($contra, $fila['PASSWORD'])){//hash de password esta en la bbdd
    $contador++;
  }
}


if($contador>0){

  session_start();
  $_SESSION["usuario"]=$usuario;

  header("Location:registrado_correctamente.php");
  
  // echo "Bienvenidx " . $_SESSION["usuario"];
}


          }// Comprobamos la conexión
          catch(Exception $e){ 
            die ("Se ha producido el error: " . $e->getMessage());
          }
          finally{
            $conexion=null;//vaciar
          }




?>

