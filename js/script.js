function slide() {

    let btns_slide = $(".btns_slide");
  
    btns_slide.on('click', function () {
  
      btns_slide.removeClass('selected');
      $(this).addClass('selected');
  
  
      let selected = $(".btns_slide.selected");
      let slide_principal = $('.slide_principal');
  
      if(slide_principal.attr('aria-hidden') == true) {
        setTimeout(() => {
          slide_principal.css('display', 'none');
        }, 500);
      }else {
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
  
       
      }
    });
  
  
  }
  
  slide();