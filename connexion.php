<?php
session_start();
?>
<?php  
require 'elements/sqlconnect.php';
?>
<?php
require 'elements/header.php';
?>
<?php
require 'elements/footer.php';
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
<main  >
<form  action="#" method="post">

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
</main>