<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';?>


<?php

@$login = $_POST['login'];
@$password = $_POST['password'];
@$passwordsha = sha1($password);

@$login = htmlspecialchars(trim($login));
@$password = htmlspecialchars(trim($password));

if (isset($_POST['envoi'])){
    if(!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['confirm'])){
        @$login = htmlspecialchars($_POST['login']);
        @$password = htmlspecialchars($_POST['password']);
        
    }
    else{
        echo "Remplissez ce champ<br/>";
    }
} 

$sql = "SELECT COUNT(login) AS num FROM utilisateurs WHERE login = :login";
$stmt = $bdd->prepare($sql);
$stmt->bindValue(':login',$login);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['num'] > 0){
      echo "Login deja pris<br/>";
}


elseif(empty($_POST['login']) && empty($_POST['password'])){

}
elseif($_POST['password'] !=$_POST['confirm']){
    die("Mot de passe incorrect<br/>");
}
else{

    $sql1 = "INSERT INTO utilisateurs(login,password)
    VALUES (:login,:password)";
    $stmt = $bdd->prepare($sql1);
    $stmt->bindParam(':login' ,$login);
    $stmt->bindParam(':password' ,$passwordsha);

    if($stmt->execute()){
        header("Location: commentaire.php");
    }
    else{
        $error = "Erreur: "; $e->getMessage();
    }
    
    
    }

?>



<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
<?php require'elements/header.php'; ?>

    <form name="inscription" method="POST" action="" >
        <h1 id="h2inscription">Inscription</h1>
        <br>
        <input type="text" name="login" value="Login" autocomplete="off" required><br>
        <br>
        <input type="password" name="password" value="Password" autocomplete="off" required><br>
        <br>
        <input type="password" name="confirm" value="password" autocomplete="off" required><br>
        <br/><br/>
        <input id="inscriptioninput" type="submit" name="envoi" value="Inscription !">
    </form>

<?php require'elements/footer.php'; ?>

</body>

