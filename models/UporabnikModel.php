<?php
class UporabnikModel{

    private $id;
    private $email;
    private $naslov;
    private $geslo;


    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function getNaslov(){
        return $this->naslov;
    }
    function setNaslov($naslov){
        $this->naslov=$naslov;
    }
    function getGeslo(){
        return $this->geslo;
    }
    function setGeslo($geslo){
        $this->geslo=$geslo;
    }

}
?>