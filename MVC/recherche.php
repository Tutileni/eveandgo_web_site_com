<?php header('Content-Type: text/html; charset=iso-8859-1');?>
<?php



function formattageFr($date1)
{

        $partie = explode('-', $date1);
        return $dateBDD = $partie[2].'/'.$partie[1].'/'.$partie[0];

}
require("../MVC/Modele/connexion_db.php");
 $search = $_POST['search'];

 print(' 
                    <style>

                       .dg{
                                  
                                   
                                    height:200px;
                                    
                                    padding: 20px;
                                    padding-left:10px;
                                    padding-right:0px;
                                    
                                    font-size: 12px;
                                    display: block;
                                    position:relative;
                                    border: 1px solid#999;clear:both;
                                    float: left;width: 936px;background: #fff;
                                    left:0%;
                                    right:0%;

                                    

                            }
                            .imag_ch,img>.imag_ch{
                                height:200px;width: 300px;
                                float:left;
                                margin:2px 2px 325px px;
                                padding-bottom:10px;
                            }
                             .titre>ul li,.titre> a{
                                font-size:18px;
                                
                                list-style-type:none ! important;
                            }                       
                            .lg{
                               height:200px;
                                
                                width: 500px;
                                float:left;
                                
                                
                                padding-left:100px;
                                font-family:arial,sans serif;
                                list-style-type:none;

                                }
                                .lg ul{
                                    list-style-type:none;
                                }
                               
                            
  #monter {
    top: 0%;
    margin-bottom: 800px;
    margin-top: -570px;
}
                    </style>');


                   //$terme = $_POST['termeRecherche'] ;
if(empty($search)){

    print(' 
                    <style>
                                .resultat{
                                    float:left;
                                    margin-left:325px;margin:8%;

                                 }
                            
  
                    </style>');
    echo '<p style=" color: #FE0000;text-align: left;"><img src="../MVC/Vue/images/alarm.png" alt="Concert 1">&nbsp;&nbsp;&nbsp;Veuillez taper au moins 2 caractères corrects.</p>';
}       
else{
                        require("../MVC/Modele/connexion_db.php");
                        $sth=$db->prepare('SELECT * FROM evenement WHERE Descriptif LIKE ?');
                        $sth->execute(array('%'.$search.'%'));
                        $reponse = $sth->fetchAll();
                        if(empty($reponse))
                        { print('
                                <style>
                                            .resultat{
                                                float:left;
                                                margin-left:325px;
                                                margin:8%;

                                            }
                                        
              
                                </style>');
                            echo '<p style=" color: #FE0000;text-align: left;"><img src="../MVC/Vue/images/alarm.png" alt="Concert 1">&nbsp;&nbsp;&nbsp;Aucun résultat n\'a été trouvé pour cet événement.</p>';}
                        else{
                        
                        $evenement[][] = array();
                        $taille=0;

                        foreach($reponse as $reponse => $valeur1){
                            foreach ($valeur1 as $cle2=>$valeur2){
                                $evenement[$reponse][$cle2]=$valeur2;
                            }
                                
                        }
                    $i=0;
                     echo '<div id="monter">';
                    while($i<count($evenement)){
                        
                    
                        $img=$db->query('SELECT DISTINCT Nom_image FROM evenement e,images i,est_illustre e_i WHERE  e_i.evenement_ID_Eve='.$evenement[$i]['ID_Eve'].' and e_i.images_Id_image=Id_image')->fetchAll(PDO::FETCH_ASSOC);
                           
                            foreach($img as $img => $val1)
                            {
                                 foreach ($val1 as $cle2=>$val2)
                                 {  $nom_img[$img][$cle2]=$val2;
                                            print('     
                                            <br>
                                            
                                            <div class = "dg">');
                                            echo '<img src="../MVC/Vue/images/imageEve/'.$nom_img[$img][$cle2].'" class="imag_ch" alt="Concert 1">';
                                            print('<div class = "lg">
                                                <h2><li class = "titre"><a href="concert 1">'.strtoupper($evenement[$i]['Titre']).'</a></li></h2>
                                                    <ul>
                                                        <li>'.formattageFr($evenement[$i]['Date_Eve']).'</li>
                                                        <li>'.$evenement[$i]['Prix'] .'&nbsp;&nbsp;&euro;</li>
                                                        <li>'.$evenement[$i]['Type_de_Public'].'</li>
                                                        <li>'.$evenement[$i]['Horaire'].'</li>
                                                        <li><a href="../MVC/index.php?cible=Voirplus&id_eve='.$evenement[$i]['ID_Eve'].'">Voir plus...</a></li>
                                                    </ul>
                                                </div>');
                                                
                                            echo '</div>';  
                                }
                                        
                            }

                                    
                     $i++;} 
                     echo '</div>'; 
                 }
                     } 
?>

  