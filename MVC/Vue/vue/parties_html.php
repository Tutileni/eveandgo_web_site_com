
<?php
function nav(){
				
	ob_start();
	?>
		

			<?php if (!isset($_SESSION["LOGIN"])) {
				//<li><a href="../MVC/Vue/Romain/liste-evenements.php">Evénements</a></li>
		print('
			<div id="barre_nav">
			<ul>
				<li><a href="../MVC/index.php?cible=accueil">Accueil</a></li>
				<li><a href="../MVC/index.php?cible=Ajout_eve_non_connectee">Ajouter un événement</a></li>
				<li><a href="../MVC/index.php?cible=Inscription">Inscription</a></li>
				<li>
				<input type="text" class="form-control" id="search" placeholder="Mot Clé">
				<button class="btn btn-default" id="search-btn"" type="button">Recherche</button>
				
				<li><a href="../MVC/index.php?cible=evenement">Recherche avancée</a></li>
			</ul>
		</div>

		<script>
            function buscar(search)
            {
                var page = "../MVC/recherche.php";
                $.ajax
                        ({
                            type: \'POST\',
                            dataType: \'html\',
                            url: page,
                            beforeSend: function () {
                            	
                                
                                $("div.bloc:nth-child(4)").html("<center><p>Chargement en cours...</p></center>");
                                
                            },
                            data: {search: search},
                            success: function (msg)
                            {	
                               $("div.bloc:nth-child(4)>*, div.bloc:nth-child(3)").html(msg);
                               $(".resultat", div.bloc:nth-child(3)).html(msg);

                               
                            }
                        });
            }
            
            
            $(\'#search-btn\').click(function () {
                buscar($("#search").val())
            });
        </script>

		');
			    
			} else{
				print('<div id="barre_nav">
			<ul>
				<li><a href="../MVC/index.php?cible=accueil">Accueil</a></li>
				
				<li><a href="../MVC/index.php?cible=Referencer_eve">Ajouter un événement</a></li>
				
				<li>
				
				<input type="text" class="form-control" id="search" placeholder="Mot Clé">
				<button class="btn btn-default" id="search-btn"" type="button">Chercher</button>
				
				<li><a href="../MVC/index.php?cible=evenement">Recherche avancée</a></li>
			</ul>
		</div>

		<script>
            function buscar(search)
            {
                var page = "../MVC/recherche.php";
                $.ajax
                        ({
                            type: \'POST\',
                            dataType: \'html\',
                            url: page,
                            beforeSend: function () {
                            	
                                
                                $("div.bloc:nth-child(4)").html("<center><p>Chargement en cours...</p></center>");
                                
                            },
                            data: {search: search},
                            success: function (msg)
                            {	
                               $("div.bloc:nth-child(4)>*, div.bloc:nth-child(3)").html(msg);
                               $(".resultat, div.bloc:nth-child(3)").html(msg);

                               
                            }
                        });
            }
            
            
            $(\'#search-btn\').click(function () {
                buscar($("#search").val())
            });
        </script>

		');
			   
			} 
			?>
		


		
		<?php
		$nav=ob_get_clean();
		return $nav;
}



