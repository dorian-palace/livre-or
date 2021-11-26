<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';
?>
   <?php require'elements/header.php'; ?>

<?php

try{

//INNER JOIN
$allcomment = $bdd->query('SELECT * FROM commentaires   ORDER BY id DESC');
?>

<h1>Tout les commentaires : </h1>

<?php

while($comm = $allcomment->fetch()){

$comm['id_utilisateur'] = $_SESSION['id'];
?>

<div class="commentaire">



<ul>
<li><?php echo $comm['commentaire'] . ' '. ':'. $comm['date']  ?></li>
</ul>

</div>
<?php

}
} catch (PDOException $e) {

echo 'echec : ' . $e->getMessage();
}

?>
<h2> <a href="commentaire.php">Poster un commentaire </a></h2>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
 


    <?php require'elements/footer.php'; ?>
</body>
