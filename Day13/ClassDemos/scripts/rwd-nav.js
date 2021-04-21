// JavaScript Document

/*
We'll bind a custom event, "testfit", to the navigation container. We'll trigger this event when the page loads, and when the screen changes size or orientation. Desktop browsers that support text zooming, like the latest versions of Chrome, Firefox, and Opera, trigger the resize event — and this test — when the user increases or decreases text sizing with browser controls or key commands
*/
jQuery(function($){

   $('.nav-primary')
      // test the menu to see if all items fit horizontally
      .bind('testfit', function(){
            var nav = $(this),
                items = nav.find('a');
             // remove class if it was added already 
            $('body').removeClass('nav-menu');                    
                  
            // when the nav wraps under the logo, or when options are stacked, display the nav as a menu              
            if ( (nav.offset().top > nav.prev().offset().top) || ($(items[items.length-1]).offset().top > $(items[0]).offset().top) ) {
            
               // add a class for scoping menu styles
               $('body').addClass('nav-menu');
               
            };                    
         })
      
      // toggle the menu items' visiblity. On click, add the class expanded
      .find('h3')
         .bind('click focus', function(){
            $(this).parent().toggleClass('expanded')
         });   
   
   // ...and update the nav on window events
   $(window).bind('load resize orientationchange', function(){
      $('.nav-primary').trigger('testfit');
   });

});


