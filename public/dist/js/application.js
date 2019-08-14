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
$delailsList.forEach(function($delailsList) {
  $delailsList.querySelector("summary").addEventListener("click", expand);
});
function expand() {
  $delailsList.forEach(function($delailsList) {
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
    console.log(event);
    $menu.classList.remove("is-active");
  } else {
    $menu.classList.add("is-active");
  }
}

/**
 * 
 */