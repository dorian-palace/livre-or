<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';
?>
<?php require'elements/header.php'; ?>

<?php

try{ 
if(isset($_SESSION['id'])){
    @$getid = $_SESSION['id'];
    $usercom = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $usercom->execute(array(@$getid));
    $usercom = $usercom->fetch();

    if(isset($_POST['submit_commentaire'])){

        if(isset($_SESSION['id'],$_POST['commentaire']) AND !empty($_POST['commentaire'])){

            $commentaire = htmlspecialchars(($_POST['commentaire']));
            if($_SESSION['id']) {

	            $ins = $bdd->prepare('INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?,?,NOW())');
	            $ins->execute(array($commentaire,@$getid));
	            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
	         }
	      } else {
	         $c_msg = "Erreur: Tous les champs doivent être complétés";
	      
        }
    }
}
}
catch(PDOException $e){
    
    echo 'echec : ' .$e->getMessage();
}

$commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE commentaire = ? ORDER BY id DESC');
	   $commentaires->execute(array(@$getid));
?>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Livre d'or</title>
    </head>

<body>

<form class="form2" method="POST">
    <div class="commentaire">
    <h2 id="h2com">Commentaires:</h2>
        <textarea id="textcom" name="commentaire" placeholder="Votre commentaire..."></textarea><br />
        <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
    </div>
</form>

<?php if(isset($c_msg)) { echo $c_msg; } ?>
	<br /><br />
	<?php while($c = $commentaires->fetch()) { ?>
	   <?= $c['commentaire'] ?><br />
	<?php } ?>

    

<?php require'elements/footer.php'; ?>

</body>
