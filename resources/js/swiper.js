import "./bootstrap";
// import Swiper bundle with all modules installed
import Swiper from "swiper/bundle";

// import styles bundle
import "swiper/css/bundle";

var galleryThumbs = new Swiper(".gallery-thumbs", {
    initialSlide: 1,
    centeredSlides: true,
    // loop: true,
    centeredSlidesBounds: true,
    direction: "horizontal",
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: false,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    watchOverflow: true,
    breakpoints: {
        480: {
            direction: "vertical",
            slidesPerView: 4,
        },
    },
});
var galleryTop = new Swiper(".gallery-top", {
    direction: "horizontal",
    touchRatio: 0,
    // loop: true,
    spaceBetween: 10,
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    // navigation: {
    //   nextEl: ".swiper-button-next",
    //   prevEl: ".swiper-button-prev"
    // },
    a11y: {
        prevSlideMessage: "Previous slide",
        nextSlideMessage: "Next slide",
    },
    keyboard: {
        enabled: true,
    },
    mousewheel: true,
    thumbs: {
        swiper: galleryThumbs,
    },
});
