var url = "http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${id_viaje}"




var id_viaje = "16994844 ";

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



var f_start = "2019-08-04 05:00:00";
var f_end = "2019-08-04 20:00:00";
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







