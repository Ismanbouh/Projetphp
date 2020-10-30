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


}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
echo 'je ne suis pas connecte';
}
return $pdo;
}

function ajouterclient(){

    if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idclient'])){
        ajouterclient(); 
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

?>

