<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
<?php
require 'elements/header.php';
?>
<h1>Livre d'or</h1>
    <main>
        <h2>Connecte toi et signe le livre d'or !</h2>
    </main>

    <div class="indexcoin">
<form method="POST" action="connexion.php">
<input type="submit" name="connexion" value="connexion" >
</form>

<form method="POST" action="inscription.php">
<input type="submit" name="inscription" value="inscription" >
</form>

<form method="POST" action="deconnexion.php">
<input type="submit" name="deconnexion" value="deconnexion" >
</form>

</div>

    <?php
require 'elements/footer.php';
?>
</body>