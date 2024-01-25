/* light / dark mode */


let modeToggle = document.querySelector('#toggle');
const main = document.querySelector('main');

modeToggle.addEventListener('change', (event)=>{
  //console.log(event.target.checked);
  if(event.target.checked){
    window.localStorage.setItem('mode', 'dark');
  }else{
    window.localStorage.setItem('mode', 'light');
  }
  checkMode();
})

function checkMode(){

  if(window.localStorage.getItem('mode') == 'dark'){
    main.classList.remove('light-mode');
    modeToggle.checked = true; //challenge question: what does this do?
  }else{
    main.classList.add('light-mode');
    modeToggle.checked = false;
  }
}

//check if 'mode' is set in localStorage();
checkMode();

/* form demo */

const insertForm = document.querySelector('#insert-form');
insertForm.addEventListener('submit', (event)=>{
  event.preventDefault();
  //console.log(insertForm.elements['user-name'].value);
  window.localStorage.setItem('user-name', insertForm.elements['user-name'].value);

})

function checkUserName(){
  if(window.localStorage.getItem('user-name')){
    insertForm.classList.add('disabled');
    welcomeUser(window.localStorage.getItem('user-name'));
  }else{
    console.log('no user-name stored');
  }
}

function welcomeUser(user){
  let p = document.createElement('p');
  p.innerHTML = `Welcome back ${user}`;
  document.querySelector('#form-demo').appendChild(p);
}

checkUserName();

/* booking demo */
let booking = {
  name: 'John Doe',
  desination: 'Paris, France',
  departure: '2024-04-01',
  return: '2024-04-30',
  adults: 2
}

window.localStorage.setItem("booking", JSON.stringify(booking));
const bookingArticle = document.querySelector('#booking');

function checkBooking(){
  bookingArticle.innerHTML = "";
  if(window.localStorage.getItem('booking')){

    let ul = document.createElement('ul');
    let booking = JSON.parse(window.localStorage.getItem('booking'));
    for(item in booking){
      let li = document.createElement('li');
      li.innerHTML = `${item}: ${booking[item]}`;
      ul.appendChild(li);
    }
    
    bookingArticle.appendChild(ul);
  }else{
    let p = document.createElement('p');
    p.innerHTML = `No booking found`;
    bookingArticle.appendChild(p);
  }
}

const bookingButt = document.querySelector('#booking-button');
bookingButt.addEventListener('click', (event)=>{
  event.preventDefault();
  checkBooking();
})

/* modal demo */
var modal = document.querySelector('#modal');
var modalOverlay = document.querySelector('#modal-overlay');
var closeButton = document.querySelector('#close-button');
var openButton = document.querySelector('#open-button');

closeButton.addEventListener('click', function() {
  modal.classList.toggle('closed');
  modalOverlay.classList.toggle('closed');
});

openButton.addEventListener('click', function() {
  modal.classList.toggle('closed');
  modalOverlay.classList.toggle('closed');
});

//coding challenge... only show the modal once...


//check if 'mode' is set in localStorage();
checkMode();




//end of challenge



/* clear local storage */

const clear = document.querySelector('#clear');
clear.addEventListener('click', (event)=>{
  event.preventDefault();
  localStorage.clear();
})