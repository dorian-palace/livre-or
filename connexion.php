<?php
session_start();
?>


<?php

if(isset($_POST['connexion'])){

$login = htmlspecialchars($_POST['login']);
$password = sha1($_POST['password']);

if(!empty($login) && !empty($password)){

    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login= :login AND password= :password");
    $requser->bindValue(':login', $login); 
    $requser->bindValue(':password', $password);
    $requser->execute(); 
    $userexist = $requser->rowCount();

    if($userexist == 1 ){
        
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['login'] = $userinfo['login'];
        $_SESSION['password'] = $userinfo['password'];
        
    
    if ($_SESSION['login'] = true)

 {
  header("location: livreor.php" );
 }

}else{

    echo '<p class="erreur">'.'Mauvais identifint ou mot de passe'. '</p>';
}
}

}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
<?php require'elements/header.php'; ?>
<form class="form1" action="#" method="post">

<h1 id="h1co" >Connexion</h1>

<div class="co1">
<br />
     <br />
    <input type="text" name="login" value="login" require>
    <br>
    <input type="password" name='password' value="password" require>
    <br />
<input id="log1" type="submit" name="connexion" value="Connexion !" require>
</div>
</form>


<?php
require 'elements/footer.php';
?>
</body>