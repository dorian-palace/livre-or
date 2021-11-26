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
if(isset($_SESSION['id'])){
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])
    {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $insertlogin->execute(array($newlogin, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newpassword1']) AND !empty($_POST['newpassword1']) AND isset($_POST['newpassword2']) AND !empty($_POST['newpassword2'])) {
        $password1 = sha1($_POST['newpassword1']);
        $password2 = sha1($_POST['newpassword2']);
        if($password1 == $password2) {
           $insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
           $insertpassword->execute(array($password1, $_SESSION['id']));
           header('Location: profil.php?id='.$_SESSION['id']);
        } 
        
        else {
           $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
}
?>
<main>
<form  method="POST" action="">
<h1>Modifier vos informations</h1>
	            <input type="text" name="newlogin" placeholder="login" value="<?php echo @$user['login'] ?>" /><br /><br />
	            <input type="password" name="newpassword1" placeholder="password" /><br /><br />
                <input type="password" name="newpassword2" placeholder="password" />
	            <br /><br />
	            <input type="submit" name="modification" value="Modifier !" />
	         </form>
</main>