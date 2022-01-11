berger = document.querySelector('.berger');
navbar = document.querySelector('.navbar');
logo = document.querySelector('.logo');
list = document.querySelector('.list');
rightNav = document.querySelector('.rightNav');
berger.addEventListener('click', ()=>{
    rightNav.classList.toggle('v-class');
    logo.classList.toggle('v-class');
    list.classList.toggle('v-class');
    navbar.classList.toggle('h-nav');

})