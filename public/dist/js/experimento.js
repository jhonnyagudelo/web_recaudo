/**
 * FUNCION DE MOSTRAR HORA
 */

//fecha del dia
let meses = new Array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);
let diasSemana = new Array(
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado"
);
let f = new Date();
const day = document.getElementById("info__date");
day.innerHTML =
    diasSemana[f.getDay()] +
    "<br/> " +
    meses[f.getMonth()] +
    "  " +
    f.getDate() +
    " del " +
    f.getFullYear();

//hora

function addCero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function printTime() {
    let d = new Date();
    let hours = addCero(d.getHours());
    let mins = addCero(d.getMinutes());
    let secs = addCero(d.getSeconds());
    document.getElementById("info__time").innerHTML =
        hours + ":" + mins + ":" + secs;
}
setInterval(printTime);

/**
 * FUNCION PARA DESPLEGAR MENU
 */

const $borderLine = document.querySelector(".nav_link");
const $delailsList = document.querySelectorAll("details");
$delailsList.forEach(function ($delailsList) {
    $delailsList.querySelector("summary").addEventListener("click", expand);
});
function expand() {
    $delailsList.forEach(function ($delailsList) {
        $delailsList.removeAttribute("open");
    });
}


/**
 * FUNCION PARA EL MENU-BURGER
 */

//menu
const $movil = window.matchMedia("screen and (max-width: 480px)");
const $menu = document.querySelector(".header__nav-ul");
const $burgerButton = document.querySelector("#burger-button");

$movil.addListener(validation);
function validation(event) {
    if (event.matches) {
        $burgerButton.addEventListener("click", hideShow);
    } else {
        $burgerButton.addEventListener("click", hideShow);
    }
}
validation($movil);

function hideShow() {
    if ($menu.classList.contains("is-active")) {
        // console.log(event);
        $menu.classList.remove("is-active");
    } else {
        $menu.classList.add("is-active");
    }
}




// /** API REST */



// const getUserAll = new Promise(function (bien, malo) {
//     setTimeout(function () {
//         bien('Malooooo')
//     }, 5000)
// })

// const getUser = new Promise(function (bien, malo) {
//     //llamar la api
//     setTimeout(function () {
//         bien('Se acabo el tiempo');
//     }, 3000)
// })


// getUser
//     .then(function (message) {
//         console.log(message);
//     })
//     .catch(function (message) {
//         console.log(message)
//     })

// // varias promesas

// Promise.all([
//     getUser
//     , getUserAll
// ])
//     .then(function (message) {
//         console.log(message);
//     })
//     .catch(function (message) {
//         console.log(message)
//     })

//     let calve = '?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=2019-08-20 03:00:00&fin=2019-08-20 20:00:00';

// // var f_start = "2019-08-16 03:00:00";
// // var f_end = "2019-08-16 20:00:00";
// fetch('http://logirastreo.com/ws_app/resumenViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=2019-08-20 03:00:00&fin=2019-08-20 20:00:00')
//     .then(function (response) {
//         console.log(response)
//         return response.json()
//     })
//     .then(function (viaje) {
//         console.log('viaje', viaje.viajes[0].id_viaje)
//     })
//     .catch(function () {
//         console.log('fallo')
//     });

// (async function load() {
//     async function getData(url) {
//         const response = await fetch(url);
//         const data = await response.json();
//         if(data.data.vehiculo > 0){
//         return data;   
//     }
//     throw new Error('No encontro resultado');
// }



//     const $td = document.querySelector('td')


//     function setAtributos($elemento, atributos) {
//         for (const atributo in atributos) {
//             $elemento.setAtributos(atributo, atributos[atributo]);
//         }
//     }

//     const BASE_API = 'http://logirastreo.com/ws_app/tramosViaje.php?';

//     const {
//         data: {
//             placa: placaList
//         }
//     } = await getData(`${BASE_API}?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=2019-08-20 03:00:00&fin=2019-08-20 20:00:00`)


// })

// http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=17230987 



// function createNode($element) {
//     return document.createElement($element);
// }

// function append(parent, el){
//     return parent.appendChild(el);
// }

// const ID = document.querySelector('#id')
// const VEHICULO = document.querySelector('#vehiculo')
// // const BASE_API1 = 'http://logirastreo.com/ws_app/resumenViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=2019-08-20 03:00:00&fin=2019-08-20 20:00:00';
// const BASE_API1 = 'http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=17230987';
// const BASE_APITRAMOS = 'http://logirastreo.com/ws_app/tramosViaje.php?';
// fetch(BASE_API1)
//     .then((resp) => resp.json()) // transformo la data en json
//     .then(function(data){
//         let viajes = data.tramos;
//         console.log(data.tramos)
//         return viajes.map(function(viaje) {
//             let li = createNode('li'),
//             span = createNode('span');
//             span.innerHTML = `${viaje.nombre} <br> ${viaje.fecha_fin}`;
//             append(li, span)
//             append(VEHICULO, li);
//         })
//     })
//     .catch(function(error){
//         console.log(error);
//     });



//  const BASE_API1 = 'http://logirastreo.com/ws_app/resumenViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&inicio=2019-08-20 03:00:00&fin=2019-08-20 20:00:00';
//  const BASE_API_TRAMOS = 'http://logirastreo.com/ws_app/tramosViaje.php?pass=b3dcd41072ccdbb7b7925f144f4dbaa7&idViaje=${id_viaje}';

// function getIdViaje(){
//     fetch(BASE_API1)
//         .then((resp) => resp.json())
//         .then(function(data){
//             let viajes = data.viajes;
//             return viajes.map(function(viaje) {
//                 console.log(viaje.id_viaje)


//             })
//         })
// }
// getIdViaje();



//Modal recibo

// (async function load() {
    
//     function setAtributos($elementos, $atributos) 
//     {
//         for(const atributo in atributos) {
//             $elementos.setAtributos(atributo,atributos[atributos]);
//         }
//     }


//     function addEventClick($elemento) 
//     {
//         $elemento.addEventListener('click',() =>{
//             alert('click')
//             showModal($elemento)
//         })    
//     };


//     const $modal = document.querySelector('modal');
//     const $overlay = document.querySelector('overlay');
//     const $hideModal = document.querySelector('hide-modal');

//     const $modalTitulo = document.querySelector('h1');
//     const $modalImg = document.querySelector('img');
//     const $modalDescripcion= document.querySelector('p');





//     function showModal($elemento)
//     {
//         $overlay.classList.add('active');
//         $modal.getElementsByClassName.animation = 'modalIn .8s forwards';

//     }

// });
