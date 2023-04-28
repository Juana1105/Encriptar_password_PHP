<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USUARIO VALIDADO CORRECTAMENTE</title>

<style>
  body{
    background-color: #E328;
  }
  #boton{
    padding:20px;
    font-size: 20px;
    background-color: tomato;
    color: white;
  }
  ul{
    width: 50%;
    background-color: #E7BDD3;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin: 0;
    padding: 0;
    margin: auto;
    height: 35px;
  }
  ul li{
    margin: 0;
    padding: 0;
    list-style: none;
    width: 30%;
    text-align: center;
  }
  a{
    text-decoration: none;
    display: inline-block;
    padding: 5px 5px;
    font-size: 20px;
    font-weight: bold;
    color: #292227;
    box-sizing: border-box;
  }
  a:hover{
    background-color: darkred;
    color: #E7BDD3;
    transform: scale(1.2);
    transition: 300ms;
  }
  h1{
    text-align: center;
    margin-top: 40px;
    margin-bottom: 35px;
  }
</style>


</head>
<body>

  <?php

  //INICIAR SESION
  session_start();
  if(!isset($_SESSION["usuario"])){
      // header("Location:formulario_login.html");
      echo "Hola";
      
  }

  ?>

  <h1 style="color:darkred">BIENVENIDO USUARIO REGISTRADO</h1>


  <?php
  echo "<h3 style='color:red'>Bienvenido/a " . $_SESSION["usuario"] . ".</h3><br>";
  ?>

<div>
  <ul>
    <li><a href="pagina1.php">Página 1</a></li>
    <li><a href="pagina2.php">Página 2</a></li>
    <li><a href="pagina3.php">Página 3</a></li>
  </ul>
</div><br>



  <a href="cerrar_sesion.php"><input type="button" value="CERRAR SESIÓN" id="boton"></a>


</body>
</html>