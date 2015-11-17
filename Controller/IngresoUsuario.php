<?php
  include('../model/modeloAutentificar.php'); 
  $mode_usr = new  ModeloAutentifica();

  $correo = $_GET["correo"];
  $password = $_GET["password"];

  $sesion = $mode_usr->valida($correo,$password);

  if(!empty($sesion)){
  	//Entras
  	session_start();
  	foreach($sesion as $data){
  		$_SESSION["nombre"] = $data["nombre"];
  	}

   
  	echo "<script>
  			alert('Hola ".$_SESSION["nombre"]."');
  			window.location.href = '../index.php';
  		  </script>";
  }else{
  	//Error
  	echo "<script>
  			alert('Usuario o contrasenia incorrecto');
  			window.location.href = '../index.php';
  		  </script>";
  }

?>