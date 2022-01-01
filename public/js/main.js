$(document).ready(function () {
  TweenMax.from(".navbar-brand", 2, {
    delay: 0.3,
    opacity: 0,
    x: -200,
    ease: Expo.easeInOut,
  });

  TweenMax.staggerFrom(
    ".navbar .nav-item",
    1,
    {
      delay: 0.9,
      opacity: 0,
      x: -60,
      ease: Power2.easeInOut,
    },
    0.2
  );

  // custom color
  $(".custom-color").each(function () {
    let str = $(this).text();
    let start = str.indexOf("[");
    let end = str.indexOf("]");
    if ((end > start) & (start != -1) & (end != -1)) {
      str =
        str.substring(0, start) +
        "<span>" +
        str.substring(start + 1, end) +
        "</span>";
      $(this).html(str);
    }
  });

  if ($(".mySwiper").length != 0) {
    let tl = gsap.timeline({ delay: 2 });
    tl.fromTo(
      ".mySwiper .content h6",
      { x: -300, opacity: 0 },
      { x: 0, opacity: 1, duration: 1 }
    );
    tl.fromTo(
      ".mySwiper .content h3",
      { x: -200, opacity: 0 },
      { x: 0, opacity: 1, duration: 1 },
      "< 0.6"
    );
    tl.fromTo(
      ".mySwiper .content p",
      { x: -200, opacity: 0 },
      { x: 0, opacity: 1, duration: 1 },
      "< 0.4"
    );
    tl.fromTo(
      ".mySwiper .content a",
      { y: +150, opacity: 0 },
      { y: 0, opacity: 1, duration: 1 },
      "< 0.2"
    );

    // swiper
    var swiper = new Swiper(".mySwiper", {
      speed: 1000,
      effect: "fade",
      centeredSlides: true,
      autoplay: {
        delay: 10000,
      },
      navigation: {
        prevEl: ".parent__Slider .fa-chevron-left",
        nextEl: ".parent__Slider .fa-chevron-right",
      },
    });

    swiper.on("slideChange", function () {
      tl.play(0);
    });

    let navSlider = new Swiper(".myHorizontalSwiper", {
      slidesPerView: 3,
      centeredSlides: true,
      slideToClickedSlide: true,
      direction: "vertical",
    });

    swiper.controller.control = navSlider;
    navSlider.controller.control = swiper;

    var swiper = new Swiper(".testimonial", {
      centeredSlides: true,
      loop: true,
      spaceBetween: 15,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        prevEl: ".testimonial .fa-chevron-left",
        nextEl: ".testimonial .fa-chevron-right",
      },
    });
    //init scroll magic
    var controller = new ScrollMagic.Controller({
      globalSceneOptions: { triggerHook: "onEnter", duration: "200%" },
    });
    new ScrollMagic.Scene({
      triggerElement: ".swiper-slide",
      triggerHook: 1,
      duration: "200%",
    })
      .setTween(
        TweenMax.from(".swiper-slide .bg", {
          y: "-20%",
          autoAlpha: 0.3,
          ease: Power0.easeNon,
        })
      )
      .addTo(controller);

    var controller2 = new ScrollMagic.Controller({
      globalSceneOptions: { triggerHook: "onEnter", duration: "200%" },
    });
    new ScrollMagic.Scene({
      triggerElement: "#service",
      triggerHook: 1,
      duration: "200%",
    })
      .setTween(
        TweenMax.fromTo(
          "#service .bg",
          { force3D: true, scale: 1.15, y: "10%" },
          { force3D: true, scale: 1.15, y: "-10%", ease: Power0.easeNon }
        )
      )
      .addTo(controller2);

    var controller3 = new ScrollMagic.Controller({
      globalSceneOptions: { triggerHook: "onEnter", duration: "200%" },
    });
    new ScrollMagic.Scene({
      triggerElement: "#portfolio .item",
      triggerHook: 1,
      duration: "200%",
    })
      .setTween(
        TweenMax.fromTo(
          "#portfolio .bg",
          { y: "70px" },
          { y: "-70px", ease: Power0.easeNon }
        )
      )
      .addTo(controller3);

    // Animation
    gsap.fromTo(
      ".parent__Slider .control",
      { y: +300, opacity: 0 },
      { y: 0, opacity: 1, duration: 1 }
    );
    let t2 = gsap.timeline({ paused: true });
    t2.fromTo(
      ".social-list span",
      { width: 0, opacity: 0 },
      { width: 40, opacity: 1 }
    );
    t2.fromTo(
      ".social-list .social__1 i",
      { x: -50, opacity: 0 },
      { x: 0, opacity: 1 },
      "< 0.1"
    );
    t2.fromTo(
      ".social-list .social__2 i",
      { x: -50, opacity: 0 },
      { x: 0, opacity: 1 },
      "< 0.2"
    );
    t2.fromTo(
      ".social-list .social__3 i",
      { x: -50, opacity: 0 },
      { x: 0, opacity: 1 },
      "< 0.3"
    );
    t2.fromTo(
      ".social-list .social__4 i",
      { x: -50, opacity: 0 },
      { x: 0, opacity: 1 },
      "< 0.4"
    );

    $(".social_media").mouseover(function () {
      t2.play();
    });
    $(".social_media").mouseout(function () {
      t2.reverse();
    });
  }

  var containerEl = $("#portfolio.portfolios .row.justify-content-center");
  if (containerEl.length > 0) {
    var mixer = mixitup(containerEl);
  }

  AOS.init({
    offset: 120,
    delay: 100,
    duration: 1000,
  });

  
  $(".navbar-toggler").click(function () {
    $('.collapse.navbar-collapse').addClass("show");
    $('.collapse.navbar-collapse.show').click(function () {
      $('.collapse.navbar-collapse').removeClass("show");
    });
  });
  

});
