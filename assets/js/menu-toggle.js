const menuToggle = document.querySelector('.menu-toggle');
const header = document.querySelector('header');
const nav = document.querySelector('nav');
const navLinks = document.querySelectorAll('nav ul li a');
const span1 = document.getElementById('span-1');
const span2 = document.getElementById('span-2');
const span3 = document.getElementById('span-3');
const itens = document.querySelector('itens')

menuToggle.addEventListener('click', function(){
    header.classList.toggle('active');
    nav.classList.toggle('active');
});

navLinks.forEach(function(link){
    link.addEventListener('click', function(){
        header.classList.remove('active');
        nav.classList.remove('active');
        span1.style.transform = ''; //remove a transformação do menu em X ao clicar no li na lista.
        span2.style.opacity = '';   //remove a transformação do menu em X ao clicar no li na lista.
        span3.style.transform= '';  //remove a transformação do menu em X ao clicar no li na lista.
    });
});

window.addEventListener('resize', function(){
    if (window.innerWidth > 767) {
        header.classList.remove('active');
        nav.classList.remove('active');
    }
});

menuToggle.addEventListener('click', function(){
    if (nav.classList==('active')) {
        span1.style.transformOrigin = '0% 0%'; //Transforma o menu hamburguer em X.
        span1.style.transform = 'rotate(45deg) scaleX(1.10)'; //Transforma o menu hamburguer em X.
        span2.style.opacity = '0'; //Transforma o menu hamburguer em X.
        span3.style.transformOrigin = '0% 100%'; //Transforma o menu hamburguer em X.
        span3.style.transform = 'rotate(-45deg) scaleX(1.10)'; //Transforma o menu hamburguer em X.
    } else {
        span1.style.transform = ''; //Enquanto o menu não for clicado ele permanece inalterado.
        span2.style.opacity = ''; //Enquanto o menu não for clicado ele permanece inalterado.
        span3.style.transform= ''; //Enquanto o menu não for clicado ele permanece inalterado.
    }
});






