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
		          		    <a class="tec <%= encodeTag(this.name) %>" href="#<%= encodeTag(this.name) %>"><%= this.name %></a>
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
    <script type="text/javascript" src="scripts/project/model/project.js"></script>
    <script type="text/javascript" src="scripts/project/view/project.js"></script>
    <script type="text/javascript" src="scripts/project/controller/project.js"></script>

</body>
</html>