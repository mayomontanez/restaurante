<?php 
include('medoo.min.php');


class Restaurante{
	var $base_datos; //Variable para hacer la conexion a la base de datos
	var $resultado; //Variable para traer resultados de una consulta a la BD

	function Restaurante() { //Constructor de la clase del modelo
		$this->base_datos = new medoo();
	}
//Conseguir todos los libros
	function consulta(){
		$result = $this->base_datos->query("");
		return $result;
	}

	function getCategorias(){
		$result = $this->base_datos->query("SELECT IDCATEGORIA, CATEGORIA, IMAGEN, ACTIVO FROM CATEGORIA WHERE ACTIVO = 1");
		return $result;
	}

	function getProductos($idcategoria)
	{
		$result = null;
		if(isset($idcategoria))
		{
			if($idcategoria == 0)
			{
				$result = $this->productosTodos();
			}
			else
			{
				$result = $this->productosByCategoria($idcategoria);
			}
		}
		else
		{
			$result = $this->productosTodos();
		}	
		
		return $result;
	}

	function productosTodos(){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, LEFT(P.PLATILLO, 20) AS PLATILLO, P.PLATILLO AS PLATILLOC, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function productosByCategoria($idcategoria){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, LEFT(P.PLATILLO, 20) AS PLATILLO, P.PLATILLO AS PLATILLOC, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1 AND C.IDCATEGORIA = ".$idcategoria."
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function detallesProducto($idproducto){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, P.PLATILLO, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1 AND P.IDPLATILLO = ".$idproducto."
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function detallesCategoria($idcategoria){
		$result = null;
		if(isset($idcategoria))
		{
			$result = $this->categoriaById($idcategoria);
		}
		else
		{
			$result = $this->getCategorias();
		}
		return $result;
	}

	function categoriaById($idcategoria)
	{
		$result = $this->base_datos->query("SELECT IDCATEGORIA, CATEGORIA, IMAGEN, ACTIVO 
			FROM CATEGORIA 
			WHERE ACTIVO = 1 AND IDCATEGORIA = ".$idcategoria."");
		return $result;
	}

	function getMesas()
	{
		$result = $this->base_datos->query("SELECT * FROM MESA WHERE DISPONIBLE = 1");
		return $result;
	}

	function getMesa($idmesa)
	{
		$result = $this->base_datos->query("SELECT * FROM MESA WHERE DISPONIBLE = 1 AND IDMESA =".$idmesa);
		return $result;
	}

	function reg_pedido($idmesa, $idplatillo, $cantidad)
	{
		$result = $this->base_datos->query("CALL REG_PEDIDO(".$idmesa.", ".$idplatillo.", ".$cantidad.")");
		return $result;
	}

	function get_info_pedidoActual($idmesa)
	{
		$result = $this->base_datos->query("
			SELECT 	P.IDPEDIDO, P.CANTIDAD, P.ENVIADO, P.ATENDIDO, P.TERMINADO, 
				C.IDCUENTA, C.ABIERTA, C.TOTAL, C.PAGADA, 
				PL.IDPLATILLO, PL.PLATILLO, PL.PRECIO, PL.IMG1, PL.RECETA, 
				M.IDMESA, M.MESA, 
				CA.IDCATEGORIA, CA.CATEGORIA,
				P.CANTIDAD*PL.PRECIO AS TOTAL, ((P.ENVIADO + P.ATENDIDO + P.TERMINADO)*100)/3 AS PROGRESO
			FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M, CATEGORIA AS CA
			WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND CA.IDCATEGORIA = PL.IDCATEGORIA
			AND PL.ACTIVO = 1 AND P.CANCELADO = 0 AND C.PAGADA = 0 AND M.IDMESA = ".$idmesa."
			ORDER BY P.FECHAREG"
			);
		return $result;
	}

	function get_info_pedidoActual_cancelados($idmesa)
	{
		$result = $this->base_datos->query("
			SELECT 	P.IDPEDIDO, P.CANTIDAD, P.ENVIADO, P.ATENDIDO, P.TERMINADO, 
				C.IDCUENTA, C.ABIERTA, C.TOTAL, C.PAGADA, 
				PL.IDPLATILLO, PL.PLATILLO, PL.PRECIO, PL.IMG1, PL.RECETA, 
				M.IDMESA, M.MESA, 
				CA.IDCATEGORIA, CA.CATEGORIA,
				P.CANTIDAD*PL.PRECIO AS TOTAL, ((P.ENVIADO + P.ATENDIDO + P.TERMINADO)*100)/3 AS PROGRESO
			FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M, CATEGORIA AS CA
			WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND CA.IDCATEGORIA = PL.IDCATEGORIA
			AND PL.ACTIVO = 1 AND P.CANCELADO = 1 AND C.PAGADA = 0 AND M.IDMESA = ".$idmesa."
			ORDER BY P.FECHAREG"
			);
		return $result;
	}

	function get_info_pedidos()
	{
		$result = $this->base_datos->query("
			SELECT 	P.IDPEDIDO, P.CANTIDAD, P.ENVIADO, P.ATENDIDO, P.TERMINADO, 
				C.IDCUENTA, C.ABIERTA, C.TOTAL, C.PAGADA, 
				PL.IDPLATILLO, PL.PLATILLO, PL.PRECIO, PL.IMG1, PL.RECETA, 
				M.IDMESA, M.MESA, 
				CA.IDCATEGORIA, CA.CATEGORIA,
				P.CANTIDAD*PL.PRECIO AS TOTAL, ((P.ENVIADO + P.ATENDIDO + P.TERMINADO)*100)/3 AS PROGRESO
			FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M, CATEGORIA AS CA
			WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND CA.IDCATEGORIA = PL.IDCATEGORIA
			AND PL.ACTIVO = 1 AND P.CANCELADO = 0 AND C.PAGADA = 0 AND P.TERMINADO = 0
			ORDER BY P.FECHAREG"
			);
		return $result;
	}

	function cocina_upd_estatus_atender($idpedido)
	{
		$result = $this->base_datos->query("
				UPDATE PEDIDO
				SET ATENDIDO = 1
				WHERE IDPEDIDO = ".$idpedido."
			"
			);
		return $result;
	}

	function cocina_upd_estatus_terminar($idpedido)
	{
		$result = $this->base_datos->query("
				UPDATE PEDIDO
				SET TERMINADO = 1
				WHERE IDPEDIDO = ".$idpedido."
			"
			);
		return $result;
	}

	function mesero_get_info_mesas()
	{
		$result = $this->base_datos->query("
				SELECT T.IDMESA, T.IDCUENTA, T.TOTALMESA, T.DISPONIBLE
				FROM(
				(SELECT M.IDMESA, C.IDCUENTA, SUM(P.CANTIDAD*PL.PRECIO) AS TOTALMESA, M.DISPONIBLE
				FROM CUENTA AS C, PEDIDO AS P, MESA AS M, PLATILLO AS PL
				WHERE P.IDCUENTA = C.IDCUENTA AND C.IDMESA = M.IDMESA AND P.IDPLATILLO = PL.IDPLATILLO
				AND C.ABIERTA = 1 AND PAGADA = 0 AND M.DISPONIBLE = 0
				GROUP BY M.IDMESA
				ORDER BY M.IDMESA)
				UNION
				(SELECT M.IDMESA, 0 AS IDCUENTA, 0 AS TOTALMESA, M.DISPONIBLE
				FROM MESA AS M
				WHERE M.DISPONIBLE = 1
				GROUP BY M.IDMESA)) AS T
				ORDER BY IDMESA
			"
			);
		return $result;
	}

	function cerrar_cuenta($idmesa)
	{
		$result = $this->base_datos->query("CALL CERRAR_CUENTA(".$idmesa.")");
		return $result;
	}

	function cancelar_platillo($idpedido)
	{
		$result = $this->base_datos->query("
				UPDATE PEDIDO
				SET CANCELADO = 1
				WHERE IDPEDIDO = ".$idpedido);
		return $result;
	}

	function envia_alerta($idmesa, $idalerta)
	{
		$result = $this->base_datos->query("
			INSERT INTO NOTIFICACION(IDALERTA, IDMESA, IDCUENTA)
			SELECT A.IDALERTA, M.IDMESA, C.IDCUENTA
			FROM ALERTA AS A, MESA AS M, CUENTA AS C
			WHERE C.FECHAREG = (SELECT MAX(C1.FECHAREG) FROM CUENTA AS C1 WHERE C1.IDMESA = ".$idmesa." AND ABIERTA = 1 AND PAGADA = 0) AND A.IDALERTA = ".$idalerta." AND M.IDMESA = ".$idmesa);
		return $result;
	}

	function get_notificaciones()
	{
		$result = $this->base_datos->query("
				SELECT A.IDALERTA, A.ALERTA, N.IDNOTIFICACION, M.IDMESA, M.MESA, C.IDCUENTA
				FROM NOTIFICACION AS N, ALERTA AS A, MESA AS M, CUENTA AS C
				WHERE N.IDALERTA = A.IDALERTA AND C.IDCUENTA = N.IDCUENTA AND C.IDMESA = M.IDMESA AND RECIBIDA = 0 AND M.DISPONIBLE = 0
			");
		return $result;
	}

	function get_notificaciones_count()
	{
		$result = $this->base_datos->query("
				SELECT COUNT(*) AS TOTALNOTIFICACIONES
				FROM NOTIFICACION AS N, ALERTA AS A, MESA AS M, CUENTA AS C
				WHERE N.IDALERTA = A.IDALERTA AND C.IDCUENTA = N.IDCUENTA AND C.IDMESA = M.IDMESA AND RECIBIDA = 0 AND M.DISPONIBLE = 0
			");
		return $result;
	}

	function close_notification($idnotificacion)
	{
		$result = $this->base_datos->query("
				UPDATE NOTIFICACION
				SET RECIBIDA = 1, FRECIBIDA = CURRENT_TIMESTAMP
				WHERE IDNOTIFICACION = ".$idnotificacion);
		return $result;
	}

	function reg_alertas_tiempo($minutos)
	{
		$result = $this->base_datos->query("CALL REG_ALERTAS_TIEMPO(".$minutos.")");
		return $result;
	}
	
}	
?>