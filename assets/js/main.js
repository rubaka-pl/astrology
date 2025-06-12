document.querySelector('.js-hamburger').addEventListener('click', function () {
    this.classList.toggle('is-active');
});



// СЧЕТЧИК aboutMe 
function animateCounter(counter, duration = 3000) {
    const target = +counter.getAttribute("data-target");
    let start = 0;
    const step = () => {
        const progress = Math.min(start / duration, 1);
        counter.textContent = Math.floor(progress * target).toLocaleString("ru-RU");
        if (progress < 1) {
            start += 16; // ~60fps
            requestAnimationFrame(step);
        } else {
            counter.textContent = target.toLocaleString("ru-RU");
        }
    };
    step();
}

document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll");

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const animationClass = el.dataset.animate || "animate__fadeIn";
                const delay = el.dataset.delay || "0s";

                el.style.setProperty("--animate-delay", delay);
                el.classList.add("animate__animated", animationClass);

                // Анимация счётчиков
                el.querySelectorAll(".counter").forEach((counter, index) => {
                    setTimeout(() => animateCounter(counter), index * 200);
                });

                obs.unobserve(el);
            }
        });
    }, {
        threshold: 0.3,
    });

    elements.forEach(el => observer.observe(el));
});


//scroll img
window.addEventListener("scroll", function () {
    const section = document.querySelector(".animate-on-scroll");
    if (!section) return;
    const offset = window.scrollY;
    section.style.backgroundPositionY = `${offset * 1}px`;
});

//scroll btn
const btn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        btn.classList.remove("d-none");
    } else {
        btn.classList.add("d-none");
    }
});

btn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});


//SWIPER
document.addEventListener('DOMContentLoaded', function () {

    const swiper1 = new Swiper('.mySwiper_1', {
        loop: true,
        spaceBetween: 20,
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {

    const swiper2 = new Swiper(".mySwiper_2", {
        loop: true,
        centeredSlides: false,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }, pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
});


// //offset for scroll
// document.addEventListener("DOMContentLoaded", function () {
//     // Смещение по якорной ссылке (на 60px вверх)
//     const OFFSET = 120;

//     function offsetAnchor() {
//         if (window.location.hash) {
//             const target = document.querySelector(window.location.hash);
//             if (target) {
//                 const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
//                 window.scrollTo({
//                     top: elementPosition - OFFSET,
//                     behavior: "smooth"
//                 });
//             }
//         }
//     }

//     // Если якорь уже есть при загрузке
//     window.setTimeout(offsetAnchor, 0);

//     // При клике по якорной ссылке
//     document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//         anchor.addEventListener("click", function (e) {
//             const href = this.getAttribute("href");
//             const target = document.querySelector(href);
//             if (target) {
//                 e.preventDefault();
//                 const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
//                 window.history.pushState(null, null, href); // обновить URL
//                 window.scrollTo({
//                     top: elementPosition - OFFSET,
//                     behavior: "smooth"
//                 });
//             }
//         });
//     });
// });



