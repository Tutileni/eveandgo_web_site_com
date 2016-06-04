
<!DOCTYPE html>
	  
<html>

																	
    <head>
		<meta charset="utf-8" />
		<title>Evénements</title>
		<link rel="icon" type="image/png" href="../MVC/Vue/images/Logo.png"/>
		<link rel="shortcut icon" type="image/x-icon" href="../MVC/Vue/images/LogoSite.png" />
		<link rel="icon" type="image/x-icon" href="../MVC/Vue/images/Logo.png" />
		
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_liste_eve1.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_head.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_accueil.css"/>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="..MVC/Vue/Javascripts/datepicker.js"></script>
		 
    </head>
	<body>
    	<header>
    		<?php echo($head); ?>
			<div  class="bloc"><nav><?php echo($nav); ?></nav></div>
			<div  class="resultat">

																					
	  		<?php echo($evenements); ?> 
         						
			</div>
			<footer>
	  		<?php echo($footer); ?> 
    	</footer></header>
 </body>
																	
</html>


