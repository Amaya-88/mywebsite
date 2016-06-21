    function parseJSON(data) {
	    return window.JSON && window.JSON.parse ? window.JSON.parse( data ) : (new Function("return " + data))(); 
	}
	
	$.urlParam = function(name){
	    var results = new RegExp('[\\?&amp;]' + name + '=([^&amp;#]*)').exec(window.location.href);
	    return results && results[1] || null;
	};
	
$( window ).load(function() {
  $(function() {  
    var pull        = $('.pull');  
        menu        = $('div.menu ul');  
        menuHeight  = menu.height();  
    $(pull).on('click', function(e) {  
        e.preventDefault();  
        menu.slideToggle();  
    });  
	});  
	$(window).resize(function(){  
	    var w = $(window).width();  
	    if(w > 320 && menu.is(':hidden')) {  
	        menu.removeAttr('style');  
	    }  
	});   
});


Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
};
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = 0, len = this.length; i < len; i++) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
};