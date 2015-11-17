<?php
  include('../model/modelocliente.php'); 
  $mode_usr = new  ModeloCliente();
  
  $nombre= $_GET["nombre"];
  $primerapellido= $_GET["apellido1"];
  $segundoapellido= $_GET["apellido2"];
  $anio= $_GET["anio"];
  $mes= $_GET["mes"];
  $dia= $_GET["dia"];
  $correo= $_GET["correo"];
  $genero= $_GET["genero"];
  $password= $_GET["password"];
  $activo= 1;

function add_ceros($numero,$ceros) {
$order_diez = explode(".",$numero);
$dif_diez = $ceros - strlen($order_diez[0]);
for($m = 0 ;
$m < $dif_diez;
 $m++)
{
        @$insertar_ceros .= 0;
}
return $insertar_ceros .= $numero;
}
$numero="123";
$dia=add_ceros($dia,2);
$mes=add_ceros($mes,2);

  $fechanac = $anio."/".$mes."/".$dia;

$resultado=$mode_usr->agregar_cliente($nombre,$primerapellido,$segundoapellido,$fechanac,$correo,$genero,$password,$activo);
echo "<script>        
window.location.href = '../Controller/IngresoUsuario.php?correo=".$correo."&password=".$password."'; 
</script>";

?>