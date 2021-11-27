<?php
try{ 
$bdd = new PDO('mysql:host=localhost;dbname=dorian-palace_livreor','livre_or','livreor');
$bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
    
    echo 'echec : ' .$e->getMessage();
}
?>