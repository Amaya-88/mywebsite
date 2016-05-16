
	 var Project = function() {

	 };
	 
	 Project.prototype.loadProjects = function(tag, language, callback) {
		jQuery.ajax({
		    type: "GET",
		    url: 'service/amayaweb_service.php',
		    data: {functionname: "getProjects", language:language, tag:tag},
		    dataType: "json",
		    success: function (obj, textstatus) {
	          if( !(obj.error) ) {	          	
	          	callback(obj.result);
	          }
	          else {
	              console.log(obj.error);
	          }
		    },
		    fail: function() {
				alert( "error" );
			}
		});
	 };
	 
	 Project.prototype.loadProjectTags = function(callback) {
	 	console.log("loadptags");
	   	jQuery.ajax({
		    type: "GET",
		    url: 'service/amayaweb_service.php',
		    data: {functionname: 'getAllTags'},
		    dataType: "json",
		    success: function (obj, textstatus) {
	          if( !(obj.error) ) {
	          	callback(obj.result);
	          }
	          else {
	              console.log(obj.error);
	          }
		    },
		    
		    fail: function() {
				alert( "error" );
			}
		});			
	 };
	 
	 