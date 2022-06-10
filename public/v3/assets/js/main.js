// menu 
const burgerElement = document.querySelector('.burger');
const menuMobile = document.querySelector('.menu-sp');

burgerElement.addEventListener('click', function () {


    if (menuMobile.classList.contains('show')) {
        menuMobile.classList.remove('show');
        $('html,body').css('overflowY', 'auto');
    } else {
        menuMobile.classList.add('show');
        $('html,body').css('overflowY', 'hidden');
    }
});


// open input search
let iconF = document.querySelector('.icon-sp');
let inputF = document.querySelector('.input-search ');
iconF.addEventListener('click', function () {
    if (!inputF.classList.contains('open')) {
        inputF.classList.add('open');
    } else {
        inputF.classList.remove('open');
    }
});
