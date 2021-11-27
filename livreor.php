<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';
?>
   <?php require'elements/header.php'; ?>

<?php
$insert = $bdd->prepare("SELECT *FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id  = commentaires.id_utilisateur ");
$comment  = $insert->execute();
?>

<div class="commentor">
    <?php
while($comment= $insert->fetch()){

   echo  $comment['login'] .':'. ' '. $comment['commentaire'] .'   '. $comment['date']. '<br/> <br /><br/>' ;

}
?>
</div>


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
