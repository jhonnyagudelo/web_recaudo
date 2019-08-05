
   var url = `http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${id_viaje}`
   

   
   
   $.ajax({
    let _id_viaje = "16981618";
     url: `http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${_id_viaje}`,
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
   




   $.ajax({
    let f_start = "2019-08-03 04:00:00";
    let f_end = "2019-08-03 20:00:00";
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
  