function head($pasbon){
    ob_start();
	?>
	 
	
	<p class="flotte bloc"><a href="index.php"><img src="../MVC/Vue/images/Logo.png" alt="Eve&Go" class="circular1"></a></p>
		
		
		<?php
		if(($pasbon=="utilisateur inconnu" || $pasbon=="Mot de passe incorrect") && !isset($_SESSION["LOGIN"]))
		{	

			print('<form method="POST" action="../MVC/index.php?cible=good"><!-- Visiteur -->
		<div class="connection bloc">
			<div class="connectionHead">Connectez-vous</div>
			<hr noshade="noshade">
			<p><label id="label_login">Login : </label><input type="text" name="login"  placeholder="Login"/></p>
			<p><label id="label_mdp">Mot de passe : </label><input type="password" name="mot_de_passe" placeholder="Mot de passe"/></p>
			<center><a href="" >Mot de passe perdu ?</a><br><div class="erreur">'.$pasbon.'</div></center>				
			<input type="submit" value="Se connecter" name="valide"/>		
		</div>
		</form>');
		}elseif($pasbon == "vous etes connecte" || isset($_SESSION["LOGIN"])){

			$sexe=($_SESSION["SEXE"]=="H")?"Mr":"Mme";
			$photo=isset($_SESSION['PHOTO'])?$_SESSION['PHOTO']:'../MVC/Vue/images/imageProfil/avatar.jpeg';

			print('<div class="connection bloc" id="DeconnectE">
			<div class="connectionHead ">Connecté</div>
			<hr noshade="noshade">
			<label id="label_prenom_et_nom">Bienvenue </br>'.$sexe.'&nbsp;&nbsp;'.$_SESSION["NOM"].' '.$_SESSION["PRENOM"].'</label>&nbsp;&nbsp;
			');
			require("../MVC/Modele/connexion_db.php");
	        $reponse = $db->query('SELECT * 
					 FROM evenement e,  lieu l 
					 WHERE e.membre_Login = "'.$_SESSION["LOGIN"].'"');
	        if($reponse->rowcount()>0)
			    {
				echo '<a id="ME" href="../MVC/index.php?cible=mesevenements"><input type="button" value="Mes événements" class="comptee" ></a>';}
print('
			<a id="ME" href="../MVC/index.php?cible=update_profil"><input type="button" value="Changer Mon profil" class="comptee" ></a>
			<a href="../MVC/index.php?cible=deconnexion"><input type="button" classe="input" value="Déconnexion"/></a>
			<p></p><img src="../MVC/Vue/images/imageProfil/'.$photo.'" style="position:relative! important;height:80px;width:80px;float:left;"alt="Image '.$_SESSION["PRENOM"].' ">
			</div>
			</div>');


			
		
	}
	elseif((empty($pasbon) || empty($Donne)) && !isset($_SESSION["LOGIN"])){

				
			print('<form method="POST" action="../MVC/index.php?cible=good"><!-- Visiteur -->
		<div class="connection">
			<div class="connectionHead">Connectez-vous</div>
			<hr noshade="noshade">
			<p><label id="label_login">Login : </label><input type="text" name="login"  placeholder="Login"/></p>
			<p><label id="label_mdp">Mot de passe : </label><input type="password" name="mot_de_passe" placeholder="Mot de passe"/></p>
			<center><a href="" >Mot de passe perdu ?</a><br><div class="erreur">'.$pasbon.'</div></center>				
			<input type="submit" value="Se connecter" name="valide"/>		
		</div>
		</form>');
			
		}
	?>
        <?php
		$head=ob_get_clean();
		return $head;												
}
function H_eader($centre_interet){
         ob_start();
         ?> 
		  <style>
		  		
		  		a,img {
					border: none;
				}
		  		

		  		.trs {
					-webkit-transition:all ease-out 0.1s;
		  			-moz-transition:all ease-out 0.1s;
		  			-o-transition:all ease-out 0.1s;
		  			-ms-transition:all ease-out 0.1s;
		  			transition:all ease-out 0.1s;

					
				}
		
		  		#slider {
					position: relative; 
					z-index: 1;
				}
		  		#slider a {
					 position: absolute; 
					 top: 0; 
					 left: 0; 
					 opacity: 0;
					 filter:alpha(opacity=0);
				 }
				 
		  		.ativo {
					opacity: 1!important; 
					filter:alpha(opacity=100)!important;
				}
		
		  		/*controladores*/
		  		figure span {
					/*background: #0190EE; */
					cursor: pointer; 
					opacity: 0;
					filter:alpha(opacity=0); 
					position: absolute; 
					bottom: 40%; 
					width: 43px; 
					height: 43px; 
					z-index: 5;
				}
		  		
				.next {
					right: 10px;
				}
		  		.next:before,.next:after {
					left: 21px;
				}
		  		.next:before {
		  			-webkit-transform: rotate(-42deg);
		  			top: 5px;
		  		}
		  		.next:after {
		  			-webkit-transform: rotate(-132deg);
		  			top: 19px;
		  		}
		  		.next:before,.next:after,.prev:before,.prev:after {
					/*content: "";
		  			height: 20px;
		  			background: #fff;
		  			width: 1px;*/
		  			position: relative;
		  		}
		  		.prev {
					left: 10px;
				}
		  		.prev:before,.prev:after {
					left: 18px;
				}
		  		.prev:before {
		  			-webkit-transform: rotate(42deg);
		  			top: 5px;
		  		}
		  		.prev:after {
		  			-webkit-transform: rotate(132deg);
		  			top: 19px;
		  		}
		  		figure:hover span {
					opacity: 0.76;
					filter:alpha(opacity=76);
				}
		  		figure {
		  			max-width: 900px;
		  			height: 500px;
		  			position: relative;
		  			overflow: hidden;
		  			margin: -5px auto;
		  			
   					padding-bottom: 20px;
   					margin-top:59px;
		  		}
		  		figcaption {
					padding-left: 20px;
					color: #fff; 
					font-family: "Kaushan Script","Lato","arial"; 
					font-size: 12px; 
					background: rgba(255, 0, 0, 0.76); 
					width: 200px;
					position: relative; 
					bottom: 0; 
					left: 0; 
					line-height: 20px; 
					height: 40px; z-index: 5;
				}
				
					/*<h1 style="width: auto; padding-top: 15px; padding-bottom: 5px; border: 3px solid #555; text-align: center; background: #A9A9A9;border-radius: 10px;">Top Events</h1>*/
		  	</style>



		  	
		  		

		  				<?php 

		  				
		  			$db=new PDO("mysql:host=localhost;dbname=eveandgo","root","root");

					if(isset($_SESSION['C_I']) && !empty($_SESSION['C_I'])){

						echo '<figure>
							  		<span class="trs next"><img src="../MVC/vue/images/right.png" style="width:50px;height:50px;"/></span>
							  		<span class="trs prev"><img src="../MVC/vue/images/left.png" style="width:50px;height:50px;"/></span>
												<div id="slider">';
						
						$rep=$db->query('SELECT ID_Eve,categories_ID_categorie FROM evenement  WHERE ID_Eve in (
			     												SELECT ID_Eve 
			     												FROM evenement e 
			     												where e.categories_ID_categorie in (
			                                                        							SELECT ID_categorie 
			                                                        							FROM categories c 
			                                                      								where c.Nom="'.$_SESSION['C_I'].'"))')->fetchAll(PDO::FETCH_ASSOC);
											//print_r($rep) ;
											 $ideve= array(); 
											 $idcat= array();
											foreach($rep as $rep => $val1){
												//echo 'debut N°'.$rep.'';
												foreach ($val1 as $cle2=>$val2){
													if($cle2=='ID_Eve')$tabideve[$rep]=$val2;
												 	elseif($cle2=='categories_ID_categorie')$idcat[$rep]=$val2;
												 	
													}
											}
					                          
					                        $nom_img = array();
					                        $images = array();
											$t=0;			
											while($t<count($tabideve))
											{
																
																$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,est_illustre e_i,images i where e_i.evenement_ID_Eve="'.intval($tabideve[$t]).'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
																
																foreach($img as $img => $val1){foreach ($val1 as $cle2=>$val2){$nom_img[$img][$cle2]=$val2;}}
											                    
											                    $sous_cat=$db->query('SELECT DISTINCT Sous_categorie FROM evenement e, categories c WHERE c.ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
											                            foreach($sous_cat as $sous_cat => $val1){foreach ($val1 as $cle2=>$val2){$s_c[$sous_cat][$cle2]=$val2;}}



											                    $lieu=$db->query('SELECT * FROM lieu l,evenement e where l.evenement_ID_Eve="'.intval($tabideve[$t]).'" and e.categories_ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
											                        foreach($lieu as $lieu => $val1){foreach ($val1 as $cle2=>$val2){$l[$lieu][$cle2]=$val2;}} 

																$n_img=isset($nom_img[0]['Nom_image'])?$nom_img[0]['Nom_image']:'img_concert_1.jpg';
																
																
																echo '<a href="#" class="trs"><img src="../MVC/Vue/images/imageEve/'.$n_img.'" alt= "'.$l[0]['Titre'].'<br>'.$s_c[0]['Sous_categorie'].'" style="width:900px;height:500px;"></a>';			
																$images[$t] =$n_img;
																	



																	
					        				$t++;}
					        				
											
											echo '</div>
											<figcaption>
											</figcaption>
								  	</figure>';
								  										$k=0;				
																			print('<div id="navcnt">
																				<table style="border-collapse:collapse;text-align:left;margin:30px auto 30px" id="nav">
																					<tbody>
																						<tr>');
																								while($k<count($tabideve)){
																									print('
																											<td>
																												<a href="../MVC/index.php?cible=Voirplus&id_eve='.$tabideve[$k].'">
																												<img src="../MVC/Vue/images/imageEve/'.$images[$k].'" style="width:50px;height:50px;"><p style="margin-bottom:2px;float:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($k+1).'</p>
																												</a>
																											</td>
																									');
																									$k++;}
																			print('

																					</tr>
																				</tbody>
																			</table>
																			</div>');


		  			}else {
									echo '<figure>
												  		<span class="trs next"><img src="../MVC/vue/images/right.png" style="width:50px;height:50px;"/></span>
												  		<span class="trs prev"><img src="../MVC/vue/images/left.png" style="width:50px;height:50px;"/></span>
															<div id="slider">';

											$reponse=$db->query('SELECT distinct Nom FROM categories');
						                    $categories=$reponse->fetchAll(PDO::FETCH_ASSOC);
						                    $ligne= array();
						                   
						                    $cat=array();
						                    foreach($categories as $categories => $valeur1){ 
						                        //echo "ligne n°:" . $categories . "<br />";
						                            foreach ($valeur1 as $cle2=>$valeur2){
						                             // echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
						                              $ligne[$categories][$cle2]=$valeur2;
						                            }
						                           
						                        }
						                        $x=0;
						                        $i=0;
						                    			$images = array();
														$tabideve2= array(); 
														while($x<7)
														{
																
																	$rep=$db->query('SELECT ID_Eve,categories_ID_categorie FROM evenement  WHERE ID_Eve in (
									     												SELECT ID_Eve 
									     												FROM evenement e 
									     												where e.categories_ID_categorie in (
									                                                        							SELECT ID_categorie 
									                                                        							FROM categories c 
									                                                      								where c.Nom="'.$ligne[$x]['Nom'].'"))')->fetchAll(PDO::FETCH_ASSOC);
																	
																	 $tabideve= array(); 
																	 $idcat= array();
																	foreach($rep as $rep => $val1){
																		//echo 'debut N°'.$rep.'';
																		foreach ($val1 as $cle2=>$val2){
																			if($cle2=="ID_Eve")$tabideve[$rep]=$val2;
																		 	elseif($cle2=="categories_ID_categorie")$idcat[$rep]=$val2;
																		 	//print('<br><br>cle:'.$cle2.',valeur:'.$val2.' <br>');
																		 	
																			}//echo 'fin '.$rep.'<br>';
																		}
											                           
											                         $nom_img = array();
											                         
																	$t=0;			
																	while($t<count($tabideve))
																	{
																						
																						$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,est_illustre e_i,images i where e_i.evenement_ID_Eve="'.intval($tabideve[$t]).'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
																						
																						foreach($img as $img => $val1){foreach ($val1 as $cle2=>$val2){$nom_img[$img][$cle2]=$val2;}}
																	                    
																	                    $sous_cat=$db->query('SELECT DISTINCT Sous_categorie FROM evenement e, categories c WHERE c.ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
																	                            foreach($sous_cat as $sous_cat => $val1){foreach ($val1 as $cle2=>$val2){$s_c[$sous_cat][$cle2]=$val2;}}



																	                    $lieu=$db->query('SELECT * FROM lieu l,evenement e where l.evenement_ID_Eve="'.intval($tabideve[$t]).'" and e.categories_ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
																	                        foreach($lieu as $lieu => $val1){foreach ($val1 as $cle2=>$val2){$l[$lieu][$cle2]=$val2;}} 

																						$n_img=isset($nom_img[0]['Nom_image'])?$nom_img[0]['Nom_image']:'img_concert_1.jpg';
																						
																						
																						echo '<a href="#" class="trs"><img src="../MVC/Vue/images/imageEve/'.$n_img.'" alt= "'.$l[0]['Titre'].'<br>'.$s_c[0]['Sous_categorie'].'" style="width:900px;height:500px;"></a>';
																							$images[$t] =$n_img;
																							$tabideve2[$t]=$tabideve[$t];
																	
																		
											        				$t++;}
											        				
															$x++;} 
															echo '</div>
															<figcaption></figcaption></figure>';


															$k=0;				
																			print('<div id="navcnt">
																				<table style="border-collapse:collapse;text-align:left;margin:30px auto 30px" id="nav">
																					<tbody>
																						<tr>');
																								while($k<count($tabideve2)){
																									print('
																											<td>
																												<a href="../MVC/index.php?cible=Voirplus&id_eve='.$tabideve2[$k].'">
																												<img src="../MVC/Vue/images/imageEve/'.$images[$k].'" style="width:50px;height:50px;"><p style="margin-bottom:2px;float:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($k+1).'</p>
																												</a>
																											</td>
																									');
																									$k++;}
																			print('

																					</tr>
																				</tbody>
																			</table>
																			</div>');
		  						}


		  				?>

		<script type="text/javascript">
		  		function setaImagem(){
		  			var settings = {
		  				primeiraImg: function(){
		  					elemento = document.querySelector("#slider a:first-child");
		  					elemento.classList.add("ativo");
		  					this.legenda(elemento);
		  				},
		  				slide: function(){
		  					elemento = document.querySelector(".ativo");
		  					if(elemento.nextElementSibling){
		  						elemento.nextElementSibling.classList.add("ativo");
		  						settings.legenda(elemento.nextElementSibling);
		  						elemento.classList.remove("ativo");
		  					}else{
		  						elemento.classList.remove("ativo");
		  						settings.primeiraImg();
		  					}
		  				},
		  				proximo: function(){
		  					clearInterval(intervalo);
		  					elemento = document.querySelector(".ativo");
					
		  					if(elemento.nextElementSibling){
		  						elemento.nextElementSibling.classList.add("ativo");
		  						settings.legenda(elemento.nextElementSibling);
		  						elemento.classList.remove("ativo");
		  					}else{
		  						elemento.classList.remove("ativo");
		  						settings.primeiraImg();
		  					}
		  					intervalo = setInterval(settings.slide,4000);
		  				},
		  				anterior: function(){
		  					clearInterval(intervalo);
		  					elemento = document.querySelector(".ativo");
					
		  					if(elemento.previousElementSibling){
		  						elemento.previousElementSibling.classList.add("ativo");
		  						settings.legenda(elemento.previousElementSibling);
		  						elemento.classList.remove("ativo");
		  					}else{
		  						elemento.classList.remove("ativo");						
		  						elemento = document.querySelector("a:last-child");
		  						elemento.classList.add("ativo");
		  						this.legenda(elemento);
		  					}
		  					intervalo = setInterval(settings.slide,4000);
		  				},
		  				legenda: function(obj){
		  					var legenda = obj.querySelector("img").getAttribute("alt");
		  					document.querySelector("figcaption").innerHTML = legenda;
		  				}
		  			}
		  			//chama o slide
		  			settings.primeiraImg();
		  			//chama a legenda
		  			settings.legenda(elemento);
		  			//chama o slide à um determinado tempo
		  			var intervalo = setInterval(settings.slide,4000);
		  			document.querySelector(".next").addEventListener("click",settings.proximo,false);
		  			document.querySelector(".prev").addEventListener("click",settings.anterior,false);
		  		}
		  		window.addEventListener("load",setaImagem,false);
		  	</script>
            <?php
		$H_eader = ob_get_clean();
		return $H_eader;							
}
function footer(){
         ob_start();
         ?> 
		
	
		<a href="../MVC/Vue/vue/Vue_footer/footer/qui_sommes_nous.php">Qui sommes-nous ?</a>
		<a href="../MVC/Vue/vue/Vue_footer/footer/mentions_legales.php">Mentions legales</a>
		<a href="../MVC/Vue/vue/Vue_footer/footer/forum.php">Forum</a>
		<a href="../MVC/Vue/vue/Vue_footer/footer/faq.php">Aide en ligne</a>
		<a href="../MVC/Vue/vue/Vue_footer/footer/contact.php">Contact</a>
		<a href="../MVC/index.php?cible=Admin">Back-office</a>
		<br /><br />
		
		<a href="#">Suivez Eve&Go sur </a>: <a href="http://www.facebook.com"><img src="../MVC/Vue/images/facebook.jpg" alt="Facebook" /></a>
		<a href="http://www.twitter.com"><img src="../MVC/Vue/images/Twitter.jpg" alt="Twitter" /></a>
		<a href="http://plus.google.com"><img src="../MVC/Vue/images/Google.jpg" alt="Google+" style="heigt:40;width:40px;"/></a>


		<?php
		$footer=ob_get_clean();
		return $footer;
}
function Abas_dynamique(){
         ob_start();
         ?>

<style>
#menuD #recherche > a:hover, #menuD #recherche2:hover > a{
	background:rgba(0,0,0,0) !important;
}


#menuD, #menuD ul, #menuD ul li, #menuD ul li a{
	margin:0;
	padding:0;
	border:0;
	list-style:none;
	line-height:1;
	display:block;
	position:relative;
	-webkit-box-sizing:border-box; /* Modifie modÃ¨le de boÃ®te */
	-moz-box-sizing:border-box;
	box-sizing:border-box;

}

#menuD:after,#menuD > ul:after {
	content:".";
	display:block;
	clear:both;
	line-height:0;
	height:0;
}


#menuD {
	-moz-border-radius:5px;
	-o-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	border-radius:5px;
	border:1px solid #721B1B;
	background: #CA2F2F;
	background:-webkit-linear-gradient(bottom, #841F1F, #CA2F2F);
	background:-ms-linear-gradient(bottom, #841F1F, #CA2F2F);
	background:-moz-linear-gradient(bottom, #841F1F, #CA2F2F);
	background:-o-linear-gradient(bottom, #841F1F, #CA2F2F);
	background:linear-gradient(to top, #841F1F, #CA2F2F);
	box-shadow:0 1px 1px rgba(0, 0, 0, 0.15), inset 0 -2px 0px black;
	max-width: 996px;
	position: relative;
	margin: 650px auto 0%;
	margin-bottom:0%;
	margin-top :5px;
	
}
#menuD > ul > li {
	float:left;
	text-transform: uppercase;
}

#menuD > ul > li > a{
	padding:15px 20px 15px 20px;
	font-size:18px;
	text-decoration:none !important;
	color:#fcfefb;
	-webkit-transition:all .2s ease;
	-moz-transition:all .2s ease;
	-ms-transition:all .2s ease;
	-o-transition:all .2s ease;
	transition:all .2s ease;
	text-shadow: 0.2em 0.2em 0.20em blue;
    color: white;
	
	
}

#menuD > ul > li:first-child > a {
	-moz-border-radius-topleft:5px;
	-webkit-border-top-left-radius:5px;
	border-top-left-radius:5px;
	-moz-border-radius-bottomleft:5px;
	-webkit-border-bottom-left-radius:5px;
	border-bottom-left-radius:5px;
}
#menuD > ul > li:hover > a{

	color:white;
}
#menuD > ul > li:hover > a, #menuD > ul > li > a:hover {
	background:rgba(255,255,255,0.1);
}
	
	
#menuD > ul > li:before { /* barre de sÃ©paration */
	content:'';
	position:absolute;
	top:2px;
	right:-1px;
	display:block;
	height:45px;
	width:3px;
	opacity:.35;
	background-color:white;
}


#menuD > ul > li:last-child:after,
#menuD > ul > li:last-child:before {
	display:none;
}
.contenue{
	
	padding:auto;
	font-size:15px;
	text-decoration:none !important;
	border-radius:5px;
	
	border:1px solid #721B1B;
	/*background:;*/
	//background: rgba(255, 0, 0, 0.76); 
	background-image:url('images/AjoutEve.png');	
	background-color:#464646;	
}
body header .conteudo{
 	text-align: left;border: 1px solid#999; 
	background-color: red;
    background: none;
    color: red;

    border:none;
 	position: auto;
    top: 5px;
    left: 25%;
	right:25%;
    width:936px;
    height:auto;
   
 }
/*.contenue:not(#FESTIVAL) {
 display:none;
}*/
</style>
<?php 



					/******************Analyse des requete par ordre d'execution************************************************************************************/

					/*
						SELECT DISTINCT * FROM evenement  WHERE ID_Eve in (
     												SELECT ID_Eve 
     												FROM evenement e 
     												where e.categories_ID_categorie in (
                                                        							SELECT ID_categorie 
                                                        							FROM categories c 
                                                        							where c.Nom="Concert"))

					*/
						/*
						SELECT DISTINCT Nom_image FROM evenement e,est_illustre e_i,images i where e_i.evenement_ID_Eve="ID_Eve" and e_i.images_Id_image=i.Id_image
						*/

						/*
							SELECT DISTINCT Sous_categorie FROM evenement e, categories c WHERE c.ID_categorie="categories_ID_categorie"
						*/

						/*
							SELECT * FROM lieu l,evenement e where l.evenement_ID_Eve="ID_Eve" and e.categories_ID_categorie="categories_ID_categorie"
						*/

					/*********************************************************************************************************************************************/
					$db=new PDO("mysql:host=localhost;dbname=eveandgo","root","root");
					$reponse=$db->query('SELECT distinct Nom FROM categories');
                    $categories=$reponse->fetchAll(PDO::FETCH_ASSOC);
                    $ligne= array();
                    $taille=0;
                    $cat=array();
                    $Nb=$db->query('SELECT distinct count(Nom) FROM categories');
                    $nbr=$Nb->fetch();
                    foreach($categories as $categories => $valeur1){ 
                        //echo "ligne n°:" . $categories . "<br />";
                            foreach ($valeur1 as $cle2=>$valeur2){
                             // echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                              $ligne[$categories][$cle2]=$valeur2;
                            }
                            $taille++;
                        }
                        $x=0;
                        $i=0;
                    echo '<div id="menuD">';
					echo '<ul class="menu">';
					while($i<=7){ if(isset($ligne[$i]['Nom']))print('<li><a  href="#aba'.$i.'" >'.$ligne[$i]['Nom'].'</a></li>');
								  else break;
								$i++;}
					echo '</ul>';
					echo '</div>';
								
								
								while($x<7)
								{	
										print('
										<div class="conteudo" id="aba'.$x.'"><br><center><span> TOP '.$ligne[$x]['Nom'].'</span></center><br>
									
										<div id="content">
										<div id="works">');
											$rep=$db->query('SELECT ID_Eve,categories_ID_categorie FROM evenement  WHERE ID_Eve in (
			     												SELECT ID_Eve 
			     												FROM evenement e 
			     												where e.categories_ID_categorie in (
			                                                        							SELECT ID_categorie 
			                                                        							FROM categories c 
			                                       	               								where c.Nom="'.$ligne[$x]['Nom'].'"))')->fetchAll(PDO::FETCH_ASSOC);
											

											 $ideve= array(); 
											 $idcat= array();
											foreach($rep as $rep => $val1){
												//echo 'debut N°'.$rep.'';
												foreach ($val1 as $cle2=>$val2){
													if($cle2=="ID_Eve")$ideve[$rep]=$val2;
												 	elseif($cle2=="categories_ID_categorie")$idcat[$rep]=$val2;
												 	//print('<br><br>cle:'.$cle2.',valeur:'.$val2.' <br>');
												 	
													}//echo 'fin '.$rep.'<br>';
												}
					                           
					                         $nom_img = array( );
											$t=0;			
											while($t<count($ideve))
											{
																
																$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,est_illustre e_i,images i where e_i.evenement_ID_Eve="'.intval($ideve[$t]).'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
																
																foreach($img as $img => $val1){foreach ($val1 as $cle2=>$val2){$nom_img[$img][$cle2]=$val2;}}
											                    
											                    $sous_cat=$db->query('SELECT DISTINCT Sous_categorie FROM evenement e, categories c WHERE c.ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
											                            foreach($sous_cat as $sous_cat => $val1){foreach ($val1 as $cle2=>$val2){$s_c[$sous_cat][$cle2]=$val2;}}



											                    $lieu=$db->query('SELECT * FROM lieu l,evenement e where l.evenement_ID_Eve="'.intval($ideve[$t]).'" and e.categories_ID_categorie="'.intval($idcat[$t]).'"')->fetchAll(PDO::FETCH_ASSOC);
											                        foreach($lieu as $lieu => $val1){foreach ($val1 as $cle2=>$val2){$l[$lieu][$cle2]=$val2;}} 

																$n_img=isset($nom_img[0]['Nom_image'])?$nom_img[0]['Nom_image']:'img_concert_1.jpg';
																//echo '<p>'.$nom_img[0]['Nom_image'].'</p>';
																print('
																<a id="example1" href="../MVC/index.php?cible=Voirplus&id_eve='.intval($ideve[$t]).'"><div class="work" style="margin-right:0px">
																	<img src="../MVC/Vue/images/imageEve/'.$n_img.' "/>
														            <div class="triangle-gauche"></div><!-- .triangle-gauche -->
														            <div class="triangle-droite"></div><!-- .triangle-droite -->

																	
														            <span class="info">'.$l[0]['Titre'].'<br />'.$l[0]['Type_de_Public'].'<br />'.$l[0]['Ville'].'<br />'.$s_c[0]['Sous_categorie'].'<br />'.$l[0]['Adresse'].'<br /></span>
														        	
														            </div><!-- .work -->
									        					</a>');
					        				$t++;}
					        				print('	
					        					</div><!-- #works -->
					        					</div><!-- #content -->


											</div>');
									$x++;}
										

						
?>




        <?php
		$Abas_dynamique=ob_get_clean();
		return $Abas_dynamique;														
}
function inscription($ch_diff){
        ob_start();
		?>
	

			<?php require('../MVC/Vue/vue/inscription_check.php'); ?>
			 			
					<script  type="text/javascript">
								
					email1=document.getElementById('e_mail1').value;
					email2=document.getElementById('e_mail2').value;
					pseudo=document.getElementById('pseudo').value;
					nom=document.getElementById('nom').value;
					prenom=document.getElementById('prenom').value;
			
			function verifMail1(champ)

			{

			   var regex1 = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

			   if(!regex1.test(champ.value) || email1.value== "")

			   {

					champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else

			   {

				champ.style.backgroundColor = "#80ffaa";

				return true;

			   }

			}
			
			function verifMail2(champ)

			{

			   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

			   if(!regex.test(champ.value) || email2.value=="" || email1.value != email2.value)

			   {

				  champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else

			   {

				champ.style.backgroundColor = "#80ffaa";

				return true;

			   }

			}
			
			function verifnom(champ)
			{
				var regex2 = /^[a-zA-Z \-]*$/;
				
				if(!regex2.test(champ.value) || nom.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";

					return true;
				}
			}
			
			
			function verifprenom(champ)
			{
				var regex3 = /^[a-zA-Z \-]*$/;
				
				if(!regex3.test(champ.value) || prenom.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}

			function verifadresse1(champ)
			{
				var regex4 = /^[a-zA-Z0-9 \-\,\.\/]*$/;
				
				if(!regex4.test(champ.value) || adresse1.value == "" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifadresse2(champ)
			{
				var regex5 = /^[a-zA-Z0-9 \-\,\.\/]*$/;
				
				if(!regex5.test(champ.value))
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifpseudo(champ)
			{
				if(pseudo.value == "")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			});

			function verifdate(champ)

			{

			   var regex6 = /^((([0-0]{1})([1-9]{1}))|(([1-2]{1})([0-9]{1}))|(([3-3]{1})([0-1]{1})))\/(([0-0]{1}[1-9]{1})|([1-1]{1}[0-2]{1}))\/((([1]{1})([9]{1})([0-9]{2}))|(([2]{1})([0-9]{3})))$/;

			   if(!regex6.test(champ.value) )

			   {

				  champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else
			   {
				   	champ.style.backgroundColor = "#80ffaa";
					return true;
			   }
			}
			
			function verifville(champ)
			{
				var regex7 = /^[a-zA-Z \-\/]*$/;
				
				if(!regex7.test(champ.value) || ville.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifpwd1(champ)
			{
				if(password1.value == "")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
			
			function verifpwd2(champ)
			{
				if(pasword2.value == "" || password1.value != pasword2.value)
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
			}
			
			function verifregion(champ)
			{
				if(region.value == "none")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
</script>


<?php 
	
					if(!isset($_SESSION['LOGIN'])) {echo '<form method="post" action="../MVC/index.php?cible=Inscription"  enctype="multipart/form-data">';}
					
					elseif(isset($_SESSION['LOGIN'])){
						print('

							<style>
								.body{
									
									
									margin-top: 50px;
									
								}#compte_v:not(#Deconnect> a:nth-child(5) > input:nth-child(1)){
									display: block;
									float: left;
									padding-right: 0px;
									width: 120px;
								}
								#Deconnect > a:nth-child(5) > input:nth-child(1):not(.compte){
									
									
									width: 80px;
								}
							</style>

							');

						

						require("../MVC/Modele/connexion_db.php");
						$user=(isset($_GET['change_this']) and $_GET['change_this']=="ok")?$_GET['utilisateur']:$_SESSION['LOGIN'];
						$reponse=$db->query('SELECT * FROM membre where Login="'.$user.'"');
 						
 						$update=$reponse->fetchAll(PDO::FETCH_ASSOC);
 						foreach($update as $update => $valeur1){ 
                                                 
                                foreach ($valeur1 as $cle2=>$valeur2){
                                                       
                                        $updatetb[$update][$cle2]=$valeur2;
                                }
                        }
                        echo '<form method="post" action="../MVC/ModificationEve.php?profilupdate='.$user.'"  enctype="multipart/form-data">';
					}
					
?>
			<div class="body">

				<div class="inscription">
				
					<h1 class='h1'><?php echo isset($_SESSION['LOGIN'])?'MODIFICATION DU PROFIL':'INSCRIPTION'; ?></h1>
					
				</div>
				
				<div class="bloc1">
				
					<div class="photo_profil">
					
						<p>
						<?php echo isset($updatetb[0]['Photo_profil'])?'<img src="../MVC/Vue/images/imageProfil/'.$updatetb[0]['Photo_profil'].'"  height=200px; width=200px;>':
						'<img id="photo" src= "sorcier.png" sytle="height=200px; width=200px;" alt="photo de profil" title="photo de profil"/></p>';
						?><input type="hidden" name="MAX_FILE_SIZE" value="300000" />
						<p><input id="ajouter" name='photoprofil' type="file" value="Ajouter photo" /></p>
						
						
					</div>
				
					<div class="bloc2">
					
						<div class="nom_sexe">
								 
							<p>Nom* : <span class="error"><?php echo $firstnameErr;?><?php echo $firstnameErr2;?></span></br><input id="nom" type="text" name="nom" size="35" maxlength="35" value= "<?php if (isset($_POST['nom'])){echo $_POST['nom'];}else{if(isset($updatetb[0]['Nom'])){echo $updatetb[0]['Nom'];}} ?>" onblur="verifnom(this)"" "/></p>
		
							<p>Prénom* : <span class="error"><?php echo $nameErr;?><?php echo $nameErr2;?></span></br><input id="prenom" type="text" onblur="verifprenom(this)" onkeyup="verifprenom(this)" name="prenom" size="35" maxlength="35" value= "<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} else{if(isset($updatetb[0]['Prenom'])){echo $updatetb[0]['Prenom'];}}?>"/></p>
							<p>Date de naissance*(JJ/MM/AAAA): <span class="error"><?php echo $Date_naissance_Err;?><?php echo $Date_naissance_Err2;?></span></br><input id="birthday" type="date" placeholder="Ex:17/07/1994" onkeyup="verifdate(this)" onblur="verifdate(this)" name="Date_naissance" size="12" maxlength="10" value= "<?php if (isset($_POST['Date_naissance'])){echo $_POST['Date_naissance'];} else{if(isset($updatetb[0]['Date_naissance'])){echo formattageFr($updatetb[0]['Date_naissance']);}}?>"/></p>
							<p>Sexe* : <span class="error"><?php echo $sexeErr;?></span></br></p>
							
							
							<div id="sexe">
							
								
								<ul style="list-style-type: none;">
								<li id="sexem"><input id="m" type="radio" name="sexe" value="H"/> Masculin</li>
								<li id="sexef"><input id="f" type="radio" name="sexe" value="F"/> Féminin</li>
								</ul>						
								
								
							</div>
						</div>
					
						<div class="coordonnees">
						
							<p>Centres d'intérêts :<br><select name="centre_interets">
								<option value="">Aucun</option>
								<?php 
									require("../MVC/Modele/connexion_db.php");
									$reponse=$db->query('SELECT distinct Nom FROM categories');
				                    $categories=$reponse->fetchAll(PDO::FETCH_ASSOC);
				                    $ligne= array();
				                    
				                    $i=0;
				                    foreach($categories as $categories => $valeur1){ 
				                        //echo "ligne n°:" . $categories . "<br />";
				                            foreach ($valeur1 as $cle2=>$valeur2){
				                             // echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
				                              $ligne[$categories][$cle2]=$valeur2;
				                            }
				                           
				                        }
				                 while($i<=7){ if(isset($ligne[$i]['Nom']))print('<option value="'.$ligne[$i]['Nom'].'">'.$ligne[$i]['Nom'].'</option>');
								  else break;
								$i++;}

								?>

								?>


								
								
							</select></p>
							<p>Adresse 1* : <span class="error"><?php echo $adresse1Err;?><?php echo $adresse1Err2;?></span></br><input id="adresse1" type="text" name="adresse1" size="120" onkeyup="verifadresse1(this)" onblur="verifadresse1(this)" maxlength="120"  value= "<?php if (isset($_POST['adresse1'])){echo $_POST['adresse1'];} else{if(isset($updatetb[0]['Adresse'])){echo $updatetb[0]['Adresse'];}}?>" /></p>
							<p>Adresse 2 : <span class="error"><?php echo $adresse2Err;?><?php echo $adresse2Err2;?></span></br><input id="adresse2" type="text" name="adresse2" size="120" maxlength="120"  onkeyup="verifadresse1(this)" onblur="verifadresse1(this)" value= "<?php if (isset($_POST['adresse2'])){echo $_POST['adresse2'];} else{if(isset($updatetb[0]['Adresse'])){echo $updatetb[0]['Adresse'];}}?>"/></p>							
							<p>Ville* : <span class="error"><?php echo $villeErr;?></span></br><input id="ville" type="text" name="ville" size="50" maxlength="40"  onkeyup="verifville(this)" onblur="verifville(this)" value= "<?php if (isset($_POST['ville'])){echo $_POST['ville'];} else{if(isset($updatetb[0]['Ville'])){echo $updatetb[0]['Ville'];}}?>"/></p>
							<p>Région* : <span class="error"><?php echo $regionErr;?></span></br>
							
							
							<select  id="region" name="region" >
							<option name="none" value="none"></option>
							<option name="01-Alsace-Champagne-Ardenne-Lorraine" value='01' >Alsace-Champagne-Ardenne-Lorraine</option>
							<option name="02-Aquitaine-Limousin-Poitou-Charentes" value='02'>Aquitaine-Limousin-Poitou-Charentes</option>
							<option name="03-Auvergne-Rhône-Alpes" value='03'>Auvergne-Rhône-Alpes</option>
							<option name="04-Bourgogne-Franche-Comté" value='04'>Bourgogne-Franche-Comté</option>
							<option name="05-Bretagne" value='05'>Bretagne</option>
							<option name="06-Centre-Val de Loire" value='06'>Centre-Val de Loire</option>
							<option name="07-Corse" value='07'>Corse</option>
							<option name="08-Île-de-France" value='08'>Île-de-France</option>
							<option name="09-Languedoc-Roussillon-Midi-Pyrénées" value='09'>Languedoc-Roussillon-Midi-Pyrénées</option>
							<option name="10-Nord-Pas-de-Calais-Picardie" value='10'>Nord-Pas-de-Calais-Picardie</option>
							<option name="11-Normandie" value='11'>Normandie</option>
							<option name="12-Pays de la Loire" value='12'>Pays de la Loire</option>
							<option name="13-Provence-Alpes-Côte d'Azur" value='13'>Provence-Alpes-Côte d'Azur</option>

							</select>
							</p>
							
							
						</div>
					
						</br>
						
						
						<div class="compte" id="compte_v">
						
							
							<p>Saisir une adresse électronique* : <span class="error"><?php echo $e_mail1Err;?><?php echo $e_mail1Err2;?></span></br><input id="email1" type="text" name="e_mail1" size="70" maxlength="70" onkeyup="verifMail1(this)" onblur="verifMail1(this)" placeholder="Ex: eve_and_go@gmail.com" value= "<?php if (isset($_POST['e_mail1'])){echo $_POST['e_mail1'];} else{if(isset($updatetb[0]['E_mail'])){echo $updatetb[0]['E_mail'];}}?>"/></br></p>
							<p>Confirmer l'adresse électronique* : <span class="error"><?php echo $e_mail2Err;?><?php echo $e_mail2Err2;?><?php echo $e_mail_check;?></span></br><input id="email2" type="text" name="e_mail2" onkeyup="verifMail2(this)" onblur="verifMail2(this)" size="70" maxlength="70" placeholder="Ex: eve_and_go@gmail.com" value= "<?php if (isset($_POST['e_mail2'])){echo $_POST['e_mail2'];} else{if(isset($updatetb[0]['E_mail'])){echo $updatetb[0]['E_mail'];}}?>"/></br></p>
							<p>Saisir un pseudo* : <span class="error"><?php echo $loginErr;?><?php echo $loginVErr;?></span></br><input id="pseudo"type="text" onkeyup="verifpseudo(this)" onblur="verifpseudo(this)" name="Login" size="30" maxlength="30" value= "<?php if (isset($_POST['Login'])){echo $_POST['Login'];} else{if(isset($updatetb[0]['Login'])){echo $updatetb[0]['Login'];}}?>"/></p>
							<p>Saisir un mot de passe* : <span class="error"><?php echo $password1Err;?></span></br><input id="pdw1"type="password" name="password1" size="30" onkeyup="verifpwd1(this)" onblur="verifpwd1(this)" maxlength="20" value="<?php if(isset($updatetb[0]['Mot_de_passe'])){echo $updatetb[0]['Mot_de_passe'];}?>"/></p>
							<p>Confirmer le mot de passe* : <span class="error"><?php echo $password2Err;?><?php echo $password_check;?></span></br><input id="pdw2"type="password" onkeyup="verifpwd1(this)" onblur="verifpwd1(this)" name="password2" size="30" maxlength="20" value="<?php if(isset($updatetb[0]['Mot_de_passe'])){echo $updatetb[0]['Mot_de_passe'];}?>"/></p>
							
						</div>	
					
					</div>	

						<div class="confirmation" >
							<input type="hidden" name="Type" value="0"/>
							
							<p><input type="checkbox" name="confirmation" value="checked" checked="checked"/>J'accepte les conditions d'utilisations *</p> 
							
					
						</div> 
					
						<div>
				
							<p><input id="sinscrire"  type="submit" value="S'inscrire" /></p>
									
					
				
						</div>
				

					</div>

			</div>
			</form>
	<?php
		$inscription = ob_get_clean();
		return $inscription;																
}
function evenements($evenement,$date,$sous_categorie,$verif){
        ob_start();
		?>	
			
			<?php
					$db=new PDO("mysql:host=localhost;dbname=eveandgo","root","root");
					$reponse=$db->query('SELECT distinct Nom FROM categories');
                    $categories=$reponse->fetchAll(PDO::FETCH_ASSOC);
                    $ligne[][] = array();
                    $taille=0;
                     $cat=array();

                    foreach($categories as $categories => $valeur1){ 
                        //echo "ligne n°:" . $categories . "<br />";
                            foreach ($valeur1 as $cle2=>$valeur2){
                             // echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                              $ligne[$categories][$cle2]=$valeur2;
                            }
                            $taille++;
                    }   
                    $i=0;          
                    echo '<div class="article_evenement"><h1>Liste des évènements</h1>';
                    echo '<nav id="Type"><form method = "POST" action="../MVC/index.php?cible=evenement1"><ul>';
                    while($i<=6){
                    	print('
									   
									   <li><a href="#">'.strtoupper($ligne[$i]['Nom']).'</a>
											<ul>');
												$reponse2=$db->query('SELECT distinct Sous_categorie FROM categories WHERE categories.Nom="'.strtoupper($ligne[$i]['Nom']).'"')->fetchAll(PDO::FETCH_ASSOC);
												if(count($reponse2)>1){
													$x=0;
															while($x<count($reponse2)){

															echo '<li><input type="radio" name="sous_categorie" value="'.$reponse2[$x]['Sous_categorie'].'">'.strtoupper($reponse2[$x]['Sous_categorie']).'</li>';
															$x++;
														}$i++;
													}elseif(count($reponse2)==1){
														
														echo '<li><input type="radio" name="sous_categorie" value="'.$reponse2[0]['Sous_categorie'].'">'.strtoupper($reponse2[0]['Sous_categorie']).'</li>';
														
														$i++;
													}
												
												print('<li><input type="radio" name="sous_categorie" value="Autres">Autres</li>
												<input type="submit" value="Chercher">
											</ul>
										</li>');	
						
					}
					echo '</ul></form></nav></div>';
?>
			<form id = "form_2" method="POST" action="../MVC/index.php?cible=evenement2">
					<h2>Filtres</h2></br> 
					<hr>
						
					<div id = "filtre">
						<div id = "calendrier">
							</br><input type="date" id="date" name="date" class="date">
						</div>
						
						<div id = "machin_a_aligner">						
						<select  id="departement" name ="departement" >
							<option value="">-- Sélectionner --</option>
							<option value="01">01 Ain</option>
							<option value="02">02 Aisne</option>
							<option value="03">03 Allier</option>
							<option value="04">04 Alpes de Haute Provence</option>
							<option value="05">05 Hautes Alpes</option>
							<option value="06">06 Alpes Maritimes</option>
							<option value="07">07 Ardèche</option>
							<option value="08">08 Ardennes</option>
							<option value="09">09 Ariège</option>
							<option value="10">10 Aube</option>
							<option value="11">11 Aude</option>
							<option value="12">12 Aveyron</option>
							<option value="13">13 Bouches du Rhône</option>
							<option value="14">14 Calvados</option>
							<option value="15">15 Cantal</option>
							<option value="16">16 Charente</option>
							<option value="17">17 Charente Maritime</option>
							<option value="18">18 Cher</option>
							<option value="19">19 Corrèze</option>
							<option value="2A">2A Corse du Sud</option>
							<option value="2B">2B Haute-Corse</option>
							<option value="21">21 Côte d'Or</option>
							<option value="22">22 Côtes d'Armor</option>
							<option value="23">23 Creuse</option>
							<option value="24">24 Dordogne</option>
							<option value="25">25 Doubs</option>
							<option value="26">26 Drôme</option>
							<option value="27">27 Eure</option>
							<option value="28">28 Eure et Loir</option>
							<option value="29">29 Finistère</option>
							<option value="30">30 Gard</option>
							<option value="31">31 Haute Garonne</option>
							<option value="32">32 Gers</option>
							<option value="33">33 Gironde</option>
							<option value="34">34 Hérault</option>
							<option value="35">35 Ille et Vilaine</option>
							<option value="36">36 Indre</option>
							<option value="37">37 Indre et Loire</option>
							<option value="38">38 Isère</option>
							<option value="39">39 Jura</option>
							<option value="40">40 Landes</option>
							<option value="41">41 Loir et Cher</option>
							<option value="42">42 Loire</option>
							<option value="43">43 Haute Loire</option>
							<option value="44">44 Loire Atlantique</option>
							<option value="45">45 Loiret</option>
							<option value="46">46 Lot</option>
							<option value="47">47 Lot et Garonne</option>
							<option value="48">48 Lozère</option>
							<option value="49">49 Maine et Loire</option>
							<option value="50">50 Manche</option>
							<option value="51">51 Marne</option>
							<option value="52">52 Haute Marne</option>
							<option value="53">53 Mayenne</option>
							<option value="54">54 Meurthe et Moselle</option>
							<option value="55">55 Meuse</option>
							<option value="56">56 Morbihan</option>
							<option value="57">57 Moselle</option>
							<option value="58">58 Nièvre</option>
							<option value="59">59 Nord</option>
							<option value="60">60 Oise</option>
							<option value="61">61 Orne</option>
							<option value="62">62 Pas de Calais</option>
							<option value="63">63 Puy de Dôme</option>
							<option value="64">64 Pyrénées Atlantiques</option>
							<option value="65">65 Hautes Pyrénées</option>
							<option value="66">66 Pyrénées Orientales</option>
							<option value="67">67 Bas Rhin</option>
							<option value="68">68 Haut Rhin</option>
							<option value="69">69 Rhône</option>
							<option value="70">70 Haute Saône</option>
							<option value="71">71 Saône et Loire</option>
							<option value="72">72 Sarthe</option>
							<option value="73">73 Savoie</option>
							<option value="74">74 Haute Savoie</option>
							<option value="75">75 Paris</option>
							<option value="76">76 Seine Maritime</option>
							<option value="77">77 Seine et Marne</option>
							<option value="78">78 Yvelines</option>
							<option value="79">79 Deux Sèvres</option>
							<option value="80">80 Somme</option>
							<option value="81">81 Tarn</option>
							<option value="82">82 Tarn et Garonne</option>
							<option value="83">83 Var</option>
							<option value="84">84 Vaucluse</option>
							<option value="85">85 Vendée</option>
							<option value="86">86 Vienne</option>
							<option value="87">87 Haute Vienne</option>
							<option value="88">88 Vosges</option>
							<option value="89">89 Yonne</option>
							<option value="90">90 Territoire de Belfort</option>
							<option value="91">91 Essonne</option>
							<option value="92">92 Hauts de Seine</option>
							<option value="93">93 Seine Saint Denis</option>
							<option value="94">94 Val de Marne</option>
							<option value="95">95 Val d'Oise</option>	
						</select>
						
						<input id ="bouton" type="hidden" name ="action" value="aff">
						<input id ="bouton" type="submit" name ="ok" value="OK">
						</div>
					</div>	
				</form>
				<p>
				<br>
				


				<h3>
			Séléctionnez les éléments de votre recherche. 
		</h3>
		<div class = "div_globale">
			<form method = "POST" action = "../MVC/index.php?cible=evenement3">
				<div class = "div_gauche">
					<ul>
						<li> Nom d'évènement</li>
						<li><input type ="text" name = "titre"></li> <br>
						<li> Type d'évènement</li>
						<li>
							<select name="categorie">
								<option value="">Aucun</option>
								<?php 
									require("../MVC/Modele/connexion_db.php");
									$reponse=$db->query('SELECT distinct Nom FROM categories');
				                    $categories=$reponse->fetchAll(PDO::FETCH_ASSOC);
				                    $ligne= array();
				                    
				                    $i=0;
				                    foreach($categories as $categories => $valeur1){ 
				                        //echo "ligne n°:" . $categories . "<br />";
				                            foreach ($valeur1 as $cle2=>$valeur2){
				                             // echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
				                              $ligne[$categories][$cle2]=$valeur2;
				                            }
				                           
				                        }
				                 while($i<=7){ if(isset($ligne[$i]['Nom']))print('<option value="'.$ligne[$i]['Nom'].'">'.$ligne[$i]['Nom'].'</option>');
								  else break;
								$i++;}

								?>
							</select>
						</li><br>
						<li> Genre de l'évènement </li>
						<li><input type ="text" name = "sous_categorie"></li>
						
					</ul>	
				</div>
				
				<div class = "div_centre">
					<ul>
						<li> Public visé </li>
						<li>
							<select name="public">
								<option value="">Aucun</option>
								<option value="enfants">Enfants</option>
								<option value="adulte">Adultes</option>
								<option value="famille">Famille</option>
								<option value="tous">Tous</option>
							</select>
						</li><br>
						<li> Horaire </li>
						<li><input type="time" name="horaire" placeholder="hh:mn:ss" ></li><br>
						<li> Date </li>
						<li><input type="date" id="date" name="date" class="date"></li><br><br>
						<li><input type ="submit" value = "RECHERCHER"></li>
					</ul>	
				</div>

				<div class = "div_droite">
					<ul>
						<li> Pays </li>
						<li><input type ="text" name = "pays"></li><br>
						<li> Ville </li>
						<li><input type ="text" name = "ville"></li><br>
						<li> Departement </li>
						<li><select  id="departement" name ="departement" >
								<option value="">-- Sélectionner --</option>
								<option value="01">01 Ain</option>
								<option value="02">02 Aisne</option>
								<option value="03">03 Allier</option>
								<option value="04">04 Alpes de Haute Provence</option>
								<option value="05">05 Hautes Alpes</option>
								<option value="06">06 Alpes Maritimes</option>
								<option value="07">07 Ardèche</option>
								<option value="08">08 Ardennes</option>
								<option value="09">09 Ariège</option>
								<option value="10">10 Aube</option>
								<option value="11">11 Aude</option>
								<option value="12">12 Aveyron</option>
								<option value="13">13 Bouches du Rhône</option>
								<option value="14">14 Calvados</option>
								<option value="15">15 Cantal</option>
								<option value="16">16 Charente</option>
								<option value="17">17 Charente Maritime</option>
								<option value="18">18 Cher</option>
								<option value="19">19 Corrèze</option>
								<option value="2A">2A Corse du Sud</option>
								<option value="2B">2B Haute-Corse</option>
								<option value="21">21 Côte d'Or</option>
								<option value="22">22 Côtes d'Armor</option>
								<option value="23">23 Creuse</option>
								<option value="24">24 Dordogne</option>
								<option value="25">25 Doubs</option>
								<option value="26">26 Drôme</option>
								<option value="27">27 Eure</option>
								<option value="28">28 Eure et Loir</option>
								<option value="29">29 Finistère</option>
								<option value="30">30 Gard</option>
								<option value="31">31 Haute Garonne</option>
								<option value="32">32 Gers</option>
								<option value="33">33 Gironde</option>
								<option value="34">34 Hérault</option>
								<option value="35">35 Ille et Vilaine</option>
								<option value="36">36 Indre</option>
								<option value="37">37 Indre et Loire</option>
								<option value="38">38 Isère</option>
								<option value="39">39 Jura</option>
								<option value="40">40 Landes</option>
								<option value="41">41 Loir et Cher</option>
								<option value="42">42 Loire</option>
								<option value="43">43 Haute Loire</option>
								<option value="44">44 Loire Atlantique</option>
								<option value="45">45 Loiret</option>
								<option value="46">46 Lot</option>
								<option value="47">47 Lot et Garonne</option>
								<option value="48">48 Lozère</option>
								<option value="49">49 Maine et Loire</option>
								<option value="50">50 Manche</option>
								<option value="51">51 Marne</option>
								<option value="52">52 Haute Marne</option>
								<option value="53">53 Mayenne</option>
								<option value="54">54 Meurthe et Moselle</option>
								<option value="55">55 Meuse</option>
								<option value="56">56 Morbihan</option>
								<option value="57">57 Moselle</option>
								<option value="58">58 Nièvre</option>
								<option value="59">59 Nord</option>
								<option value="60">60 Oise</option>
								<option value="61">61 Orne</option>
								<option value="62">62 Pas de Calais</option>
								<option value="63">63 Puy de Dôme</option>
								<option value="64">64 Pyrénées Atlantiques</option>
								<option value="65">65 Hautes Pyrénées</option>
								<option value="66">66 Pyrénées Orientales</option>
								<option value="67">67 Bas Rhin</option>
								<option value="68">68 Haut Rhin</option>
								<option value="69">69 Rhône</option>
								<option value="70">70 Haute Saône</option>
								<option value="71">71 Saône et Loire</option>
								<option value="72">72 Sarthe</option>
								<option value="73">73 Savoie</option>
								<option value="74">74 Haute Savoie</option>
								<option value="75">75 Paris</option>
								<option value="76">76 Seine Maritime</option>
								<option value="77">77 Seine et Marne</option>
								<option value="78">78 Yvelines</option>
								<option value="79">79 Deux Sèvres</option>
								<option value="80">80 Somme</option>
								<option value="81">81 Tarn</option>
								<option value="82">82 Tarn et Garonne</option>
								<option value="83">83 Var</option>
								<option value="84">84 Vaucluse</option>
								<option value="85">85 Vendée</option>
								<option value="86">86 Vienne</option>
								<option value="87">87 Haute Vienne</option>
								<option value="88">88 Vosges</option>
								<option value="89">89 Yonne</option>
								<option value="90">90 Territoire de Belfort</option>
								<option value="91">91 Essonne</option>
								<option value="92">92 Hauts de Seine</option>
								<option value="93">93 Seine Saint Denis</option>
								<option value="94">94 Val de Marne</option>
								<option value="95">95 Val d'Oise</option>	
							</select>
						</li><br>
						<li> Lieu </li>
						<li><input type ="text" name = "lieu"></li>
					</ul>
					
				</div>
			</form>	
		</div>




				<?php

			if($verif!=true){
				if(isset($sous_categorie))
				{
					$i=0;
					while($i<count($evenement)){
						
                    
                    	$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i WHERE  e_i.evenement_ID_Eve="'.$evenement[$i]['ID_Eve'].'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($img as $img => $val1){
		                            	foreach ($val1 as $cle2=>$val2){
		                            $nom_img[$img][$cle2]=empty($val2)?'img_concert_1':$val2;

							
				print('		
					<br>
					<div class = "div_img">');
					echo '<img src="../MVC/Vue/images/imageEve/'.$nom_img[$img][$cle2]=$val2.'" class="img" alt="Concert 1">';
						print('<div class = "legende_image">
						<h2><li class = "titre_event"><a href="concert 1">'.strtoupper($evenement[$i]['Titre']).'</a></li></h2>
							<ul>
								<li>'.formattageFr($evenement[$i]['Date_Eve']).'</li>
								<li>'.$evenement[$i]['Prix'] .'&nbsp;&nbsp;&euro;</li>
								<li>'.$evenement[$i]['Code_Postal'].' '.$evenement[$i]['Ville'].'</li>
								<li>'.$evenement[$i]['Horaire'].'</li>
								<li><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'">Voir plus ...</a></li>
							</ul>
						</div>
					</div>	
				</p>');}}$i++;}
				}elseif(isset($date))
				{
					$i=0;
					while($i<count($evenement)){
						
                    
                    	$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i 
                    		WHERE  e_i.evenement_ID_Eve="'.$evenement[$i]['ID_Eve'].'" 
                    		and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($img as $img => $val1){
		                            	foreach ($val1 as $cle2=>$val2){
		                            
		                            			$nom_img[$img][$cle2]=empty($val2)?'img_concert_1':$val2;
							
				print('		
					<br>
					<div class = "div_img">');
					echo '<img src="../MVC/Vue/images/imageEve/'.$val2.'" class="img" alt="Concert 1">';
						print('<div class = "legende_image">
						<h2><li class = "titre_event"><a href="concert 1">'.strtoupper($evenement[$i]['Titre']).'</a></li></h2>
							<ul>
								<li>'.formattageFr($evenement[$i]['Date_Eve']).'</li>
								<li>'.$evenement[$i]['Prix'] .'&nbsp;&nbsp;&euro;</li>
								<li>'.$evenement[$i]['Code_Postal'].' '.$evenement[$i]['Ville'].'</li>
								<li>'.$evenement[$i]['Horaire'].'</li>
								<li><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'">Voir plus ...</a></li>
							</ul>
						</div>
					</div>	
				</p>');}}$i++;}
				}else{$i=0;

					while($i<count($evenement)){
						
                    
                    	$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i WHERE  e_i.evenement_ID_Eve="'.$evenement[$i]['ID_Eve'].'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($img as $img => $val1){
		                            	foreach ($val1 as $cle2=>$val2){
		                            $nom_img[$img][$cle2]=empty($val2)?'img_concert_1':$val2;

							
				print('		
					<br>
					<div class = "div_img">');
					echo '<img src="../MVC/Vue/images/imageEve/'.$nom_img[$img][$cle2]=$val2.'" class="img" alt="Concert 1">';
						print('<div class = "legende_image">
						<h2><li class = "titre_event"><a href="concert 1">'.strtoupper($evenement[$i]['Titre']).'</a></li></h2>
							<ul>
								<li>'.formattageFr($evenement[$i]['Date_Eve']).'</li>
								<li>'.$evenement[$i]['Prix'] .'&nbsp;&nbsp;&euro;</li>
								<li>'.$evenement[$i]['Code_Postal'].' '.$evenement[$i]['Ville'].'</li>
								<li>'.$evenement[$i]['Horaire'].'</li>
								<li><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'">Voir plus ...</a></li>
							</ul>
						</div>
					</div>	
				</p>');}}$i++;}
				}
			}
		else{
					echo '<p style=" color: #FE0000;text-align: center;"><img src="../MVC/Vue/images/alarm.png" alt="Concert 1">&nbsp;&nbsp;&nbsp;Aucun resultat n\'a ete trouvé pour cet événement</p>';
			}



				
				?>

		<?php
		$evenements = ob_get_clean();
		return $evenements;																
}


function AjoutEve($ch_vide){
    ob_start();
	?>

		
		
		<center>

		<div class="bloc_page">
		
		<h1 style="font-family:arial, sans-serif;font-weight:normal;text-align: center;background: #841F1F;background:-webkit-linear-gradient(bottom, #841F1F, #CA2F2F);background:-ms-linear-gradient(bottom, #841F1F, #CA2F2F);background:-moz-linear-gradient(bottom, #841F1F, #CA2F2F);background:-o-linear-gradient(bottom, #841F1F, #CA2F2F);background:linear-gradient(to top, #841F1F, #CA2F2F);color: white;-moz-border-radius: 10px;-webkit-border-radius: 10px;-o-border-radius: 10px;border-radius:5px;width: 900px;height: 40px;margin-left: auto;margin-right: auto;margin-top:auto;margin-bottom:5px;padding-top: 1px;padding-bottom: auto;top:35%;
		">Ajout d'événement</h1>
		<center><span style="color: red; text-align: center;"><?php echo isset($ch_vide)?$ch_vide:" ";?></span></center>
		<form enctype="multipart/form-data" action="../MVC/index.php?cible=ajouter_eve" method="post" id="ajout_eve">
						
			<fieldset>
			<div class="A">
				
			<div class="A1">
				
				<ul>
					<li>Titre : </li></br>
					<li>Date : </li></br>
					<li>Horaire : </li></br>
					<li>Adresse : </li></br>
					<li>Ville : </li></br>
					<li>Département : </li></br>
					
				</ul>
			
			</div>			
			
			<div class="A2">
				
				<ul class=ul1>
					<li><div class="Titre"><input type="text" name="Titre" style="width:250px;height:17px"/></div></li></br>
					
					<li><div class="Date_Eve">
						<td>
							<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
								<tr>
									<td id="ds_calclass"></td>
								</tr>
							</table><input type="text" name="Date_Eve" style="height:18px;width:250px " onclick="ds_sh(this);" />
						</td>
						</div>
					</li></br>
					
					<li><div class="Horaire"><input type="time" name="Horaire" placeholder="hh:mn" style="height:17px;"></div></li></br>
					
					<li><div class="Adresse"><input type="text" name="Adresse" style="width:250px;" style="height:17px"></div></li></br>
					
					<li><div class="Ville"><input type="text" name="Ville" style="height:17px;width:250px"></div></li></br>
				
					<li><div class="Departement">
									<select name="Departement" style="height:25px">
										<option value="">-- Sélectionner --</option>
										<option value="01">01 Ain</option>
										<option value="02">02 Aisne</option>
										<option value="03">03 Allier</option>
										<option value="04">04 Alpes de Haute Provence</option>
										<option value="05">05 Hautes Alpes</option>
										<option value="06">06 Alpes Maritimes</option>
										<option value="07">07 Ardèche</option>
										<option value="08">08 Ardennes</option>
										<option value="09">09 Ariège</option>
										<option value="10">10 Aube</option>
										<option value="11">11 Aude</option>
										<option value="12">12 Aveyron</option>
										<option value="13">13 Bouches du Rhône</option>
										<option value="14">14 Calvados</option>
										<option value="15">15 Cantal</option>
										<option value="16">16 Charente</option>
										<option value="17">17 Charente Maritime</option>
										<option value="18">18 Cher</option>
										<option value="19">19 Corrèze</option>
										<option value="2A">2A Corse du Sud</option>
										<option value="2B">2B Haute-Corse</option>
										<option value="21">21 Côte d'Or</option>
										<option value="22">22 Côtes d'Armor</option>
										<option value="23">23 Creuse</option>
										<option value="24">24 Dordogne</option>
										<option value="25">25 Doubs</option>
										<option value="26">26 Drôme</option>
										<option value="27">27 Eure</option>
										<option value="28">28 Eure et Loir</option>
										<option value="29">29 Finistère</option>
										<option value="30">30 Gard</option>
										<option value="31">31 Haute Garonne</option>
										<option value="32">32 Gers</option>
										<option value="33">33 Gironde</option>
										<option value="34">34 Hérault</option>
										<option value="35">35 Ille et Vilaine</option>
										<option value="36">36 Indre</option>
										<option value="37">37 Indre et Loire</option>
										<option value="38">38 Isère</option>
										<option value="39">39 Jura</option>
										<option value="40">40 Landes</option>
										<option value="41">41 Loir et Cher</option>
										<option value="42">42 Loire</option>
										<option value="43">43 Haute Loire</option>
										<option value="44">44 Loire Atlantique</option>
										<option value="45">45 Loiret</option>
										<option value="46">46 Lot</option>
										<option value="47">47 Lot et Garonne</option>
										<option value="48">48 Lozère</option>
										<option value="49">49 Maine et Loire</option>
										<option value="50">50 Manche</option>
										<option value="51">51 Marne</option>
										<option value="52">52 Haute Marne</option>
										<option value="53">53 Mayenne</option>
										<option value="54">54 Meurthe et Moselle</option>
										<option value="55">55 Meuse</option>
										<option value="56">56 Morbihan</option>
										<option value="57">57 Moselle</option>
										<option value="58">58 Nièvre</option>
										<option value="59">59 Nord</option>
										<option value="60">60 Oise</option>
										<option value="61">61 Orne</option>
										<option value="62">62 Pas de Calais</option>
										<option value="63">63 Puy de Dôme</option>
										<option value="64">64 Pyrénées Atlantiques</option>
										<option value="65">65 Hautes Pyrénées</option>
										<option value="66">66 Pyrénées Orientales</option>
										<option value="67">67 Bas Rhin</option>
										<option value="68">68 Haut Rhin</option>
										<option value="69">69 Rhône</option>
										<option value="70">70 Haute Saône</option>
										<option value="71">71 Saône et Loire</option>
										<option value="72">72 Sarthe</option>
										<option value="73">73 Savoie</option>
										<option value="74">74 Haute Savoie</option>
										<option value="75">75 Paris</option>
										<option value="76">76 Seine Maritime</option>
										<option value="77">77 Seine et Marne</option>
										<option value="78">78 Yvelines</option>
										<option value="79">79 Deux Sèvres</option>
										<option value="80">80 Somme</option>
										<option value="81">81 Tarn</option>
										<option value="82">82 Tarn et Garonne</option>
										<option value="83">83 Var</option>
										<option value="84">84 Vaucluse</option>
										<option value="85">85 Vendée</option>
										<option value="86">86 Vienne</option>
										<option value="87">87 Haute Vienne</option>
										<option value="88">88 Vosges</option>
										<option value="89">89 Yonne</option>
										<option value="90">90 Territoire de Belfort</option>
										<option value="91">91 Essonne</option>
										<option value="92">92 Hauts de Seine</option>
										<option value="93">93 Seine Saint Denis</option>
										<option value="94">94 Val de Marne</option>
										<option value="95">95 Val d'Oise</option>
										<option value="971">971 Guadeloupe</option>
										<option value="972">972 Martinique</option>
										<option value="973">973 Guyane</option>
										<option value="974">974 Réunion</option>
										<option value="975">975 Saint Pierre et Miquelon</option>
										<option value="976">976 Mayotte</option>
									</select>
				</div></li></br>
					
				</ul>
			
				
				
				
				</br></br>
			</div>		
			</div>
			
			<div class="B">
				
				<div class="B1">
					<ul>
					<li><label for="nom_categorie_evenement">Catégorie d'évènement : </label></li></br>
					<li><label for="Sous_categorie">Sous-catégorie: </label></li></br>
					<li><label for="Type_de_Public">Public visé : </label></li></br>
					<li><label for="Site_web">Site Web : </label></li></br>
					<li><label for="Sponsor">Organisateur : </label></li></br>
					<li><label for="Prix">Prix : </label></li></br>
					</ul>
				</div>
			
				<div class="B2">	
					<ul class="ul1">
					<li>
						<div class="nom_categorie_evenement">
							<input type="text" name="nom_categorie_evenement" style="height:22px"/>
						</div>
					</li></br>
					
					<li><div class="Sous_categorie"><input type="text" name="nom_sous_categorie" style="width:160px; height:17px"/></div></li></br>
					
					<li>	
						<div class="Type_de_Public">
							<select name="Type_de_Public" style="width:75px; height:22px">
							<option value="enfant">Enfant</option>
							<option value="adulte">Adulte</option>
							<option value="famille">Famille</option>
							<option value="autre">Autre</option>
							</select>
						</div>
					</li></br>
					
					
					<li><div class="Site_web"><input type="url" name="Site_web" style="width:160px; height:17px"/></div></li></br>
					
					<li><div class="Sponsor"><input type="text" name="nom_sponsor" style="width:160px;height:17px"> </div></li></br>
					<li><div class="Prix"><input type="number" name="Prix" step="0.0" style="width:70px; height:17px" min="0"/>&nbsp;&nbsp;&euro; <span><input type="checkbox" name="gatuit" value="Gratuit"/>Gratuit<span></div></li></br>
					
					
				</ul>
				
			</div>
			</div>
			
			<div class="C">
				
				</br>
			
				Description : <div class="Descriptif"><textarea name="Descriptif" placeholder="Decrivez votre évènement: lieu,personnes etc..." style="text-align:left;width:645px; height:200px;"> </textarea></div>
				
				</br></br>
				
				<div class="importer_fichier"><input type="hidden" name="MAX_FILE_SIZE" value="300000" /><input type="file" name="fichier"></div>
				
				</br></br>
				
				<div class="ajouter_eve"><button type="submit" name="ajouter_eve" class="bouton noir large" style="width:300px;">Ajouter l'évènement</button></div>
	        </div>
			
			</fieldset>
			
		</form>
	</div>
		</center>
	<?php
    $AjoutEve = ob_get_clean();
    return $AjoutEve;																
}
function back_office(){
        ob_start();
		?>
		<style>
				#tableau,#tableaU {
				    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
				    font-size: 12px;
				    margin: 10px 0;
				    width: 100%;
				    text-align: left;
				    border-collapse: collapse;
				}
				#tableau th,#tableaU th {
				    font-size: 15px;
				    font-weight: normal;
				    padding: 8px;
				    background: #CA2F2F  repeat-x;
				    border-top: 2px solid #d3ddff;
				    border-bottom: 1px solid #fff;
				    color: white;
				}
				#tableau td,#tableaU td {
				    padding: 8px;
				    border-bottom: 1px solid #fff;
				    color: #CA2F2F;
				    border-top: 1px solid #fff;
				    background: white repeat-x;
				}
				#tableau tfoot tr td,#tableaU tfoot tr td{
				    background: #e8edff;
				    font-size: 16px;
				    color: #CA2F2F;
				    text-align:center;
				}
				#tableau tbody tr:hover td,#tableaU tbody tr:hover td {
				    background: #464646 repeat-x;
				    color:white;
				}
				#tableau a:hover,#tableaU a:hover {
				    text-decoration:underline;
				}#admin_id{

					display: block;
				}
		</style>


			
			<center><p><strong><br>Gestion d'utilisateurs</strong></p>
			<table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">  
            <thead>  
      		
            <tr>  
      
                <th>Login</th>  
                <th>Nom</th>  
                <th>Prenom</th>
                <th>Date d'inscription</th>
                <th>Ville</th> 
                <th>Sexe</th> 
                <th>E-mail</th>  
                <th>Supprimer le membre</th>
                <th>Modifier</th>  
            </tr> 
            </thead>  
      
            <?php  





            
           $db=new PDO("mysql:host=localhost;dbname=eveandgo","root","root");
					$reponse=$db->query('SELECT Login,Nom,Prenom,Date_d_inscription,Adresse,Ville,Region,Sexe,E_mail FROM membre where Type<1');
                    $membre=$reponse->fetchAll(PDO::FETCH_ASSOC);
                    $ligne[][] = array();
                    
                    foreach($membre as $membre => $valeur1){ 
                        //echo "ligne n°:" . $categories . "<br />";
                            foreach ($valeur1 as $cle2=>$valeur2){
                             
                              $ligne[$membre][$cle2]=$valeur2;
                            }
                           
                    }   


 			
            $i=0;
            while($i<count($ligne))  
            {  
 
      		print('
            <tr>  
      			<td>'.$ligne[$i]['Login'].'</td> 
                <td>'.strtoupper($ligne[$i]['Nom']).'</td>  
                <td>'.$ligne[$i]['Prenom'].'</td> 
                <td>'.$ligne[$i]['Date_d_inscription'].'</td>  
                
                <td>'.$ligne[$i]['Ville'].'</td> 
                 
                <td>'.$ligne[$i]['Sexe'].'</td>  
                <td id="e_mail">'.$ligne[$i]['E_mail'].'</td>  
                <td><a href="../MVC/index.php?cible=delet_user&del='.$ligne[$i]['Login'].'"><button class="btn btn-danger">Supprimer</button></a></td>
                <td><a href="../MVC/index.php?cible=update_profil&change_this=ok&utilisateur='.$ligne[$i]['Login'].'"><button class="btn btn-danger">Modifier</button></a></td>    
            </tr>  ');
      $i++;}



      				

				?>
</table></center>
					
			<center><p><strong><br>Gestion d'évènements</strong></p>
			<table id="tableaU" summary="Classement Blogspot par Wikio - Mai 2010">  
            <thead> 
            <tr>  
      			<th>Ajout&Eacute; PAR</th>
                <th>Date</th>  
                <th>Signalement</th>  
                <th>Ville</th>
                
                <th>ILLUSTRATION</th>
                <th>VSUALISATION</th> 
                <th>SUPRESSION</th> 
                 
            </tr>   
            </thead> 
			<?php  
											
				$db=new PDO("mysql:host=localhost;dbname=eveandgo","root","root");

                $reponse1=$db->query('SELECT * 
					 FROM evenement e,  lieu l where e.ID_Eve=evenement_ID_Eve
					 ');
                $even=$reponse1->fetchAll(PDO::FETCH_ASSOC);
                $evenement = array();
                $nb=0;
                foreach($even as $even => $valeur1){ 
                     //echo "evenement n°:" . $evenement_filtre . "<br />";
                     foreach ($valeur1 as $cle2=>$valeur2){
                              //echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                              $evenement[$even][$cle2]=$valeur2;

                    }
                         
                }    

 			$nb=$db->query('SELECT COUNT(e.ID_Eve)
					 FROM evenement e
					')->fetch();

				$nom_img='';	 
				$i=0;	 
			while($i<count($evenement)){
						
									if($i>$nb[0]-1)break;
			                    	$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i WHERE  e_i.evenement_ID_Eve="'.intval($evenement[$i]['ID_Eve']).'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
										
										foreach($img as $img => $val1){
								            foreach ($val1 as $cle2=>$val2){
								                    $nom_img=empty($val2)?'img_concert_1.jpg':$val2;
								      		}
						      			} 
											
											print('
										            <tr>  
										            	<td>'.$evenement[$i]['membre_Login'].'</td>
										      			<td>'.formattageFr($evenement[$i]['Date_Eve']).'</td> 
										                <td>'.$evenement[$i]['signalement'] .'</td>  
										                <td>'.$evenement[$i]['Ville'].'</td> 
										                
										                <td><img src="../MVC/Vue/images/imageEve/'.$nom_img.'" style="height:60px;width:60px;"></td> 
										                
										                <td><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'"><button class="btn btn-danger">VISUALISER/MODIFIER ('.$evenement[$i]['ID_Eve'].')</button></a></td>
										                <td><a href="..//MVC/index.php?cible=Supprime_eve&ideve='.$evenement[$i]['ID_Eve'].'"><button class="btn btn-danger">SUPPRIMER('.$evenement[$i]['ID_Eve'].')</button></a></td>    
										            </tr>  ');
					      

      		$i++;}




            ?>

        </table></center> 

	<?php
    $back_office = ob_get_clean();
    return $back_office;																
}
function Voir_plus_eve($donnees){
        ob_start();
		?>		<style>
.bouton {
	width:100; 
	padding:8px 0; 
	text-align:center; 
	
	float:center; 
	margin:20px 80px 20px 0; 
	font-size: 1.6em; 
	border-radius:7px; 
	box-shadow: 0 0 1px rgba( 0, 0, 0, 0.2), 0 -1px 0 rgba( 255, 255, 255, 0.1); 
	font-size: 0.85em; 
	width:100px; 
	color:#333; 
	text-shadow: 0px 1px 0px rgba( 255, 255, 255, 0.3);
	}	
	.buton:not(.commt){display: table;}
	
.bouton.large{font-size: 1.1em; width:150px}


/* ************************** Couleurs des boutons / Hover et Active classes *************************** */

/* -- Bouton noir -- */	
.bouton.noir, .bouton.noir:active { 
	background: #444; 
	background: linear-gradient( #DF0101, #DF0101);
	background: -webkit-linear-gradient( #DF0101, #DF0101); 
	background: -moz-linear-gradient( #DF0101, #DF0101); 
	background: -ms-linear-gradient( #DF0101, #DF0101); 
	background: -o-linear-gradient(#DF0101, #DF0101); 
	background: linear-gradient( #DF0101, #DF0101);
	}
.bouton.noir:hover {
	background: #555;
	background: -webkit-linear-gradient( #777, #333);
	background: -moz-linear-gradient( #777, #333);
	background: -ms-linear-gradient( #777, #333);
	background: -o-linear-gradient( #777, #333);
	background: linear-gradient( #777, #333);	
	}	
.bouton.noir:active{box-shadow: 1px 1px 10px #000 inset, 0 1px 0 rgba( 255, 255, 255, 0.4);}


.bouton.violet:active{box-shadow: 1px 1px 10px #7A294F inset, 0 1px 0 rgba( 255, 255, 255, 0.4);}

/* ************************** Couleurs des polices *************************** */
.bouton.noir, .bouton.noir:active {color:#FFF;


}



				</style>



					<?php 
					
					if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']==$donnees[0]['membre_Login'] || (isset($_SESSION['LOGIN']) && $_SESSION['TYPE']==1)){
						

							$y='&nbsp;&nbsp;&euro;';
							$prix=$donnees[0]['Prix']==0?'Gratuit':$donnees[0]['Prix'].'.'.$y;
									
									print('



																		<div class="bloc_page">
										
											
																		<h1>EVENEMENT</h1>
										
											<section>
										
												<aside>
											
													<figure>');
														echo isset($_POST['Modifier'])?'<form enctype="multipart/form-data" action="../MVC/ModificationEve.php?ideve='.$donnees[0]['ID_Eve'].'&nom_imag='.$donnees[0]['Nom_image'].'&sponsor='.$donnees[0]['ID_sponsor'].' " method="POST">':'';
														print('<img src="../MVC/Vue/images/imageEve/'.$donnees[0]['Nom_image'].'" alt="Photo soirÃ©e" class="photo" title="NOISIA & GUEST @Showcase" style="width:200px;height:200px;"/>

														<br />');
													if(isset($_POST['Suppression']) || isset($_POST['SIGNE'])){
															if(isset($_POST['Suppression']))header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=Supprime_eve&ideve='.$donnees[0]['ID_Eve'].'');
															elseif(isset($_POST['SIGNE'])){header('Location:https:../MVC/index.php?cible=signalement&ideve='.$donnees[0]['ID_Eve'].'');}

													}

														echo isset($_POST['Modifier'])?'Changer l\'illustration: <input type="file" name="fichier" id="image" MAX_FILE_SIZE="30000"/>':'<figcaption>'.$donnees[0]['Titre'].'';
															echo isset($_POST['Modifier'])?'</br><div class="lieu"><p>Lieu: <br /><br/>Adresse:&nbsp;<input type="text" name="Adresse" value="'.$donnees[0]['Adresse'].'" style="color:white;background-color:#CA2F2F;" id="adr"/><br/><br/>Ville:&nbsp;<input type="text" name="ville" value="'.$donnees[0]['Ville'].'" style="color:white;background-color:#CA2F2F;"/></p></div>':'</br><div class="lieu"><p>Lieu: <br /><br/> '.$donnees[0]['Adresse'].'<br/>'.$donnees[0]['Ville'].'</p></div>';
										
														print('</figcaption>

													</figure>');
											
													echo isset($_POST['Modifier'])?' ':'<form method="post" action="../MVC/index.php">';
												
														print('<fieldset style="border:none;">
														
														
															<p><label for="signaler">Signaler evenement?</label><input type="checkbox"  name="coche"/><p>
													
															<!--p><label for="note">Noter l\'evenement</label> : <input type="number" name="note" id="note" placeholder="note /10" min="0" max="10" style="width:70px" /> </p-->
														
															<input type="submit" value="Signaler" name="SIGNE" class="bouton noir large" style="margin:0px;width:200px;"/>');
															echo isset($_POST['Modifier'])?'<input type="submit" name="Valider" value="Valider la modification" class="bouton noir large" style="margin-top:40px;margin-bottom:20px;margin-left:100px;width: 200px;" id="valideModif"/>':'';

														print('
														</fieldset>	');
											
													echo isset($_POST['Modifier'])?' ':'</form>';
													print('
														<form method="post" action="#" style="">');
														
														echo isset($_POST['Modifier'])?'':'<input type="submit" name="Suppression" value="SUPPRIMER" class="bouton noir large" style="margin-top:40px;margin-bottom:5px;margin-left:5px;"/>';
														echo isset($_POST['Modifier'])?'':'<input type="submit" name="Interdit" value="NE PLUS L\'AFFICHER" class="bouton noir large" style="margin:5px;font-size:15px;"/>';
														echo !isset($_POST['Modifier'])?'<input type="submit" name="Modifier" value="MODIFIER" class="bouton noir large" style="margin:5px;"/>':'';
														
														echo isset($_POST['Modifier'])?' ':'</form>';
														
														print('
												</aside>
										
												<article id="art2">');
									
													echo isset($_POST['Modifier'])?'<div class="nom_event"><p><strong>Titre&nbsp; <input type="text" id="titremodif" name="titre" value="'.$donnees[0]['Titre'].'" style="color:white;background-color:#CA2F2F;"/></strong></p></div>':'<div class="nom_event"><p><strong>'.$donnees[0]['Titre'].'</strong></p></div>';
									
													echo isset($_POST['Modifier'])?'<div class="date_heure"><p><em>Date:<input type="date" name="date_Eve" id="datemodif" value="'.formattageFr($donnees[0]['Date_Eve']).'" style="color:white;background-color:#CA2F2F;"/> Heure: <input type="time" name="horaire" id="horairemodif" value="'.$donnees[0]['Horaire'].'"style="color:white;background-color:#CA2F2F;"/></em></p></div>':'<div class="date_heure"><p><em>Date:'.formattageFr($donnees[0]['Date_Eve']).' Heure: '.$donnees[0]['Horaire'].'</em></p></div>';
														
													echo isset($_POST['Modifier'])?'<div class="descriptif"><p><textarea name="descriptif"rows="15" cols="60" style="color:white;background-color:#CA2F2F;" id="descriptifmodif"/>'.$donnees[0]['Descriptif'].'</textarea><br /><br />':'<div class="descriptif"><p>'.$donnees[0]['Descriptif'].'<br /><br />';
													
								    
													echo isset($_POST['Modifier'])?'<span class="organisateur">Organisateur : <input type="text" id="organisateurmodif" name="organisateur" value="'.$donnees[0]['Nom'].'" style="color:white;background-color:#CA2F2F;"/></span></br></br><span class="Public vise">Public visé:  <select name="public" id="typ_modif ><option value="enfant">enfant</option><option value="adulte">adulte</option><option value="famille">famille</option><option value="autre">autre</option></select></span></p></div><br><br>':'<span class="organisateur">Organisateur : '.$donnees[0]['Nom'].'</span></br><span class="Public vise">Public visé: '.$donnees[0]['Type_de_Public'].'</span></p></div><br><br>';
													
													print('<div class="partage-reserv">	
														<div class="partage"><p>Partager sur: &nbsp;<br><a href="https://fr-fr.facebook.com/"><img src="../MVC/Vue/images/fb.jpg" alt="logo_fb" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;<a href="https://twitter.com/?lang=fr"><img src="../MVC/Vue/images/tw.jpg" alt="logo_twitter" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;<a href="https://plus.google.com/"><img src="../MVC/Vue/images/gplus.jpg" alt="logo_google+" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;</p></div>
														<div class="tarif"><p><p>');
													echo isset($_POST['Modifier'])?'Tarif:<input type="number" name="tarif" id="prixmodif" min="0" value="'. $donnees[0]['Prix'].'" style="color:white;background-color:#CA2F2F;width:50px;"/>&nbsp;&nbsp;&euro;.</p></p></div>':'Tarif:'.$prix.'</p></p></div>';
													print('
														<div class="lien_reservation"><p><a href="'. $donnees[0]['Site_web'].'" target="_blank"><input type="button" name="lien1" value="RESERVER" onclick="" class="bouton noir large" style="margin-top:25px;"/> </a></p></div>
													</div>
																							<form action="/traiter-message.php" method="post">
																			    <fieldset style="border:none">
																			        <p>
																			            <label>Commentaire:</label>
																			            <textarea name="message" style="
																				width: 433px;
																				height: 141px;
																				position:relative;
																			"></textarea>
																			        <p>
																			        <p>
																			            <input type="submit" name="previsualiser" value="Previsualiser" class="bouton noir large commt" style="margin:0px;"/>
																			            <input type="submit" name="envoyer" value="Envoyer" class="bouton noir large commt" style="margin:0px;"/>
																			        </p>
																			    </fieldset>
																			</form>

												</article>	');
												

												echo isset($_POST['Modifier'])?'</form>':'';
											print('</section>

											
										</div>	




						




		');

					}elseif(!isset($_SESSION['LOGIN'])  || (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']!=$donnees[0]['membre_Login'])  ){
							$y='&nbsp;&nbsp;&euro;';
							$prix=$donnees[0]['Prix']==0?'Gratuit':$donnees[0]['Prix'].'.'.$y;
							print('
										<div class="bloc_page">
					
								<h1>EVENEMENT</h1>
							
								<section>
															');
										
									print('
									<aside>
									
										<figure>
						
											 <img src="../MVC/Vue/images/imageEve/'.$donnees[0]['Nom_image'].'" alt="Photo soirÃ©e" class="photo" title="NOISIA & GUEST @Showcase" style="width:200px;height:200px;"/>

											<br />
										
											<figcaption>'.$donnees[0]['Titre'].'
												</br><div class="lieu"><p>Lieu: <br /><br/> '.$donnees[0]['Adresse'].'<br/>'.$donnees[0]['Ville'].'</p></div>
							
											</figcaption>

										</figure>
								
										<form method="post" action="../MVC/index.php?cible=signalement&ideve='.$donnees[0]['ID_Eve'].'">
									
											<fieldset>
											
											
												<p><label for="signaler">Signaler evenement?</label><input type="checkbox"  name="coche"/><p>
										
												<!--p><label for="note">Noter l\'evenement</label> : <input type="number" name="note" id="note" placeholder="note /10" min="0" max="10" style="width:70px" /> </p-->
											
												<input type="submit" value="Envoyer" class="bouton noir large" style="margin:0px;"/>
											
											</fieldset>	
								
										</form>
											
							
										
									</aside>
							
									<article id="art2">
						
										<div class="nom_event"><p><strong>'.$donnees[0]['Titre'].'</strong></p></div>
						
										<div class="date_heure"><p><em>Date:'.formattageFr($donnees[0]['Date_Eve']).' Heure: '.$donnees[0]['Horaire'].'</em></p></div>
											
										<div class="descriptif"><p>'.$donnees[0]['Descriptif'].'<br /><br />
					    
										<span class="organisateur">Organisateur : '.$donnees[0]['Nom'].'</span></br><span class="Public vise">Public visé: '.$donnees[0]['Type_de_Public'].'</span></p></div><br><br>
										
										<div class="partage-reserv">	
											<div class="partage"><p>Partager sur: &nbsp;<br><a href="https://fr-fr.facebook.com/"><img src="../MVC/Vue/images/fb.jpg" alt="logo_fb" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;<a href="https://twitter.com/?lang=fr"><img src="../MVC/Vue/images/tw.jpg" alt="logo_twitter" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;<a href="https://plus.google.com/"><img src="../MVC/Vue/images/gplus.jpg" alt="logo_google+" class="lien_photo" style="width:20px;height:20px"></a>&nbsp;</p></div>
											<div class="tarif"><p><p>Tarif:'. $prix.'</p></p></div>
											<div class="lien_reservation"><p><a href="'. $donnees[0]['Site_web'].'" target="_blank"><input type="button" name="lien1" value="RESERVER" onclick="" class="bouton noir large" style="margin-top:25px;"/> </a></p></div>
										</div>
																				<form action="/traiter-message.php" method="post">
																    <fieldset style="border:none">
																        <p>
																            <label>Commentaire:</label>
																            <textarea name="message" style="
																	width: 433px;
																	height: 141px;
																	position:relative;
																"></textarea>
																        <p>
																        <p>
																            <input type="submit" name="previsualiser" value="Previsualiser" class="bouton noir large commt" style="margin:0px;"/>
																            <input type="submit" name="envoyer" value="Envoyer" class="bouton noir large commt" style="margin:0px;"/>
																        </p>
																    </fieldset>
																</form>
									</article>	
								
								</section>

			
		</div>');

					}


						

					?>


<?php
    $Voir_plus_eve = ob_get_clean();
    return $Voir_plus_eve;																
}
function Mes_eve($evenement,$erreur,$even){
        ob_start();
		?>

				



		<div class="bloc_page" id="bpageeve">
		
			<h1>MES EVENEMENT</h1>
			
				<?php
				require("../MVC/Modele/connexion_db.php");
				$i=0;
				
					 $nb=$db->query('SELECT COUNT(e.ID_Eve)
					 FROM evenement e
					 WHERE e.membre_Login ="'.$_SESSION['LOGIN'].'"')->fetch();

					 
					 
					while($i<count($evenement)){
						



                    if($i>$nb[0]-1)break;
                    	$img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i WHERE  e_i.evenement_ID_Eve="'.intval($evenement[$i]['ID_Eve']).'" and e_i.images_Id_image=i.Id_image')->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($img as $img => $val1){
		                            	foreach ($val1 as $cle2=>$val2){
		                            		$nom_img[$img][$cle2]=empty($val2)?'img_concert_1.jpg':$val2;
		        print('		
					<br>
					<div class = "div_img" id="listeve">');
					echo '<img src="../MVC/Vue/images/imageEve/'.$val2.'" class="img" alt="Concert 1">';
						print('<div class = "legende_image">
						<h2><li class = "titre_event"><a href="concert 1">'.strtoupper($evenement[$i]['Titre']).'</a></li></h2>
							<ul>
								<li>'.formattageFr($evenement[$i]['Date_Eve']).'</li>
								<li>'.$evenement[$i]['Prix'] .'&nbsp;&nbsp;&euro;</li>
								<li>'.$evenement[$i]['Code_Postal'].' '.$evenement[$i]['Ville'].'</li>
								<li>'.$evenement[$i]['Horaire'].'</li>
								<li><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'">Voir plus ...</a></li>
							</ul>
						</div>
					</div>	
				');}}$i++;}
				
				
				?>

			</div>



	<?php
    $Mes_eve = ob_get_clean();
    return $Mes_eve;																
}































































































