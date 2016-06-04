<?php
require_once("../MVC/Controleur/connexion.php");
//require_once("../MVC/Controleur/connexion2.php");
//require("../MVC/Vue/vue/non_connecte.php");
function afficher_categories($db){
		$reponse=$db->query('SELECT ID_categorie,Nom,Sous_categorie FROM categories');
 		return $reponse;
}
function mdp($db,$login,$mot_de_passe){
$reponse =$db->query('SELECT Login,Mot_de_passe FROM membre WHERE Login="'.$login.'" OR Mot_de_passe="'.$mot_de_passe.'"');
 return $reponse;
}
function utilisateurs($db){
$reponse=$db->query('SELECT Login FROM membre');
 return $reponse;
}

function Nom_prenom($db,$Donne){
$reponse=$db->query('SELECT Nom,Prenom,Sexe,Photo_profil,Type,centre_interet FROM membre where Login="'.$Donne.'"');
 return $reponse;
}
function RajouterEve($db,$Titre,$Descriptif,$Type_de_Public,$Site_web,$Date_Eve,$Prix,$Horaire,   $nom_categorie_evenement,$nom_sous_categorie,  $Adresse,$Departement,$Ville,$nom_sponsor,$photo){



$categories =$db->prepare('INSERT INTO categories (Nom,Sous_categorie) VALUES (?,?)');
$categories->execute(array($nom_categorie_evenement,$nom_sous_categorie));

$reponse=$db->lastInsertId();
 $login=$_SESSION["LOGIN"];

$evenement =$db->prepare('INSERT INTO evenement (Titre,Descriptif,Type_de_Public,Site_web,Date_Eve,Prix,Horaire,membre_Login,categories_ID_categorie) VALUES(?,?,?,?,?,?,?,?,?)');
$evenement->execute(array($Titre,$Descriptif,$Type_de_Public,$Site_web,formattageDateBDD($Date_Eve),$Prix,$Horaire,$login,$reponse));

//$re=$db->lastInsertId($evenement,$db);
$rep=$db->lastInsertId();
$id_illustration=$rep;
//echo $rep;

$lieu =$db->prepare('INSERT INTO lieu (Adresse,Departement,Ville,evenement_ID_Eve) VALUES (?,?,?,?)');
$lieu->execute(array($Adresse,$Departement,$Ville,$rep));

$images =$db->prepare('INSERT INTO images (Nom_image) VALUES (?)');
$images->execute(array($photo));


$rep3=$db->lastInsertId();
$id_ill=$rep3;

$est_illustre =$db->prepare('INSERT INTO est_illustre (evenement_ID_Eve,images_Id_image) VALUES (?,?)');
$est_illustre->execute(array($rep,$id_ill));                               

$sponsor =$db->prepare('INSERT INTO sponsor (Nom) VALUES (?)');
$sponsor->execute(array($nom_sponsor));

$id_s=$db->lastInsertId();
$id=$id_s;

$sponsorise=$db->prepare('INSERT INTO sponsorise (sponsor_ID_sponsor,evenement_ID_Eve) VALUES (?,?)');
$sponsorise->execute(array($id,$rep));



header('Location:https://localhost/Projet-web-isep-mvc/MVC/index.php?cible=Voirplus&id_eve='.$rep.'');
}

function cherche_image($db,$ID_eve){
	$reponse=$db->query('SELECT DISTINCT Nom FROM images i, evenement e,est_illustre e_i Where e_i.evenement_ID_Eve="'.$ID_eve.'"  AND e_i.images_Id_image =i.Id_image');
 	return $reponse;
	}

function afficher_evenement($db,$sous_categorie){

	$reponse=$db->query('SELECT DISTINCT * FROM evenement,categories,lieu WHERE evenement.categories_ID_categorie=categories.ID_categorie and evenement.ID_Eve = lieu.evenement_ID_Eve and categories.Sous_categorie="'.$sous_categorie.'"' 

						 );
 	
 	return $reponse;
}


