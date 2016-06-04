
<!DOCTYPE html>
	  
<html>

																	
    <head>
		<meta charset="utf-8" />
		<title>Ajout d'événement</title>
		<link rel="icon" type="image/png" href="../MVC/Vue/images/Logo.png"/>
		<link rel="shortcut icon" type="image/x-icon" href="../MVC/Vue/images/LogoSite.png" />
		<link rel="icon" type="image/x-icon" href="../MVC/Vue/images/Logo.png" />
		<link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_accueil.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_head.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/AjoutEve2.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/bouton.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/footer_css_last_v1.css">

		
    </head>
	<body>
    	<header>
    		<?php echo($head); ?>
			<div  class="bloc"><nav><?php echo($nav); ?></nav></div>
			
			<div class="resultat">	
			<script type="text/javascript">
			    $(document).ready(function() {
			        $('.datepick').datepicker({ dateFormat: "yy-mm-dd"});
			    });
			</script>																	
	  		<?php echo($AjoutEve); ?>  
         						</div>
         <footer>
	  		<?php echo($footer); ?> 
    	</footer>
			
		</header>

																
    	
 </body>															
</html>

