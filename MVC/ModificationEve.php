<?php header('Content-Type: text/html; charset=iso-8859-1');?>
<?php
function formattageDateBDD($date)
{
        $partie = explode('/', $date);
        return $dateBDD = $partie[2].'-'.$partie[1].'-'.$partie[0];

}

if(isset($_GET['ideve'])){


$ville=$_POST['ville'];
$adresse=$_POST['Adresse'];

$titre=$_POST['titre'];
$date=formattageDateBDD($_POST['date_Eve']);
$descript=$_POST['descriptif'];
$public=$_POST['public'];
$tarif=$_POST['tarif'] ;
$organisateur=$_POST['organisateur'];

$horaire=$_POST['horaire'];

$sponsor=$_GET['sponsor'];


        require("../MVC/Modele/connexion_db.php");
        $actualiser=$db->prepare('UPDATE  evenement SET Titre=?, Descriptif=?, Type_de_Public=?, Date_Eve=?, Prix=?, Horaire=? WHERE ID_Eve='.$_GET['ideve'].'');
        
        $actualiser->execute(array($titre,$descript,$public,$date,$tarif,$horaire));

        $act_lieu=$db->prepare('UPDATE  lieu SET  Ville="'.$ville.'", Adresse="'.$adresse.'" WHERE evenement_ID_Eve='.$_GET['ideve'].' ');
        $act_lieu->execute();

        $act_spos=$db->prepare('UPDATE  sponsor,sponsorise
                                SET  Nom="'.$organisateur.'"
                                 where sponsorise.evenement_ID_Eve="'.$_GET['ideve'].'" and sponsor.ID_sponsor="'.$sponsor.'" ');
        
        $act_spos->execute();



        if(isset($_FILES['fichier']['tmp_name']) && !empty($_FILES['fichier']['tmp_name'])){            
                                               //******* On renomme l'image de manière aléatoire pour éviter un conflit dans le dossier (2 fois le même nom par exemple
                $chemain_rep = 'C:/xampp/htdocs/eveandgo_web_site_com/MVC/Vue/images/imageEve/';
                $ext = strtolower( pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION) );
                $file=uniqid().'.'.$ext;
                $nouveu_ch=$_FILES['fichier']['tmp_name'];
                                         //**** on bouge l'image
                move_uploaded_file($nouveu_ch, "$chemain_rep/$file");
                $photo = $file;




                $images=$db->prepare('UPDATE images,est_illustre,evenement  
                                      SET Nom_image=? 
                                      where evenement.ID_Eve="'.$_GET['ideve'].'" and est_illustre.evenement_ID_Eve="'.$_GET['ideve'].'" 
                                      and images.Id_image in (SELECT images_Id_image 
                                                              from est_illustre 
                                                              where est_illustre.evenement_ID_Eve="'.$_GET['ideve'].'")

                                        ');
                $images->execute(array($photo));

                

        }




        




         //echo '<script>alert("VOS MODIFICATION ONT BIEN ETE REALISEES !\n");</script>';
            header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=Voirplus&id_eve='.$_GET['ideve'].'&modif=ok');
}elseif(isset($_GET['profilupdate'])){

        require("../MVC/Modele/connexion_db.php");


                    if(isset($_FILES['photoprofil']['tmp_name']) && !empty($_FILES['photoprofil']['tmp_name'])){ 
                    $chemain_rep = 'C:/xampp/htdocs/eveandgo_web_site_com/MVC/Vue/images/imageProfil/';
                    $ext = strtolower( pathinfo($_FILES['photoprofil']['name'], PATHINFO_EXTENSION) );
                    $file=uniqid().'.'.$ext;
                    $nouveu_ch=$_FILES['photoprofil']['tmp_name'];
                    move_uploaded_file($nouveu_ch, "$chemain_rep/$file");
                    $photo_profil = $file;}
                    $photo_profil=isset($photo_profil)?', ':' ';
                    $adresse1=$_POST['adresse1']; 
                    $_POST['adresse1'];
                    $adresse=$adresse1;
                    $email1=$_POST['e_mail1'];
                    $email2=$_POST['e_mail2'];
                    $pwd1=$_POST['password1'];
                    $pwd2=$_POST['password2'];
                    
                    echo $_POST['password1'];

        $updateprofil=$db->prepare('UPDATE  membre SET Login="'.$_POST['Login'].'", Nom="'.$_POST['nom'].'", Prenom="'.$_POST['prenom'].'", Date_naissance="'.formattageDateBDD($_POST['Date_naissance']).'", Adresse="'.$adresse.'", Region="'.$_POST['region'].'", Sexe="'.$_POST['sexe'].'", E_mail="'.$email1.'" ,Photo_profil="'.$photo_profil.'",centre_interet="'.$_POST['centre_interets'].'", Mot_de_passe="'.$pwd1.'" 
                                    WHERE Login="'.$_GET['profilupdate'].'"');
        $updateprofil->execute();

        
            header('Location:https://localhost/eveandgo_web_site_com/MVC/index.php?cible=Admin');  

}
 
?>

  