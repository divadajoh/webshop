<?php
include "init/init.php";
require_once("dao/UporabnikDAO.php");
require_once("models/UporabnikModel.php");
$uporabnikDAO = new UporabnikDAO($con);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $uporabnikModel = new UporabnikModel();
    $uporabnikModel->setEmail($email);
    $uporabnikModel->setNaslov($address);
    $uporabnikModel->setGeslo($password);

    $uporabnik = $uporabnikDAO->findByEmail($email);  
    if($uporabnik != null){
        header("Location: register.php?message=Uporabnik že obstaja!");
        return;
    }

    if($password != $confirm_password){
        header("Location: register.php?message=Gesli se ne ujemata!");
        return;
    }

    $uspelo = $uporabnikDAO->create($uporabnikModel);
    header("Location: login.php?email=".$email);
        
}
?>