function afficher_evenement_filtre($db,$date,$departement){
$reponse=$db->query('SELECT DISTINCT * 
					 FROM evenement e,  lieu l 
					 WHERE e.date_Eve = "'.$date.'" and 
					 e.ID_Eve = l.evenement_ID_Eve and 
					 	   l.Departement = "'.$departement.'"');
//print_r($reponse);
 	return $reponse;
}





function Visualisation_eve($db,$key){

$reponse=$db->query('SELECT DISTINCT * 
					 FROM evenement e,  lieu l, images i, est_illustre e_i,sponsor s, sponsorise sp
					 WHERE e.ID_Eve="'.intval($key).'" and e_i.evenement_ID_Eve=e.ID_Eve and e_i.images_Id_image=i.Id_image and l.evenement_ID_Eve="'.intval($key).'" 
					 and sp.evenement_ID_Eve="'.intval($key).'" and s.ID_sponsor=(SELECT sp.sponsor_ID_sponsor from sponsorise as sp WHERE sp.evenement_ID_Eve="'.intval($key).'") ');
//print_r($reponse);

 	return $reponse;
}


function MES_EVE_bd($db,$login){
$login=$_SESSION['LOGIN'];
$reponse=$db->query('SELECT * 
					 FROM evenement e,  lieu l 
					 WHERE e.membre_Login = "'.$login.'"');
//print_r($reponse);
 	return $reponse;
}


function supprime_eve($db,$ideve,$login){
$reponse1=$db->query('SELECT sponsor_ID_sponsor 
					 FROM sponsorise 
					 where evenement_ID_Eve="'.$ideve.'"')->fetch();
$spid=$reponse1['sponsor_ID_sponsor'];
echo $spid;
$reponse2=$db->query('DELETE
					 FROM sponsor 
					 where ID_sponsor="'.$spid.'"');
$reponse2->execute();

$reponse3=$db->query('SELECT categories_ID_categorie 
					 FROM evenement 
					 where ID_Eve="'.$ideve.'"')->fetch();
$cid=$reponse3['categories_ID_categorie'];
echo '';
echo $cid;
$reponse4=$db->query('DELETE   
					 FROM evenement 
					 WHERE ID_Eve = "'.$ideve.'" and 
					 membre_Login="'.$login.'" and 
					 categories_ID_categorie="'.$cid.'"');
$reponse4->execute();

$repons5=$db->query('DELETE 
					 FROM categories 
					 where ID_categorie="'.$cid.'"');

header('Location:https://localhost/Projet-web-isep-mvc/MVC/index.php?cible=accueil');
 	
}

function afficher_evenement_recherche_avancee($db,$sql){


	$requete = $db->query($sql);
	//$requete->execute();
	return $requete;
}
function compte($db,$Login,$nom,$prenom,$Date_naissance,$adresse,$ville,$region,$sexe,$email1,$pwd1,$photo_profil,$type,$centre_interets){
	$date=formattageDateBDD($Date_naissance);
	$user = $db-> prepare('INSERT INTO membre (Login,Nom,Prenom,Date_naissance,Adresse,Ville,Region,Sexe,E_mail,Mot_de_passe,Photo_profil,Type,centre_interet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $user -> execute(array($Login,$nom,$prenom,$date,$adresse,$ville,$region,$sexe,$email1,$pwd1,$photo_profil,$type,$centre_interets));

}
function del_user($db,$del){
			
				$ruser_del=$db->query('DELETE FROM membre where Login="'.$del.'"');
				$ruser_del->execute();
}
function formattageDateBDD($date)
{
        $partie = explode('/', $date);
        return $dateBDD = $partie[2].'-'.$partie[1].'-'.$partie[0];

}


function signale($db,$idEVE){
					$k=0;
 				  $evenement =$db -> prepare('UPDATE evenement SET signalement=signalement+1 WHERE ID_Eve="'.$idEVE.'"'); 
                  $evenement->execute();
                  
                  $reponse3 = $db-> query ('SELECT signalement FROM evenement WHERE ID_Eve="'.$idEVE.'"');
                  while($donnes3=$reponse3->fetch()){$signaler[$k] = $donnes3['signalement'];}
                  
                  if ($signaler[$k]>20){
                    $evenement = $db-> prepare('DELETE FROM evenement WHERE ID_Eve="'.$idEVE.'"'); 
                    $evenement->execute();
                    echo 'Suite à un nombre important de signalement, l\'événement sera retiré d\'eveandgo</br>';
                    echo '<a href="../../index.php">Revenir à la page d\'accueil</a>';
                    header('Location:../../index.php');
                  }
                  elseif($signaler[$k]<20) {
                    echo 'Vous avez signalé cet événement</br>';
                    echo '<a href="../../index.php">Revenir à la page d\'accueil</a></br>';
                    echo '<a href="http://localhost/Projet-web-isep-mvc/MVC/index.php?cible=Voirplus&id_eve='.$idEVE.'">Revenir à la page précédente</a>';
                  }
                

                else {
                  header('Location:http://localhost/Projet-web-isep-mvc/MVC/index.php?cible=Voirplus&id_eve='.$idEVE.'');
                }

}

?>