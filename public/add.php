<?php

var_dump($_POST);

function baseConnect(){

        $host = "localhost"; 
        $user = "root";
        $password = "Wild59";
        $dbname ="checkpoint1"; 

        try{
            $connexion = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $connexion; 
        }
        catch(PDOException $e){
            die('Echec: ' .$e->getMessage());
        }
}



$dbh = baseConnect();
if ($_POST['civility'] == "Mr")
    $civility = 1;
else
    $civility = 2;
$req = "insert into contact (civility_id, lastname, firstname) values (".$civility.",'".$_POST['lastname']."','".$_POST['firstname']."');";
echo $req;
$reponse = $dbh->query($req);
?>
