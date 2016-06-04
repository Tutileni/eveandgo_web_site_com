<?php



function formattageFr($date1)
{

        $partie = explode('-', $date1);
        return $dateBDD = $partie[2].'/'.$partie[1].'/'.$partie[0];

}
               


session_start();
require("../MVC/Modele/connexion_db.php");
require("../MVC/Vue/vue/parties_html.php");


if(!isset($_SESSION["LOGIN"]))
{ // L'utilisateur n'est pas connecté
         // On utilise un controleur secondaire pour éviter d'avoir un fichier index.php trop gros
        include("../MVC/Controleur/connexion.php");
        
}else{ // L'utilisateur est connecté
        if(isset($_GET['cible'])) 
        { // on regarde la page où il veut aller
            if($_GET['cible'] == "accueil")
            {   include("../MVC/Vue/vue/accueil.php");

            }elseif($_GET['cible']=="deconnexion"){
                // Détruit toutes les variables de session
                $_SESSION = array();
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(),'', time()-42000,'/');
                }
                    session_destroy();
                    header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=accueil');
                    exit();

            }elseif($_GET['cible']=="evenement" || $_GET['cible']=="evenement1" || $_GET['cible']=="evenement2" || $_GET['cible']=="Voirplus" || $_GET['cible']=="evenement3" || $_GET['cible']=="signalement" || $_GET['cible']=="detail_eve"){
                include("../MVC/Controleur/connexion.php");

            }elseif($_GET['cible']=="Referencer_eve" && $_GET['cible']!="deconnexion"){
                include("../MVC/ajout_eve.php"); 

            }elseif($_GET['cible']=="ajouter_eve" && $_GET['cible']!="deconnexion"){
    
                 
                if(empty($_POST['Titre']) 
                    || empty($_POST['Descriptif']) 
                    || empty($_POST['Ville']) 
                    || empty($_POST['nom_sponsor']) 
                    || empty($_POST['nom_sous_categorie']) 
                    || empty($_POST['Type_de_Public']) 
                    || empty($_POST['Site_web']) 
                    || empty($_POST['Date_Eve'])  
                    || empty($_POST['Horaire']) 
                    || empty($_POST['nom_categorie_evenement']) 
                    || empty($_POST['Adresse']) 
                    || empty($_POST['Departement'])) {

                            $ch_vide="Vous n'avez pas rempli Tous les champs!";
                            $head=head(null,null);
                            $nav=nav();
                            $H_eader=H_eader($_SESSION["C_I"]);
                            $AjoutEve=AjoutEve($ch_vide);
                            $footer=footer();
                            include("../MVC/gabarit_ajout_eve.php");
                }else{
                             include("../MVC/Modele/utilisateurs.php");
                                                         
                             $prix=(empty($_POST['Prix']) && !empty($_POST['gratuit'])) || $_POST['Prix']==0?'Gratuit':$_POST['Prix']; 

                             if(isset($_FILES['fichier']['tmp_name'])){    

                                    $chemain_rep = 'C:/xampp/htdocs/eveandgo_web_site_com/MVC/Vue/images/imageEve/';
                                        $ext = strtolower( pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION) );
                                        $file=uniqid().'.'.$ext;
                                        $nouveu_ch=$_FILES['fichier']['tmp_name'];
                                         //**** on bouge l'image
                                        
                                        move_uploaded_file($nouveu_ch, "$chemain_rep/$file");
                                         
                                        $photo = $file;
                                        RajouterEve($db,$_POST['Titre'],$_POST['Descriptif'],$_POST['Type_de_Public'],$_POST['Site_web'],$_POST['Date_Eve'],$prix,$_POST['Horaire'],$_POST['nom_categorie_evenement'],$_POST['nom_sous_categorie'],$_POST['Adresse'],$_POST['Departement'],$_POST['Ville'],$_POST['nom_sponsor'],$photo);
                                    
                             }
                                    
                }
                
            }elseif($_GET['cible'] == "Admin" && $_GET['cible']!="deconnexion"){
                
                if((isset($_SESSION["LOGIN"]) && $_SESSION["TYPE"]!=1) || !isset($_SESSION["LOGIN"])){

                    header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php');
                }else{

                $erreur=" ";
                $head=head($erreur,null,null);
                $nav=nav();
                $H_eader=H_eader($_SESSION["C_I"]);
                $back_office=back_office();
                $footer=footer();
                include("../MVC/gabarit_site_admin.php");
                }

            }elseif($_GET['cible'] == "mesevenements"){
                
                include("../MVC/Modele/utilisateurs.php");

                $reponse=MES_EVE_bd($db,$_SESSION['LOGIN']);
                $even=$reponse->fetchAll(PDO::FETCH_ASSOC);
                $evenement = array();
                $nb=0;
                foreach($even as $even => $valeur1){ 
                     //echo "evenement n°:" . $evenement_filtre . "<br />";
                     foreach ($valeur1 as $cle2=>$valeur2){
                              //echo "Clé : ".$cle2 ."-- Valeur: " . $valeur2 . "<br />\n";
                              $evenement[$even][$cle2]=$valeur2;

                    }
                         
                }    

                $erreur=" ";
                $head=head(null,null);
                $nav=nav();
                $Mes_eve=Mes_eve($evenement,$erreur,$nb);
                $footer=footer();
                include("../MVC/gabarit_site_mes_eve.php");        
                    
                    

            }elseif($_GET['cible'] == "Supprime_eve"){

                $ideve=$_GET['ideve'];
                include("../MVC/Modele/utilisateurs.php");
                supprime_eve($db,$ideve,$_SESSION['LOGIN']);

            }elseif($_GET['cible'] == "update_profil"){

                    $head=head(null,null);
                    $nav=nav();
                    $H_eader=H_eader(null);
                    $inscription=inscription(null);
                    $footer=footer();
                    include("../MVC/gabarit_site-ins.php");

            }elseif($_GET['cible'] == "delet_user"){

                include("../MVC/Modele/utilisateurs.php");
                if (isset($_GET['del']) and !empty($_GET['del']))del_user($db,$_GET['del']);
                header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=Admin');
            } 

              
        }else{ 
            
                  include("../MVC/Vue/vue/accueil.php"); 
        }

}
