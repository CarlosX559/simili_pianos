function slide() {

  let btns_slide = $(".btns_slide");

  btns_slide.on('click', function () {

    btns_slide.removeClass('selected');
    $(this).addClass('selected');


    let selected = $(".btns_slide.selected");
    let slide_principal = $('.slide_principal');

    if (slide_principal.attr('aria-hidden') == true) {
      setTimeout(() => {
        slide_principal.css('display', 'none');
      }, 500);
    } else {
      setTimeout(() => {
        slide_principal.css('display', 'flex');
      }, 500);
    }

    for (let i = 0; i < slide_principal.length; i++) {

      if (slide_principal[i].attributes[1].value == 'false') {
        slide_principal[i].attributes[1].value = 'true';
        setTimeout(() => {
          slide_principal.css('display', 'none');
        }, 500);
      }

    }
    switch (selected[0].attributes.id.nodeValue) {
      case 'slide_swiper_1':

        if (slide_principal[0].attributes[1].value == 'true') {

          slide_principal[0].attributes[1].value = 'false';

          setTimeout(() => {
            slide_principal.css('display', 'flex');
          }, 500);

        }
        break;
      case 'slide_swiper_2':

        if (slide_principal[1].attributes[1].value == 'true') {
          slide_principal[1].attributes[1].value = 'false';
          setTimeout(() => {
            slide_principal.css('display', 'flex');
          }, 500);
        }

        break;

      case 'slide_swiper_3':

        if (slide_principal[2].attributes[1].value == 'true') {
          slide_principal[2].attributes[1].value = 'false';
          setTimeout(() => {
            slide_principal.css('display', 'flex');
          }, 500);
        }
        break;

        case 'slide_video':

        if (slide_principal[3].attributes[1].value == 'true') {
          slide_principal[3].attributes[1].value = 'false';
          setTimeout(() => {
            slide_principal.css('display', 'flex');
          }, 500);
        }

        break;


    }
  });


}

slide();


function menu() {
  $(".menu_mobile_open").click(
    function () {

      $('.menu_mobile').css('display', 'flex').css('top', '150px').css('animation', 'move ease-in 300ms');
      if (window.innerWidth <= 480) {
        $('.menu_mobile').css('display', 'flex').css('top', '138px').css('animation', 'move ease-in 300ms');
      }
      setTimeout(() => {
        $('.menu_mobile_open').css('display', 'none');
        $('.menu_mobile_close').css('display', 'flex');
      }, 200);
    }
  );

  $(".menu_mobile_close").click(
    function () {
      $('.menu_mobile').css('top', '-100%').css('animation', 'move ease-out 300ms;');
      setTimeout(() => {
        if ($('.menu_mobile').css('top', '-100%')) {
          $('.menu_mobile').css('display', 'none');
        }
      }, 600);

      setTimeout(() => {
        $('.menu_mobile_open').css('display', 'flex');
        $('.menu_mobile_close').css('display', 'none');
      }, 100);

    }

  );

  $('.menu_mobile nav ul li a').click(
    function () {
      $('.menu_mobile').css('top', '-100%').css('animation', 'move ease-out 300ms;');
      setTimeout(() => {
        if ($('.menu_mobile').css('top', '-100%')) {
          $('.menu_mobile').css('display', 'none');
        }
      }, 600);

      setTimeout(() => {
        $('.menu_mobile_open').css('display', 'flex');
        $('.menu_mobile_close').css('display', 'none');
      }, 100);
    }
  );

}
menu();

function header() {

  let body = document.querySelector('body').getBoundingClientRect();

  if (body.top < -30) {
    $('.container_menu').css('background', 'linear-gradient(174deg, #005159 2.34%, rgba(1, 6, 6, 0.72) 94.29%), #013E41').css('top', '0px');
    $('.bg_header').css('background', 'transparent').css('top', '0px');
    $('.container_menu').css('top', '0px');
  } else {
    $('.container_menu').css('background', 'transparent').css('top', '0px');
    $('.bg_header').css('background', 'linear-gradient(180deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.53) 44.42%, rgba(0, 0, 0, 0.00) 100%)').css('top', '0px');
  }

  if (body.width <= 480) {
    $('.container_menu').css('top', '0px');

  }

}

window.addEventListener('scroll', header);

const animations = document.querySelectorAll("[data-animation]");
const animations2 = document.querySelectorAll("[data-animation-2]");
const animationClass = "animate";
const animationClass2 = "animate2";

function animation_scroll() {
  const area_window = window.innerHeight * 0.20 * 4.6;

  animations.forEach((element) => {
    let posicaoAtual = element.getBoundingClientRect().top;

    if (area_window > posicaoAtual) {
      element.classList.add(animationClass);
      element.classList.add(animationClass2);
    } else {
      element.classList.remove(animationClass);
      element.classList.remove(animationClass2);
    }
  });
  animations2.forEach((element) => {
    let posicaoAtual = element.getBoundingClientRect().top;

    if (area_window > posicaoAtual) {
      element.classList.add(animationClass2);
    } else {
      element.classList.remove(animationClass2);
    }
  });
}

if (animations.length) {
  window.addEventListener("scroll", animation_scroll);
}

if (animations2.length) {
  window.addEventListener("scroll", animation_scroll);
}

function modal() {

  let btn_form = document.querySelectorAll('.btn_form');

  btn_form.forEach((element) => {

      element.addEventListener('click', () => {
          document.querySelector('.container_modal').style.opacity = 0;
          document.querySelector('.container_modal').style.display = 'flex';
          setTimeout(() => {
              document.querySelector('.container_modal').style.opacity = 1;

          }, 200);

      });

  });

  let close_modal = document.querySelector('.close_modal');

  close_modal.addEventListener('click', () => {
      document.querySelector('.container_modal').style.opacity = 0;

      setTimeout(() => {
          document.querySelector('.container_modal').style.display = 'none';
      }, 200);

  })

}

modal();