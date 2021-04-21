     // document.querySelector('html').classList = 'js';     
     //jQ version more code:
     $('html').removeClass('no-js').addClass('js')
     const menuLink = $('.menu-link')
     const wrap = $('.wrap');

     menuLink.click( function(){
          wrap.toggleClass('active');
          menuLink.toggleClass('active');
          return false;
     })