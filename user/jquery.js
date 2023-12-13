

//form Container
const formArea = document.getElementById('wrapper');

//Form
const loginDiv = document.getElementById('login-side');
const signupDiv = document.getElementById('signup-side');

//Form Switch
const switchEffect = document.querySelectorAll('.switch-animation a');

//Signup form Apperance
switchEffect[0].addEventListener('click', () => {
    loginDiv.style.transform = 'translateX(-100%)';
    signupDiv.style.transform = 'translateX(0)';
})

//loginApearance
switchEffect[1].addEventListener('click', () => {
    loginDiv.style.transform = 'translateX(0)';
    signupDiv.style.transform = 'translateX(-100%)';
})

$(document).ready(function() {
    // Swiper: Slider
        new Swiper('.swiper-container', {
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 3,
            paginationClickable: true,
            spaceBetween: 20,
            breakpoints: {
                1920: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1028: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                480: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });
    });
    