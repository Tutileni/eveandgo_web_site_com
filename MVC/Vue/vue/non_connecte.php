 
<!DOCTYPE html>
	  
<html>

																	
    <head>
		<meta charset="utf-8" />
                        
                        <title>Eve&Go</title>
                        <style>
                        label {

                            display:block;

                            width:150px;

                            float:left;

                            }
                            body {

                            background-color:#ADD5F0;
                            }
                        </style>
                        </head>
                        <body>
                        <br /><br /><br /><br /><br /><br /><br /><br />
                            <center><p style="color:red;" id="a">Vous devez vous connecter pour ajouter un événement.</p>
                            <form method="post" action="#">

                                <fieldset>

                                    <legend>Connexion</legend>
				    <?php 
if(!empty($_POST["login"]) && !empty($_POST["mot_de_passe"]))
	{		$login=$_POST["login"];
			$mdp=$_POST["mot_de_passe"];
                            require("../MVC/Modele/connexion_db.php");
                            $reponse =$db->query('SELECT Login,Mot_de_passe FROM membre WHERE Login="'.$login.'" OR Mot_de_passe="'.$mdp.'"');
                            $ligne=$reponse->fetch();
                            if($reponse->rowcount()==0)
                            {
                                $erreur="utilisateur inconnu";}
                            elseif(($_POST["mot_de_passe"] != $ligne["Mot_de_passe"]) && ($_POST["login"] == $ligne["Login"]))
                            {
                                $erreur="Mot de passe incorrect";}
                            else
                            {
				$ligne=$reponse->fetch();
                                
                                $_SESSION["LOGIN"]=$login;
                                $recuperer=$reponse=$db->query('SELECT Nom,Prenom,Sexe,Photo_profil,Type,centre_interet FROM membre where Login="'.$login.'"');
                                $ligne=$recuperer->fetch();
                                $_SESSION["LOGIN"] = $ligne['Login'];
                                  $_SESSION["NOM"]=$ligne['Nom'];
                                  $_SESSION["PRENOM"]=$ligne['Prenom'];
                                  $_SESSION["SEXE"]=$ligne['Sexe'];
                                  $_SESSION["TYPE"] = $ligne['Type'];
                                  $_SESSION["C_I"] = $ligne['centre_interet'];
                                  $_SESSION["PHOTO"]=isset($ligne['Photo_profil'])?$ligne['Photo_profil']:" ";



                                $reussi="vous etes connecte";
                                header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=Referencer_eve');



                  
         
                             }
	}
?>
                                        <p style="color:red;" ><?php echo isset($erreur)?"$erreur":" ";?></p>
                                        <p>
				<p style="color:green;"><?php 
				if(isset($_GET["reussite"])){
				print('
				<script type="text/javascript">
						document.getElementById("a").style.display = "none";
				</script> 
				');
				
				echo "Votre inscriptiob a bien été prise en compte.";}?></p>
                                        <p>
				

                                        <label for="pseudo">Pseudo :</label><input name="login" type="text" id="pseudo" /><br /><br />

                                        <label for="password">Mot de passe :</label><input type="password" name="mot_de_passe" id="mot_de_passe" />

                                        </p>

                                </fieldset>

                                <p><input type="submit" value="Connexion" />
                            </form>
                            <a href="../MVC/index.php?cible=accueil"><button>Retour à la page d'accueil</button></a> 
                            <?php 
                                if(isset($_GET["reussite"])){
                                     echo '<a href="../MVC/index.php?cible=Referencer_eve"><button>Ajouter un événement</button></a></p></center>';
                                 }
                                else {
                                    echo '<a href="../MVC/index.php?cible=Inscription"><button>M\'inscrire</button></a></p></center>';
                                }
                            ?>
                             
<footer>
           
    </footer>
 </body>
                                                                                               
</html>
