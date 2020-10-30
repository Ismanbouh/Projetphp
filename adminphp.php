<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deficrudphp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <center>
                        <h1>Administration HERTZ</h1>

                        <p>
                            L'encyclopédie est éditée sur le site wikipedia.org, qui est devenu en quelques années l'un
                            des
                            plus consultés au monde. Les serveurs hébergeant le site sont financés par une fondation
                            américaine, la Wikimedia Foundation. Depuis son lancement officiel, Wikipédia est en grande
                            partie modifiable par la plupart de ses lecteurs. Les mêmes principes fondateurs de
                            rédaction
                            sont partagés par les différentes versions linguistiques, mais les pratiques d'écriture sont
                            convenues indépendamment par les internautes pour chacune d'elles.</p>
                    </center>
                </div>
            </div>
        </div>


        <?php



try

{
$pdo = new PDO('mysql:host=localhost;dbname=administration_php;port=3306;charset=utf8', 'root', '');


}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
echo 'je ne suis pas connecte';
}


?>
    </section>

    <section>

        <div class="container-fluid">
            <div class="row">
                <form method='GET'>
                    <input type="text" placeholder="idclient" name="idclient" width="25%">    
                    <input type="text" placeholder="Nom" name="nomclient" width="25%">
                    <input type="text" placeholder="Prenom" name="prenomclient" width="25%">
                    <input type="text" placeholder="Adresse" name="Adresseclient" width="25%">
                    <input type="text" placeholder="Ville" name="villeclient" width="25%">
                    <input type="text" placeholder="Code Postale" name="codepostalclient" width="25%">
                    
                    <button type="submit" value="ajouter" name="action">Ajouter</button>
                    
                </form>
                <?php 


if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idclient'])){
  ajouterclient(); 
                       } 
                    ?>
            <?php
                 
                if(isset($_GET['action'])  && !empty($_GET['nomclient']) && !empty($_GET['prenomclient']) && !empty($_GET['Adresseclient']) && !empty($_GET['villeclient']) && !empty($_GET['codepostalclient'])){

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

                       

                     }
            ?>
  <br>

    </section>
    
    <form method='GET'>
                    <input type="text" placeholder="idclient" name="idclient" width="25%">    
                    <input type="text" placeholder="Nom" name="nomclient" width="25%">
                    <input type="text" placeholder="Prenom" name="prenomclient" width="25%">
                    <input type="text" placeholder="Adresse" name="Adresseclient" width="25%">
                    <input type="text" placeholder="Ville" name="villeclient">
                    <input type="text" placeholder="Code Postale" name="codepostalclient" width="25%">
                    
                    <button type="submit" value="modifier" name="action">Modifier</button>
                    
                </form>

                    <?php 

include "fonction.php" ;
if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['idclient'])){
  modifierclient(); 
                       } 
                    ?>
          
                        
    </section>



   

<section>

              <form method='GET'>
                    <input type="text" placeholder="idclient" name="idclient" width="25%">    
                    <input type="text" placeholder="Nom" name="nomclient" width="25%">
                    <input type="text" placeholder="Prenom" name="prenomclient" width="25%">
                    <input type="text" placeholder="Adresse" name="Adresseclient" width="25%">
                    <input type="text" placeholder="Ville" name="villeclient">
                    <input type="text" placeholder="Code Postale" name="codepostalclient" width="25%">
                    
                    <button type="submit" value="supprimer" name="action">supprimer</button>
                    
                </form>

                <?php 



if(isset($_GET['action']) && $_GET['action']=="supprimer"  && !empty($_GET['idclient'])){
  supprimerclient(); 
                       } 
                    ?>
                <?php
                    
                if(isset($_GET['action']) && $_GET['action']=="supprimer"  && !empty($_GET['idclient'])  ){

                      $Supprimer= $pdo->prepare('DELETE FROM client WHERE id_Client =:id_Client');
                      $Supprimer->bindParam(':id_Client', $_GET['idclient'],
                      PDO::PARAM_STR);

                      $estceokK = $Supprimer->execute();
                  if($estceokK){
                     echo 'votre enregistrement a été ajouté avec succés';


                  } else {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                     }

                 }



                ?>

</section>
<br><br>
<section>
<?php 
 $recuperation = $pdo -> query ( 'SELECT * FROM client');
 while ( $client = $recuperation -> fetch ()) {
    echo  "<form> <div> <input type = 'text' name = 'idclient' value = '" . $client ['id_Client']. "'>
    <input type = 'text' name = 'nomclient' value = '" . $client ['Nom_Client']. "'>
    <input type = 'text' name = 'prenomclient' value = '" . $client ['Prenom_Client']. "'>
    <input type = 'text' name = 'Adresseclient' value = '" . $client ['Adresse_Client']. "'>
    <input type = 'text' name = 'villeclient' value = '" . $client ['Ville_Client']. "'>
    <input type = 'text' name = 'codepostalclient' value = '" . $client ['Code_Postale_Client']. "'>
    
    
    <button type = 'submit' value = 'modifier2' name = 'action'> Modificateur </button>
    <button type = 'submit' value = 'supprimer' name = 'action'> Supprimer </button>
    
    </form>
    
    </div> " ;



 }

 
?>


            
</section>
<br><br><br>

    



</body>

</html>



