const backToTopButton = document.querySelector('.back-to-top')

const backToTop = () => {
 if (window.scrollY >= 100) {
    backToTopButton.classList.add('show')
 } else {
    backToTopButton.classList.remove('show')
 }
}

window.addEventListener('scroll', function () {
 backToTop()
 
})

backToTopButton.addEventListener("click",function (){
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  })
  
