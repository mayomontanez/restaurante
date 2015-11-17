	var seconds = 10; // el tiempo en que se refresca
	function refreshContent(){
		var xmlHttp;
		var pagina = "refreshPlatillos.php";
		try{
			xmlHttp=new XMLHttpRequest();
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}

		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				document.getElementById("contenido").innerHTML=xmlHttp.responseText;
				setTimeout('refreshContent()',seconds*1000);
				//alert(pagina);
			}
		}
		var div1 = document.getElementById("contenido");
		var align = div1.getAttribute("name");
		pagina = pagina + "?idmesa=" +align;
		xmlHttp.open("GET",pagina,true);
		xmlHttp.send(null);
	}

	window.onload = function(){
		refreshContent(); // corremos inmediatamente la funcion
	}