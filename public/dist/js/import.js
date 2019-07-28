var id_viaje = "15537812";
var url = "http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${id_viaje}"


var f_start = "2019-05-13 05:00:00";
var f_end = "2019-05-13 20:00:00";


$.ajax({
  url: `http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${id_viaje}`,
  context: document.body
}).done(function(e) {
	if(e.viajes) {
		var ulO = document.getElementById("listaID");
		if(ulO) {
			document.body.removeChild(ulO);
		}

		var ul = document.createElement("ul");
		ul.id = "listaID";

		e.viajes.forEach(function(_item) {
			var li = document.createElement("li");
			var span = document.createElement("span");
			span.innerHTML = "Nombre: " + _item.nombre + " | Start: " + _item.fecha_inicio + " | End: " + _item.fecha_fin ;

			li.appendChild(span);
			ul.appendChild(li);
		});

		document.body.appendChild(ul);
	}
});


//funcion que actualice cada segundo
//




$.ajax({
  url: `http://logirastreo.com/ws_app/resumenViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=${f_start}&fin=${f_end}`,
  context: document.body
}).done(function(e) {
	if(e.viajes) {
		var ulO = document.getElementById("listaID");
		if(ulO) {
			document.body.removeChild(ulO);
		}

		var ul = document.createElement("ul");
		ul.id = "listaID";

		e.viajes.forEach(function(_item) {
			var li = document.createElement("li");
			var span = document.createElement("span");
			span.innerHTML = "Placa: " + _item.placa + " | numero_interno: " + _item.nro_movil + " | viaje: " + _item.id_viaje  ;

			li.appendChild(span);
			ul.appendChild(li);
		});

		document.body.appendChild(ul);
	}
});








{ "tramos":[{"nombre":"Fin","fecha_inicio":"2019-05-13 07:33:19","fecha_fin":"2019-05-13 07:45:32"},{"nombre":"Estacion_Ginebra","fecha_inicio":"2019-05-13 07:09:19","fecha_fin":"2019-05-13 07:33:10"},{"nombre":"Caseta_Cerrito","fecha_inicio":"2019-05-13 06:59:19","fecha_fin":null},{"nombre":"La_reforma","fecha_inicio":"2019-05-13 06:40:19","fecha_fin":"2019-05-13 06:55:20"},{"nombre":"Versalles_n","fecha_inicio":"2019-05-13 06:34:19","fecha_fin":"2019-05-13 06:40:36"},{"nombre":"42_48","fecha_inicio":"2019-05-13 06:25:19","fecha_fin":"2019-05-13 06:32:00"},{"nombre":"Banquitas","fecha_inicio":"2019-05-13 06:16:19","fecha_fin":null},{"nombre":"CAI_Cali","fecha_inicio":"2019-05-13 06:11:19","fecha_fin":"2019-05-13 06:09:28"},{"nombre":"Estacion_MIO","fecha_inicio":"2019-05-13 05:52:19","fecha_fin":"2019-05-13 06:06:52"},{"nombre":"Prados_del_norte","fecha_inicio":"2019-05-13 05:45:19","fecha_fin":"2019-05-13 05:47:12"}]}

