<?php



try

{
$pdo = new PDO('mysql:host=localhost;dbname=livre2;port=3306;charset=utf8', 'root', '');

echo 'je suis connecte';
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
echo 'je ne suis pas connecte';
}

$MariaDB_query = $pdo->query("UPDATE livre SET nom_livre='tata' WHERE auteur_Livre='kolo'");
// var_dump($MariaDB_query);

?>
