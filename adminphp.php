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
<h2>Table client</h2>
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
    
    
    <button type = 'submit' value = 'modifier2' name = 'action'> Modifier </button>
    <button type = 'submit' value = 'supprimer' name = 'action'> Supprimer </button>
    
    </form>
    
    </div> " ;



 }

 
?>


            
</section>
<br><br><br>





<section>
<h2>Table Vehicule</h2>

<form method='GET'>
                    <input type="text" placeholder="immatricule" name="idvehicule" width="25%">    
                    <input type="text" placeholder="Nom" name="nomvehicule" width="25%">
                    <input type="text" placeholder="Marque" name="marquevehicule" width="25%">
                    <input type="text" placeholder="couleur" name="couleurvehicule" width="25%">
                    <input type="text" placeholder="Photo" name="photovehicule">
                   
                    <button type="submit" value="ajouter" name="action">Ajouter</button>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
 
                </form>

                <?php 


if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idvehicule'])){
  ajoutervehicule(); 
                       } 
                    ?>

<?php
                 
                if(isset($_GET['action'])  && !empty($_GET['idvehicule']) && !empty($_GET['nomvehicule']) && !empty($_GET['marquevehicule']) && !empty($_GET['couleurvehicule']) && !empty($_GET['photovehicule'])){

                          $ajouter = $pdo->prepare('INSERT INTO vehicule (id_vehicule, nom_vehicule, marque_vehicule, couleur_vehicule, photo_vehicule) VALUES  (:id_vehicule, :nom_vehicule, :marque_vehicule, :couleur_vehicule, :photo_vehicule)');
                            
                        
                          $ajouter->bindParam(':id_vehicule', $_GET['idvehicule'],
                          PDO::PARAM_STR);
                          $ajouter->bindParam(':nom_vehicule', $_GET['nomvehicule'],
                          PDO::PARAM_STR);
          
                          $ajouter->bindParam(':marque_vehicule', $_GET['marquevehicule'],
                          PDO::PARAM_STR);

                          $ajouter->bindParam(':couleur_vehicule', $_GET['couleurvehicule'],
                           PDO::PARAM_STR);

                          $ajouter->bindParam(':photo_vehicule', $_GET['photovehicule'],
                          PDO::PARAM_STR);
        
                          $estceok = $ajouter->execute();

                       

                     }
?>

<form method='GET'>
                    <input type="text" placeholder="immatricule" name="idvehicule" width="25%">    
                    <input type="text" placeholder="Nom" name="nomvehicule" width="25%">
                    <input type="text" placeholder="Marque" name="marquevehicule" width="25%">
                    <input type="text" placeholder="couleur" name="couleurvehicule" width="25%">
                    <input type="text" placeholder="Photo" name="photovehicule">
                   
                    
                    <button type="submit" value="modifier" name="action">Modifier</button>
                    
                </form>
                <?php 


if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['idvehicule'])){
 modifiervehicule(); 
                       } 
                    ?>


</section>
    
<section>
<?php 
 $recuperation = $pdo -> query ( 'SELECT * FROM vehicule');
 while ( $vehicule = $recuperation -> fetch ()) {
    echo  "<form> <div> <input type = 'text' name = 'idvehicule' value = '" . $vehicule ['id_vehicule']. "'>
    <input type = 'text' name = nomvehicule' value = '" . $vehicule ['nom_vehicule']. "'>
    <input type = 'text' name = 'marquevehicule' value = '" . $vehicule ['marque_vehicule']. "'>
    <input type = 'text' name = 'couleurvehicule' value = '" . $vehicule ['couleur_vehicule']. "'>
    <input type = 'text' name = 'photovehicule' value = '" . $vehicule ['photo_vehicule']. "'>
   
    
    
    <button type = 'submit' value = 'modifier' name = 'action'> Modifier </button>
    <button type = 'submit' value = 'supprimer' name = 'action'> Supprimer </button>
    
    </form>
    
    </div> " ;



 }

 ?>
 <br>

<section>
<h2>Table Location</h2>

<form method='GET'>
                    <input type="text" placeholder="idclient" name="idclient" width="25%">    
                    <input type="text" placeholder="idvehicule" name="idvehicule" width="25%">
                    <input type="text" placeholder="idlocation" name="idlocation">
                    <input type="date" placeholder="date" name="datedebutlocation" width="25%">
                    <input type="date" placeholder="date" name="datefinlocation" width="25%">
                
                    <button type="submit" value="ajouter" name="action">Ajouter</button>
                    

                </form>
                <?php 


if(isset($_GET['action']) && $_GET['action']=="ajouter"  && !empty($_GET['idlocation'])){
 ajouterlocation(); 
                       } 
                    ?>
                <?php

                if(isset($_GET['action'])  && !empty($_GET['idclient']) && !empty($_GET['idvehicule']) && !empty($_GET['idlocation']) && !empty($_GET['datedebutlocation']) && !empty($_GET['datefinlocation'])){

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
                    ?>
</section>

<br>
<?php


$query = $pdo->query('SELECT client.id_Client, Nom_Client, Prenom_Client, id_location, date_debut_location, date_fin_location, vehicule.id_vehicule, nom_vehicule, marque_vehicule FROM client
INNER JOIN location ON client.id_Client = location.id_Client
INNER JOIN vehicule ON location.id_vehicule = vehicule.id_vehicule
WHERE location.id_location');


//$reponse = $query->fetchAll(PDO::FETCH_ASSOC);
//$recuperation = $pdo->query('SELECT * FROM location');
while ($infos = $query->fetch()){

    echo"<form>
    <div>
    <input type='text' size='6' name='cp' value='".$infos['id_location']."'>
    <input type='text' size='6' name='id' value='".$infos['id_Client']."'>
    <input type='text' name='adresse' value='".$infos['Nom_Client']."'>
    <input type='text' size='6' name='cp' value='".$infos['Prenom_Client']."'>
    <input type='text' name='nom' value='".$infos['id_vehicule']."'>
    <input type='text' size='6' name='prenom' value='".$infos['marque_vehicule']."'>
    <input type='text' name='adresse' value='".$infos['nom_vehicule']."'>
    <input type='text' size='6' name='prenom' value='".$infos['date_debut_location']."'>
    <input type='text' name='adresse' value='".$infos['date_fin_location']."'>
    
   
    </form>
    </div>";   
}


//while($reponse as $infos)

?>


            
</section>


</body>

</html>



