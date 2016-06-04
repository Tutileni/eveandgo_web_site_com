
<!DOCTYPE html>
	  
<html>	
													
    <head>

		<meta charset="utf-8" />
		<title>Eve&amp;Go</title>
		<link rel="icon" type="image/png" href="../MVC/Vue/images/Logo.png"/>
		<link rel="shortcut icon" type="image/x-icon" href="../MVC/Vue/images/LogoSite.png" />
		<link rel="icon" type="image/x-icon" href="../MVC/Vue/images/Logo.png" />
		<link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_accueil.css"/>
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/css_head.css"/>
        <link rel="stylesheet" media="screen" href="../MVC/Vue/css/Abasdynamique2.css" />
        <link rel="stylesheet" type="text/css" href="../MVC/Vue/css/footer_css_last_v.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        </br>
		
<script type="text/javascript">
$(document).ready(function() {

	
	$("body header .conteudo").hide(); 
	$("body header ul.menu li:first").addClass("active").show();
	$("body header .conteudo:first").show('slow'); 
	
	
	$("body header ul.menu li").mouseover(function() {
		$(".conteudo,#menuD>*").show();
		$("body header #works .work:hover .triangle-droite,#works .work .triangle-gauche,#works .work:hover span").toggle();
		$("body header ul.menu li").removeClass("active");
		$(this).addClass("active"); 

		$("body header .conteudo").hide(); 
		$("body header #works .work:hover .triangle-droite,body header #works .work .triangle-gauche,body header #works .work:hover span").toggle();
		var activeaba = $(this).find("a").attr("href"); 
		$(activeaba).fadeIn('slow'); 
		return false;
	});
	$("#H_eder").mouseover(function() {$('body header .conteudo').hide(1900,'swing');return false;});
	$('body header .conteudo').mouseleave(function() {$('body header .conteudo').hide(1900,'swing');return false;});
	
});
</script>

    </head>
    <body>
    	<header>
    		<?php echo($head); ?>
			<div  class="bloc"><nav><?php echo($nav); ?></nav></div>
			<div  class="bloc resultat">
			<div id="H_eder"><?php echo($H_eader); ?></div>
			<?php echo($Abas_dynamique); ?></div>
			<footer>
	  		<?php echo($footer); ?> 
    	</footer></header>
 </body>
 																									
</html>

