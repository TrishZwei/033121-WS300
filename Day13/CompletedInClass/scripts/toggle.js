     // document.querySelector('html').classList = 'js';     
     //jQ version more code:
     $('html').removeClass('no-js').addClass('js')
     const menu = $('#main-nav');
     const menuLink = $('.menu-link')

     menuLink.click( function(){
          menu.toggleClass('active');
          menuLink.toggleClass('active');
          return false;
     })