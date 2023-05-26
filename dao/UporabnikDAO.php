<?php

class UporabnikDAO{
    private $povezava=null;

    function __construct($povezava){
        $this->povezava=$povezava;
    }

    function create($uporabnikModel){
        $sql = "INSERT INTO `uporabnik`(`email`, `naslov`, `geslo`) VALUES ('".$uporabnikModel->getEmail()."','".$uporabnikModel->getNaslov()."','".$uporabnikModel->getGeslo()."')";
        
        return $this->povezava->query($sql);
    }

    function findByEmail($email){
        $sql="SELECT * FROM `uporabnik` WHERE email = '".$email."'";
        $result = $this->povezava->query($sql);

        $najdenUporabnik = null;

        while($row = $result->fetch_assoc()) {
           $najdenUporabnik = new UporabnikModel();
           $najdenUporabnik->setEmail($row["email"]);
           $najdenUporabnik->setId($row["id"]);
           $najdenUporabnik->setNaslov($row["naslov"]);
           $najdenUporabnik->setGeslo($row["geslo"]);
        }

        return $najdenUporabnik;
    }

}
?>