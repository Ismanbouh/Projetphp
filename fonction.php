<?php
function modifierclient(){
    $message = '';
                        $modifier = connectionbd()->prepare('UPDATE client SET Nom_Client=:Nom_Client, Prenom_Client=:Prenom_Client, Adresse_Client=:Adresse_Client, Ville_Client=:Ville_Client, Code_Postale_Client=:Code_Postale_Client  WHERE id_Client=:id_Client');
                        $modifier->bindParam(':id_Client', $_GET['idclient'], 
                        PDO::PARAM_STR);
                        $modifier->bindParam(':Nom_Client', $_GET['nomclient'], 
                        PDO::PARAM_STR);
                        $modifier->bindParam(':Prenom_Client', $_GET['prenomclient'], 
                        PDO::PARAM_STR);
                        $modifier->bindParam(':Adresse_Client', $_GET['Adresseclient'], 
                        PDO::PARAM_STR);
                        $modifier->bindParam(':Ville_Client', $_GET['villeclient'], 
                        PDO::PARAM_STR);
                        $modifier->bindParam(':Code_Postale_Client', $_GET['codepostalclient'], 
                        PDO::PARAM_STR);
                        
                        
                        // $modifier->bindParam(':colonnes', $_GET['colonne'], 
                        // PDO::PARAM_STR);
                        
                       $modifier = $modifier->execute();
                        // $modifier->debugDumpParams();
                         //die;
                            if($modifier){
                                echo 'votre enregistrement a bien été modifié';
                                
                            
                            } else {
                                echo 'Veuillez recommencer svp, une erreur est survenue';
                            }
                        }
                



function connectionbd(){

    
try

{
$pdo = new PDO('mysql:host=localhost;dbname=administration_php;port=3306;charset=utf8', 'root', '');
return $pdo;

}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
echo 'je ne suis pas connecte';
}

}

function ajouterclient(){

    if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idclient'])){
        //ajouterclient(); 
    $ajouter = $pdo->prepare('INSERT INTO client (Nom_Client, Prenom_Client, Adresse_Client, Ville_Client, Code_Postale_Client) VALUES  (:Nom_Client, :Prenom_Client, :Adresse_Client, :Ville_Client, :Code_Postale_Client)');
    $ajouter->bindParam(':Nom_Client', $_GET['nomclient'],
                          PDO::PARAM_STR);
                          $ajouter->bindParam(':Prenom_Client', $_GET['prenomclient'],
                          PDO::PARAM_STR);
          
                          $ajouter->bindParam(':Adresse_Client', $_GET['Adresseclient'],
                          PDO::PARAM_STR);

                          $ajouter->bindParam(':Ville_Client', $_GET['villeclient'],
                           PDO::PARAM_STR);

                          $ajouter->bindParam(':Code_Postale_Client', $_GET['codepostalclient'],
                          PDO::PARAM_STR);
        
                          $estceok = $ajouter->execute();
                          
                          if($estceok){
                            echo 'votre enregistrement a bien été modifié';
                            
                        
                        } else {
                            echo 'Veuillez recommencer svp, une erreur est survenue';
                        }
                    
}   



}
function supprimerclient(){
if(isset($_GET['action']) && $_GET['action']=="supprimer"  && !empty($_GET['idclient'])  ){

    $Supprimer= connectionbd()->prepare('DELETE FROM client WHERE id_Client =:id_Client');
    $Supprimer->bindParam(':id_Client', $_GET['idclient'],
    PDO::PARAM_STR);

    $estceokK = $Supprimer->execute();
if($estceokK){
   echo 'votre enregistrement a été ajouté avec succés';


} else {
  echo 'Veuillez recommencer svp, une erreur est survenue';
   }

}



}



function ajoutervehicule(){

    if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idvehicule'])){
        $pdo=connectionbd();
 
        $ajouter = $pdo->prepare('INSERT INTO vehicule ( nom_vehicule, marque_vehicule, couleur_vehicule, photo_vehicule) VALUES  (:nom_vehicule, :marque_vehicule, :couleur_vehicule, :photo_vehicule)');
                            
                    
        $ajouter->bindParam(':nom_vehicule', $_GET['nomvehicule'],
        PDO::PARAM_STR);

        $ajouter->bindParam(':marque_vehicule', $_GET['marquevehicule'],
        PDO::PARAM_STR);

        $ajouter->bindParam(':couleur_vehicule', $_GET['couleurvehicule'],
         PDO::PARAM_STR);

        $ajouter->bindParam(':photo_vehicule', $_GET['photovehicule'],
        PDO::PARAM_STR);

        $estceok = $ajouter->execute();
        $ajouter->debugDumpParams();
     

   }



}
function modifiervehicule(){
    $message = '';
    $modifier = connectionbd()->prepare('UPDATE vehicule SET  nom_vehicule=:nom_vehicule, marque_vehicule=:marque_vehicule, couleur_vehicule=:couleur_vehicule, photo_vehicule=:photo_vehicule  WHERE id_vehicule=:id_vehicule');
    $modifier->bindParam(':id_vehicule', $_GET['idvehicule'],
    PDO::PARAM_STR);
    $modifier->bindParam(':nom_vehicule', $_GET['nomvehicule'],
    PDO::PARAM_STR);

    $modifier->bindParam(':marque_vehicule', $_GET['marquevehicule'],
    PDO::PARAM_STR);

    $modifier->bindParam(':couleur_vehicule', $_GET['couleurvehicule'],
     PDO::PARAM_STR);

    $modifier->bindParam(':photo_vehicule', $_GET['photovehicule'],
    PDO::PARAM_STR);

    $estceok = $modifier->execute();

 


                            if( $estceok){
                                echo 'votre enregistrement a bien été modifié';
                                
                            
                            } else {
                                echo 'Veuillez recommencer svp, une erreur est survenue';
                            }
                        
                        }

                        function ajouterlocation(){

                            if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idlocation'])){
                                ajouterlocation(); 
                         
                                $ajouter = $pdo->prepare('INSERT INTO location (id_Client, id_vehicule, date_debut_location, date_fin_location, id_location) VALUES  (:id_Client, :id_vehicule, :date_debut_location, :date_fin_location, :id_location)'); 

                                $ajouter->bindParam(':id_Client', $_GET['idclient'],
                                      PDO::PARAM_STR);
                                      $ajouter->bindParam(':id_vehicule', $_GET['idvehicule'],
                                      PDO::PARAM_STR);
                      
                                      $ajouter->bindParam(':date_debut_location', $_GET['datedebutlocation'],
                                      PDO::PARAM_STR);
            
                                      $ajouter->bindParam(':date_fin_location', $_GET['datefinlocation'],
                                       PDO::PARAM_STR);
            
                                      $ajouter->bindParam(':id_location', $_GET['idlocation'],
                                      PDO::PARAM_STR);
                    
                                      $estceok = $ajouter->execute();
            
                                   
            
                                 }
                             
                        
                           }
                        
                        
                        
                        

?>

