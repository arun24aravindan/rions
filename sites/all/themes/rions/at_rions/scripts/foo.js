(function($) {
Drupal.behaviors.myBehavior = {
attach: function (context, settings) {
//code starts
 //REST
  $('#navigation a, #fixedbar a').on('click', function(e) {
    e.preventDefault();
  });
  
  $(window).on('scroll',function() {
    var scrolltop = $(this).scrollTop();

    if(scrolltop >= 320) {
      $('#fixedbar').fadeIn(250);
	  $('#header').fadeOut(250);
    }
    
    else if(scrolltop <= 320) {
      $('#fixedbar').fadeOut(250);
	  $('#header').fadeIn(250);
    }
	
  });
}
};
})(jQuery);


  
