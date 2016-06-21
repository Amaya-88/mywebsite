<?php include "util/urltools.php"; ?>
	<?php include "util/translation.php"; 
		$translation = new Translation();
	?>
<!DOCTYPE html>
<html>
<head>
	<?php include "metatags.php" ?>
    <link rel="icon" href="/images/site_icon.png" />
	<link rel="stylesheet" type="text/css" href="styles/stylesheets/layout.css">
  <title><?php echo curPageName(); ?> - Amaya Pascual Cajal</title>
</head>
<body>

	<?php include "ui/components/header.php"; ?>
  <div id="content">
      <div class="center">
       <div class="main">

          
              <a class="download_link" href="data/pdf/Projektliste.pdf"><?php echo $translation->{'getTranslation'}("DOWNLOAD_ALL_TEXT")?></a>
              <div id="tags">
	              <a href="#" id="tagpull"> Tags >></a> 
	              <div id="filter">
	          	

		          	    <script type="text/x-jqote-template" id="tags_tmpl">
		          		    <a class="tec <%= encodeTag(this.name) %>" href="projects.php?l=<?php echo $c_idiom;?>#<%= encodeTag(this.name) %>"><%= this.name %></a>
					    </script>
					
	              </div> 
	              <a href="#" id="tagall"> all</a> 
              </div>
              <div id="projects">
          	    <script type="text/x-jqote-template" id="project_tmpl">
          		    <div class="project">
	          		    <h2><%= this.name %></h2>
	          		    <p><span class="chapter"><?php echo $translation->{'getTranslation'}("DESCRIPTION")?>: </span><%= this.description %></p>
	          		    <p><span class="chapter"><?php echo $translation->{'getTranslation'}("ROL")?>: </span> <%= this.role %></p>
	          		    <p><span class="chapter"><?php echo $translation->{'getTranslation'}("TECHNOLOGIES")?>: </span> <%= this.technologies %></p>
	          		    <% if(this.link) {%>
	          			    <p><span class="chapter">link: </span><a href="<%= this.link %>"> <%= this.link %></a></p>
	          		    <%}%>
	          		    <% if(this.code) {%>
	          			    <a class="download_link" href="<%= this.code %>"> download source </a>
	          		    <%}%>
	          	    </div>
			    </script>
              </div>
        </div>
       </div>
  </div>
  	<?php include "ui/components/footer.php"; ?>
    <script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/jquery.jqote2.min.js"></script>
    <script type="text/javascript" src="scripts/scripts.js"></script>
    <script type="text/javascript" src="scripts/project.js"></script>
    <script type="text/javascript">
		console.log("1")
		//encode project tag to avoid incompatibility problems
		function encodeTag(tag){
			return tag.replace(/#$/, '_sharp').replace(/([ ])/g, '__').replace(/\./, '_dot_');
		}
		function decodeTag(tag){
			return tag.replace(/_sharp$/, '#').replace(/(__)/g, ' ').replace(/\_dot_/, '.');
		}
		
		//performs operations on the view
		var View = function() {
			console.log("3")
			this.tags_tmpl = $('#tags_tmpl');
			this.tag_conainer = $('#tags');
			this.projects_container = $('#projects');
			this.project_tmpl = $('#project_tmpl');
			this.filter = $('#filter');
			this.tagall = $('#tagall');
			this.tagpull = $('#tagpull')
			this.init();
	 	};
	 	View.prototype.init = function(){
	 		
	 	};
	    View.prototype.changeActivTag = function() { 
			$('#content a.tec.activ').removeClass("activ");
			var _hash = window.location.hash.replace(/^#/,'');
			if(_hash.length>0)
				$('#content a.tec.'+window.location.hash.replace(/^#/,'')).addClass("activ");
			else
				$('#content a.tec').addClass("activ");
		};
		
		//change pull bottom visibility
		View.prototype.changeAllBtnState = function(){
			var _hash_length = window.location.hash.replace(/^#/,'').length;
	        if(this.tagall.is(':hidden') && _hash_length > 0)
	        	this.tagall.css("display", "block");
	        if(!this.tagall.is(':hidden') && _hash_length ==0){
	        	this.tagall.css("display", "hidden");
	        }
		};
		
		View.prototype.changeTagPullState = function(event){
	        if(event) event.preventDefault(); 
	        
	        if($(this.filter).is(':hidden')) 
	        	 $(this.tagpull).text("Tags <<")
	        else
	        	$(this.tagpull).text("Tags >>")
	        	
	        $(this.filter).slideToggle();  
		};
		
		View.prototype.removeProjects = function(){
	       $(".project").remove();
		};
		View.prototype.addProjects = function(result){
			var text = this.project_tmpl.jqote(result);
			
	        this.projects_container.append(text.replace(/\[\[(.+?)\]\]/g, function ( mtch ,val) 
    		{
    			return "<a class='tec "+encodeTag(val)+"' href='projects.php?l="+$.urlParam('l')+"#"+encodeTag(val)+"'>"+val+"</a>";
    		}));
		};
		
		
	    var view = new View();
		$( document ).ready(docLoad);
		function docLoad(){
			console.log("docload")		
			
			var project = new Project();
			loadProjectTag(project)
			loadProject(project);
			
			initHandlers();
		}
		
		function loadProjectTag(project){
			project.loadProjectTags(
				function function_callback(result){	
					 var text = view.tags_tmpl.jqote(result);
		    		view.filter.append(text);
				}
			);
		}
		
		function loadProject (project) {	
			project.loadProjects(
				decodeTag(window.location.hash.replace(/^#/,'')), 
				$.urlParam("l"),
				function function_callback(result){
		    		view.addProjects(result);
		    		view.changeActivTag();
		    		view.changeAllBtnState();
		    	}
		  );
				
		}
		
		function initHandlers(){

			    $(tagpull).on('click', view.changeTagPullState.bind(this));    
			    
				/*$(window).resize(function(){  
				    var w = $(window).width();  
				    if(w > 320 && view.filter.is(':hidden')) {  
				        menu.removeAttr('style');  
				    }  
				});*/
			        	
			//change project when hash changes
			if (("onhashchange" in window) && !(navigator.userAgent.match(/MSIE [67]\./))) { 
			
			    //modern browsers 
			    $(window).bind('hashchange', function() {
			        view.removeProjects();
			       var project = new Project();
				   loadProject(project);
			    });
			
			} else {
			    //IE and browsers that don't support hashchange
			    $('a.tec').bind('click', function() {
			        view.removeProjects();
			        var project = new Project();
					loadProject(project);
			    });
			}
		}
		


    </script>
</body>
</html>