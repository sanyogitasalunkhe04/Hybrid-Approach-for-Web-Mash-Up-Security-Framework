 $(document).ready(function() {
      
      function addMega(){
        $(this).addClass("hovering");
        }

      function removeMega(){
        $(this).removeClass("hovering");
        }

    var megaConfig = {
         interval: 100,
         sensitivity: 10,
         over: addMega,
         timeout: 200,
         out: removeMega
    };

    $("li.sub_menu").hoverIntent(megaConfig);
	/*$('.slideshow').cycle({
		fx: 'fade', 
		speed:  500,
		timeout: 6000
	});*/
    });
