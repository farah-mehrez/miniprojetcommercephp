<?php


class BD
{ 
private $serveur;
private $base;
private  $host;
private $mdp;
private $con;

public function __construct()
{
    $this->serveur='localhost';
    $this->base='keramoskhemis';
    $this->host='root';
    $this->mdp='';

}


  
public function getConnection()
{
     try{
         $this->con= new PDO("mysql:host=".$this->serveur.";dbname=".$this->base."","".$this->host."","".$this->mdp."");
         

     }
     catch (PDOException $e)
     {
        $test="false";
         die("<h1>Imposible de seconnecter a la Base de Donnee</h1>");
     }
     
     return $this->con;
}

}