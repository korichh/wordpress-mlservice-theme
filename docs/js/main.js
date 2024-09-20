'use strict';

const post__init = function () {
    const post = document.querySelector('section.post');
    const headerWrapper = document.querySelector('.header-wrapper');
    if (post) {
        setTimeout(() => {
            window.scrollTo({
                top: post.offsetTop - headerWrapper.offsetHeight,
                behavior: "smooth",
            })
        }, 200)
    }
}();

// Image background
const ibg_init = function () {
    const ibg = document.querySelectorAll('.ibg');
    if (ibg.length > 0) {
        for (let i = 0; i < ibg.length; i++) {
            if (ibg[i].querySelector('img')) {
                ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
            }
        }
    }
}();

// Navigation
const navigation_init = function () {
    const burger = document.querySelector('.header-burger');
    const burgerNav = document.querySelector('.burger-nav');
    const overlay = document.querySelector('.overlay');

    overlay.addEventListener('click', () => {
        document.body.classList.toggle('_lock');
        burger.classList.toggle('_active');
        burgerNav.classList.toggle('_active');
        overlay.classList.toggle('_active');
    })

    if (burger && burgerNav) {
        burger.addEventListener('click', () => {
            document.body.classList.toggle('_lock');
            burger.classList.toggle('_active');
            burgerNav.classList.toggle('_active');
            overlay.classList.toggle('_active');
        });
    }

    const sections = document.querySelectorAll('section');
    const links = document.querySelectorAll('.menu-item a');
    const headerWrapper = document.querySelector('.header-wrapper');

    if (sections.length > 0 && links.length > 0) {
        for (const link of links) {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                const sectionId = link.getAttribute('href');
                const section = document.querySelector(sectionId);
                if (burgerNav.classList.contains('_active')) {
                    document.body.classList.remove('_lock');
                    burger.classList.remove('_active');
                    burgerNav.classList.remove('_active');
                    overlay.classList.remove('_active');
                }

                if (section) {
                    window.scrollTo({
                        top: section.offsetTop - headerWrapper.offsetHeight,
                        behavior: "smooth",
                    })
                }
            });
        }

        const observer = new IntersectionObserver((entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    for (const link of links) {
                        const linkHref = link.getAttribute('href').replace('#', '');

                        if (linkHref === entry.target.id) {
                            link.closest('li').classList.add('current-menu-item');
                        } else {
                            link.closest('li').classList.remove('current-menu-item');
                        }
                    }
                }
            }
        }, {
            threshold: 0.5,
        });

        for (const section of sections) {
            observer.observe(section);
        }
    }
}();

const popup__init = function () {
    const contact = document.querySelector('.popup-contacts');
    const success = document.querySelector('.popup-success');

    const servicesButtons = document.querySelectorAll('.services-item__button a');

    if (contact && success) {
        contact.addEventListener('click', (e) => {
            if (!e.target.closest('.popup-inner')) {
                e.preventDefault();

                contact.classList.remove('_active');
                document.body.classList.remove('_lock');
            }
        })

        success.addEventListener('click', (e) => {
            if (!e.target.closest('.popup-inner')) {
                e.preventDefault();

                success.classList.remove('_active');
            }
        })
    }

    for (const button of servicesButtons) {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            contact.classList.add('_active');
            document.body.classList.add('_lock');
        })
    }

    if (window.location.href.includes('#wpcf7-f146-o1')) {
        success.classList.add('_active');
        setTimeout(() => {
            success.classList.remove('_active');
        }, 3000)
    }
}();

const services__init = function () {
    const items = document.querySelectorAll('.services-item');
    const button = document.querySelector('.services-inner__button-more');

    if (items.length > 0 && button) {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            for (let i = 5; i < items.length; i++) {
                items[i].style.display = 'block';
            }

            button.style.display = 'none';
        })
    }
}();

const carousel__init = function () {
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        const carouselSelector = carousel.querySelector('.swiper');
        const carouselPrev = carousel.querySelector('.swiper-button-prev');
        const carouselNext = carousel.querySelector('.swiper-button-next')

        const carouselSwiper = new Swiper(carouselSelector, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 13,

            breakpoints: {
                768: {
                    slidesPerView: 2,
                },

                1200: {
                    slidesPerView: 3,
                },
            },

            navigation: {
                prevEl: carouselPrev,
                nextEl: carouselNext,
            },
        });
    }
}();

const hero__init = function () {
    const playButton = document.querySelector('.hero-player__button a');
    const image = document.querySelector('.hero-bg__main .image');
    const video = document.querySelector('.hero-bg__main .video');
    const videoArea = document.querySelector('.hero-content__player');
    const icons = document.querySelector('.hero-player .circle');

    if (playButton && image && video && videoArea && icons) {
        playButton.addEventListener('click', (e) => {
            e.preventDefault();
            if (!image.classList.contains('_hide')) {
                image.classList.add('_hide');
                video.classList.add('_show');
            }

            if (!video.paused) {
                video.pause();
                playButton.classList.remove('_hide');
                icons.classList.remove('_change');
            } else {
                video.play();
                playButton.classList.add('_hide');
                icons.classList.add('_change');
            }
        });

        videoArea.addEventListener('mouseover', (e) => {
            if (!video.paused) {
                playButton.classList.remove('_hide');
            }
        });

        videoArea.addEventListener('mouseout', (e) => {
            if (!video.paused) {
                playButton.classList.add('_hide');
            }
        });
    }
}();

const inputmask__init = function () {
    const inputs = document.querySelectorAll('input[type="tel"]');
    const im = new Inputmask('(999)-999-9999');
    im.mask(inputs);
}();

document.addEventListener('click', (e) => { if (e.target.closest('a')) { const href = e.target.closest('a').getAttribute('href'); if (href.includes('#')) return; e.preventDefault(); window.location.href = '/wordpress-mlservice-theme' + href } })