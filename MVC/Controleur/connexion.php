<?php

if(isset($_GET['cible']) && $_GET['cible'] == "good")
{
    if(!empty($_POST["login"]) && !empty($_POST["mot_de_passe"]))
	{
        include("../MVC/Modele/utilisateurs.php");
        $reponse = mdp($db,$_POST['login'],$_POST['mot_de_passe']);
        if($reponse->rowcount()==0)
		    {
          $erreur="utilisateur inconnu";
          $head=head($erreur,null);
    			$nav=nav();
    			$H_eader=H_eader(null);
    			$Abas_dynamique=Abas_dynamique();
    			$footer=footer();
    			include("../MVC/gabarit_site.php");

        }else{
			
            $ligne=$reponse->fetch();
            if(($_POST['mot_de_passe'] != $ligne['Mot_de_passe']) && ($_POST['login'] == $ligne['Login'])){

                  $erreur="Mot de passe incorrect";
          				$head=head($erreur);
          				$nav=nav();
          				$H_eader=H_eader(null);
          				$Abas_dynamique=Abas_dynamique();
          				$footer=footer();
          				include("../MVC/gabarit_site.php");
            }else{
				
                  $_SESSION["LOGIN"] = $ligne['Login'];
                  $recuperer=Nom_prenom($db,$_SESSION["LOGIN"]);
                  $ligne=$recuperer->fetch();
                  $_SESSION["NOM"]=$ligne['Nom'];
                  $_SESSION["PRENOM"]=$ligne['Prenom'];
                  $_SESSION["SEXE"]=$ligne['Sexe'];
                  $_SESSION["TYPE"] = $ligne['Type'];
                  $_SESSION["C_I"] = $ligne['centre_interet'];
                  $_SESSION["PHOTO"]=isset($ligne['Photo_profil'])?$ligne['Photo_profil']:" ";
                  $reussi="vous etes connecte";
          				$head=head($reussi);
          				$nav=nav();
          				$H_eader=H_eader($_SESSION["C_I"]);
          				$Abas_dynamique=Abas_dynamique();
          				$footer=footer();
          				include("../MVC/gabarit_site.php");
		 
            }
        }
    }else{
            $erreur="Veuiller remplir tous les champs";
            $head=head($erreur);
        		$nav=nav();
        		$H_eader=H_eader(null);
        		$Abas_dynamique=Abas_dynamique();
        		$footer=footer();
        		include("../MVC/gabarit_site.php");

    }
    
}elseif (isset($_GET['cible']) && $_GET['cible']=="Inscription"){

          	     include("../MVC/Modele/utilisateurs.php");

                if( (isset($_POST['adresse1']) AND isset($_POST['e_mail1']) AND isset($_POST['e_mail2']) AND 
                   isset($_POST['password1'])  AND isset($_POST['password2']) AND isset($_POST['sexe']))
                AND !empty($_POST['Login']) and !empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['Date_naissance']) and 
                        !empty($_POST['ville']) and !empty($_POST['adresse2']) and !empty($_POST['region']) and !empty($_POST['sexe'])  and ($_POST['password1']==$_POST['password2']) ){


                    $chemain_rep = 'C:/xampp/htdocs/Projet-web-isep-mvc/MVC/Vue/images/imageProfil/';
                    $ext = strtolower( pathinfo($_FILES['photoprofil']['name'], PATHINFO_EXTENSION) );
                    $file=uniqid().'.'.$ext;
                    $nouveu_ch=$_FILES['photoprofil']['tmp_name'];
                    move_uploaded_file($nouveu_ch, "$chemain_rep/$file");
                    $photo_profil = $file;

                    $adresse1=$_POST['adresse1']; 
                    $adresse2=$_POST['adresse2'];
                    $adresse=$adresse1 . " " . $adresse2;
                    $email1=$_POST['e_mail1'];
                    $email2=$_POST['e_mail2'];
                    $pwd1=$_POST['password1'];
                    $pwd2=$_POST['password2'];
                    compte($db,$_POST['Login'],$_POST['nom'],$_POST['prenom'],$_POST['Date_naissance'],$adresse,$_POST['ville'],$_POST['region'],$_POST['sexe'],$email1,$pwd1,$photo_profil,$_POST['Type'],$_POST['centre_interets']);
                    header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=inserir');
                            
                }else{   
                            
                            
                    $head=head(null,null);
                    $nav=nav();
                    $H_eader=H_eader(null);
                    $inscription=inscription(null);
                    $footer=footer();
                    include("../MVC/gabarit_site-ins.php");
                            
                }

                            
           
}elseif(isset($_GET['cible']) && $_GET['cible']=="inserir"){header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=validation_ins');}   
                       
elseif(isset($_GET['cible']) && $_GET['cible']=="evenement" && !isset($_POST['sous_categorie']) && !isset( $_POST['date'])){
                    
                    $erreur=" ";
                    $head=head(null,null);
                    $nav=nav();
                    $evenements=evenements(null,null,null,null);
                    $footer=footer();
                    include("../MVC/gabarit_site_eve.php"); 

}elseif(isset($_GET['cible']) && ($_GET['cible']=="evenement1" || $_GET['cible']=="evenement2" || $_GET['cible']=="evenement3")){

                include("../MVC/Modele/utilisateurs.php");
                if(isset($_POST['sous_categorie']) && $_GET['cible']=="evenement1")
                {
                        $reponse= afficher_evenement($db,$_POST['sous_categorie']);
                        if($reponse->rowcount()==0){$vide=true;
                       
                              $head=head(null,null);
                              $nav=nav();
                              $evenements=evenements(null,null,null,$vide);
                              $footer=footer();
                              include("../MVC/gabarit_site_eve.php");
                        }elseif(isset($_POST['sous_categorie']) && !empty($_POST['sous_categorie'])){

                              $reponse=afficher_evenement($db,$_POST['sous_categorie']);
                              $afficher_evenement=$reponse->fetchAll(PDO::FETCH_ASSOC);
                              $evenement[][] = array();
                                      
                              foreach($afficher_evenement as $afficher_evenement => $valeur1){
                                   foreach ($valeur1 as $cle2=>$valeur2){

                                          $evenement[$afficher_evenement][$cle2]=$valeur2;
                                   }
                                              
                              }
                          
                          
                              $head=head(null,null);
                              $nav=nav();
                              $evenements=evenements($evenement,null,$_POST['sous_categorie'],null);
                              $footer=footer();
                              include("../MVC/gabarit_site_eve.php");
                        }

                }elseif(isset( $_POST['date']) && $_GET['cible']=="evenement2"){

                      $reponse= afficher_evenement_filtre($db,formattageDateBDD($_POST['date']),$_POST['departement']);
                      if($reponse->rowcount()==0){
                    
                       
                            $vide=true;
                           
                            $head=head(null,null);
                            $nav=nav();
                            $evenements=evenements(null,null,null,$vide);
                            $footer=footer();
                            include("../MVC/gabarit_site_eve.php");
                    
                      }elseif(isset($_POST['date']) && !empty($_POST['date'])){
                    

                            $reponse=afficher_evenement_filtre($db,formattageDateBDD($_POST['date']),$_POST['departement']);
                            $evenement_filtre=$reponse->fetchAll(PDO::FETCH_ASSOC);
                            //print_r($evenement_filtre);

                                $evenement[][] = array();
                                $taille=0;

                                foreach($evenement_filtre as $evenement_filtre => $valeur1){ 
                                //echo "evenement n°:" . $evenement_filtre . "<br />";
                                    foreach ($valeur1 as $cle2=>$valeur2){
                                      //echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                                      $evenement[$evenement_filtre][$cle2]=$valeur2;
                                    }
                                    
                                }
                             //print_r($evenement);
                            $erreur=" ";
                            $head=head(null,null);
                            $nav=nav();
                            $evenements=evenements($evenement,formattageDateBDD($_POST['date']),null,null);
                            $footer=footer();
                            include("../MVC/gabarit_site_eve.php");
                      }

                }elseif($_GET['cible']=="evenement3"){

                           $titre=$categorie=$sous_categorie=$public=$horaire=$pays=$ville=$date=$departement=$lieu='';
                           $sql='';
                         
                           if (isset($_POST['RECHERCHER'])){$where = array();}
                         
                           if (isset($_POST['titre']) && strlen($titre = trim($_POST['titre']))){$where[] = "Titre LIKE '%".$titre."%'";}
                         
                           if (isset($_POST['categorie']) && strlen($categorie = trim($_POST['categorie']))) {$where[] = "Nom LIKE '%".$categorie."%'";}
                         
                           if (isset($_POST['sous_categorie']) && strlen($sous_categorie = trim($_POST['sous_categorie']))) {$where[] = "Sous_categorie LIKE '%".$sous_categorie."%'"; }
                         
                           if (isset($_POST['public']) && strlen($public = trim($_POST['public']))) {$where[]= "Type_de_public LIKE '%".$public."%'";}
                         
                           if (isset($_POST['horaire']) && strlen($horaire = trim($_POST['horaire']))) {$where[] = "Horaire LIKE '%".$horaire."%'";}
                           if (isset($_POST['pays']) && strlen($pays = trim($_POST['pays']))) {$where[] = "Pays LIKE '%".$pays."%'";}
                           if (isset($_POST['ville']) && strlen($ville = trim($_POST['ville']))) {$where[] = "Ville LIKE '%".$ville."%'";}
                           if (isset($_POST['date']) && strlen($date = trim($_POST['date']))) {$where[] = "Date_Eve LIKE '%".formattageDateBDD($date)."%'";}
                           if (isset($_POST['departement']) && strlen($departement = trim($_POST['departement'] ))) {$where[] = "Departement LIKE '%".$departement."%'";}
                           if (isset($_POST['lieu']) && strlen($lieu = trim($_POST['lieu']))) {$where[] = "Nom_Lieu LIKE '%".$lieu."%'";}
                        
                           if (empty($where)){

                                    $vide=true;
                                    $head=head(null,null);
                                    $nav=nav();
                                    $evenements=evenements(null,null,null,$vide);
                                    $footer=footer();
                                    include("../MVC/gabarit_site_eve.php");
                            }
                                         
                           else{
                                    $sql = "SELECT DISTINCT * FROM evenement e,  lieu l, categories c
                                            WHERE e.ID_Eve=l.evenement_ID_Eve and c.ID_categorie=e.categories_ID_categorie and ". implode(' AND ', $where) . " ";
                                            //echo $sql;

                                      $rep=afficher_evenement_recherche_avancee($db,$sql);
                                      
                                      if($rep->rowcount()==0)
                                      {
                                              $vide=true;
                                              $head=head(null,null);
                                              $nav=nav();
                                              $evenements=evenements(null,null,null,$vide);
                                              $footer=footer();
                                              include("../MVC/gabarit_site_eve.php");
                                      }
                                      elseif($rep->rowcount()>0){
                                                                                 
                                              $reponse=afficher_evenement_recherche_avancee($db,$sql);
                                              $recherche_avancee=$reponse->fetchAll(PDO::FETCH_ASSOC);
                                              //print_r($evenement_filtre);

                                                  $evenement[][] = array();
                                                  $taille = 0;

                                                  foreach($recherche_avancee as $recherche_avancee => $valeur1){ 
                                                  //echo "evenement n°:" . $recherche_avancee  . "<br />";
                                                      foreach ($valeur1 as $cle2=>$valeur2){
                                                        //echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                                                        $evenement[$recherche_avancee][$cle2]=$valeur2;}}
                                               //print_r($evenement);
                                              $erreur=" ";
                                              $head=head(null,null);
                                              $nav=nav();
                                              $evenements=evenements($evenement,null,null,null);
                                              $footer=footer();
                                              include("../MVC/gabarit_site_eve.php");
                                      }
               
                          }
                   
                } 

}
elseif(isset($_GET['cible']) && $_GET['cible']=="Ajout_eve_non_connectee"){
               require("../MVC/Vue/vue/non_connecte.php");

}elseif(isset($_GET['cible']) && $_GET['cible']=="validation_ins"){
                
                $_GET['reussite']="bom";

                include("../MVC/Vue/vue/non_connecte.php");

}elseif(isset($_GET['cible']) && $_GET['cible']=="Voirplus"){
                
                include("../MVC/Modele/utilisateurs.php");
                $key=$_GET['id_eve'];

                
                $reponse=Visualisation_eve($db,$key);
                $Visualisation=$reponse->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($evenement_filtre);
                $donnees= array();
                foreach($Visualisation as $Visualisation => $valeur1){ 
                        //echo "evenement n°:" . $evenement_filtre . "<br />";
                     foreach ($valeur1 as $cle2=>$valeur2){
                              //echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                        $donnees[$Visualisation][$cle2]=$valeur2;
                      }
                            
                }
                       
                     
                    $erreur=" ";
                    $head=head(null,null);
                    $nav=nav();
                    $Voir_plus_eve=Voir_plus_eve($donnees);
                    $footer=footer();
                    include("../MVC/gabarit_site_voir_plus.php");
                 
}elseif(isset($_GET['cible']) && $_GET['cible']=="signalement"){
                

                  include("../MVC/Modele/utilisateurs.php");
                  signale($db,$_GET['ideve']);

}else{
        if((isset($_GET['cible']) && $_GET['cible']=="accueil") || (isset($_GET['cible']) && $_GET['cible'] == "Admin") || !isset($_GET['cible'])){

              		$erreur=" ";
                  $head=head($erreur,null,null);
              		$nav=nav();
              		$H_eader=H_eader(null);
              		$Abas_dynamique=Abas_dynamique();
              		$footer=footer();
              		include("../MVC/gabarit_site.php");
       }

}



?>