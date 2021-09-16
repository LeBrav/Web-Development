<?php
echo "<script> console.log('validation ok')</script>";
require_once __DIR__ .'/../models/m_user.php';
require_once __DIR__ .'/../models/m_connexioBD.php';
$connexio = connectaBD();

$mail = $_POST['mail'];
$pass = $_POST['password'];

$user = login($mail, $pass, $connexio);
if($user){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['adreca'] = $user['adreca'];
    $_SESSION['codi_postal'] = $user['codi_postal'];
    $_SESSION['poblacio'] = $user['poblacio'];

    $_SESSION['preu'] = 0;
    $_SESSION['cart'] = array();

}


header('Location: ../index.php?action=home');

exit();



