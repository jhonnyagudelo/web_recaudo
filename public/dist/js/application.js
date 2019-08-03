

//fecha del dia
let meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	let diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	let f=new Date();
	const day = document.getElementById('info__date');
	day.innerHTML =(diasSemana[f.getDay()]  + "<br/> "+ meses[f.getMonth()] +"  " + f.getDate() +   " del " + f.getFullYear());


//hora

function addCero(i) {
 if (i < 10) {
    i = "0" + i;
 }
  return i;
}

function printTime (){
let d = new Date();
let hours =  addCero(d.getHours());
let mins = addCero(d.getMinutes());
let secs = addCero(d.getSeconds());
document.getElementById('info__time').innerHTML = hours + ":" + mins + ":"+ secs;
}
setInterval(printTime);

const $borderLine = document.querySelector('.nav_link')
const $delailsList = document.querySelectorAll('details')
  $delailsList.forEach(function($delailsList){
    $delailsList.querySelector('summary').addEventListener('click', expand)
  })
  function expand() {
    $delailsList.forEach(function($delailsList){
      $delailsList.removeAttribute('open')
    })
  }

//modal_remove
// const $removeButton = document.querySelector('.delete__bus');
// const $modalRemove = document.querySelector('.moda__vehicle-remove');
// const $removeBus = document.getElementById('modal-remove')
// const $cancelRemove = document.getElementById('remove-cancel');

// $removeButton.addEventListener('click', showModalremove);
// function showModalremove(){
//   $modalRemove.classList.add('active');
//   $removeBus.style.animation = 'animationIn 1s forwards'
// };

// $cancelRemove.addEventListener('click', hideModalremove);
// function hideModalremove(){
//   $modalRemove.classList.remove('active');
//   $removeBus.style.animation = 'animationOut 1s forwards';
// }


// modal
const $addButton = document.querySelector('.btn-consulta');
const $cancelButton = document.getElementById('hiden-cancel');
const $modal = document.querySelector('.modal');
const $form_modal = document.querySelector('.form_modal');



// $addButton.addEventListener('click', showModal);
// function showModal(){
//   $form_modal.classList.add('active');
//   $modal.style.animation = 'animationIn 1s forwards'
// };

// $cancelButton.addEventListener('click', hideModal);
// function hideModal(){
//   $form_modal.classList.remove('active');
//   $modal.style.animation = 'animationOut 3s forwards';
// }


//menu
const $movil = window.matchMedia('screen and (max-width: 480px)');
const $menu = document.querySelector('.header__nav-ul');
const $burgerButton = document.querySelector('#burger-button');

$movil.addListener (validation);
function validation (event) {
  if(event.matches) {
      $burgerButton.addEventListener('click', hideShow);
  }else {
    $burgerButton.addEventListener('click',hideShow);
  }
};
validation($movil);

    function hideShow() {
      if($menu.classList.contains('is-active')) {
  console.log(event)
        $menu.classList.remove('is-active');
        $menu.style.transition = "all 3s ease-out";


      }else{
        $menu.classList.add('is-active');
      }
    }


