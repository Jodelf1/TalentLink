const swiper = new Swiper('.slider-wrapper', {

    spaceBetween: 10,
    grabCursor: true,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0:{
            slidesPerView: 1
        },
        620:{
            slidesPerView: 2
        },
        1024:{
            slidesPerView: 3
        },   
    }
  });