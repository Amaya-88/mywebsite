(function ($) {

  //Timeline_Amaya: Object Instance
  $.timeline_amaya = function(el, options) {
  	var timeline = $(el);
  	
  	// Store a reference to the timeline object
    $.data(el, "timeline_amaya", timeline);
    
    // making variables public
    timeline.vars = $.extend({}, $.timeline_amaya.defaults, options);
    
    // Private timeline methods
    private_methods = {
      init: function() {
      	timeline.startDate = new Date();
		timeline.categories_count = timeline.children().length;
		
		timeline.children().first().toggleClass("active");
		
		if(timeline.categories_count > 1)
			$('.cat').on("click", function(){
				$('.cat').removeClass("active");
				$(this).toggleClass("active");
			});
		
		if(timeline.categories_count > timeline.vars.maximal_shown){
			//TODO  change visible timelines with arrow
			timeline.children().slice(timeline.vars.maximal_shown,timeline.categories_count).css( "display", "none" );	
		}
			
      }
    };
    
    //initialize
    private_methods.init();
  };
  
  //Default Settings
  $.timeline_amaya.defaults = {                    
    other_timelines_show: true,  
    maximal_shown: 3,             
    time_distance: 7000,
    animationSpeed: 600
  };
  
//Timeline: Plugin Function
  $.fn.timeline_amaya = function(options) {
    if (options === undefined) options = {};
	if ($(this).data('timeline_amaya') === undefined) {
          new $.timeline_amaya(this, options);
     }
  };
})(jQuery);


