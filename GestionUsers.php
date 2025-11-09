<?php
include"../Models/User.php";
include"../Models/produit.php";
include"../Models/Categorie.php";

class GestionUsers {

  public function RecupererUsers()
        {
          $bd=new BD();
          $t=array();
          $i=0;
          $response=$bd->getConnection()->query("select * from user");

        while($donne=$response->fetch())
        {
            $tab=array(
                "IdUser"=>$donne['Id'],
                 "nomUser"  =>$donne['Nom'],
                   "PrenomUser"=>$donne['Prenom'],
                 "Email"  =>$donne['Email'],
                   "Password"=>$donne['Password'],
                 "Role"=>$donne['Role'],

                );
           

          $t[$i]=$tab;
          $i++;
          

        
        return $t;

    }
  }
     public function RecupererUserLogin($name,$pass)
        {
            $db=new BD();
            $t=array();
            $i=0;
            $response=$db->getConnection()->query("select * from user where Nom ='".$name."' and Password ='".$pass."'");
           return $response->fetchAll();
         }
       public function RecupererUserByName($name)
        {
            $db=new BD();
            $t=array();
            $response=$db->getConnection()->query("select * from user where Nom ='".$name."'");
           return $response->fetchAll();
        }
        public function RecupererUserById($name)
        {
            $db=new BD();
            $t=array();
            $response=$db->getConnection()->query("select * from user where Id ='".$name."'");
           return $response->fetchAll();
        }
          public function IsAdmin($name)
        {
            $db=new BD();
            $t=array();
            $i=0;
            $response=$db->getConnection()->query("select * from user where Nom ='".$name."'");
             while($donne=$response->fetch())
            {
               if($donne['Role']=="admin")
                  return true;
            }
            return false;
        }
       public function AjoutCategorie($cat)
    {  

        $con=mysql_connect("127.0.0.1","root","","keramoskhemis");


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO categorie (IdCategorie,nomCateg)
VALUES (null,'".$cat->nomCateg."')";
$res=$con->query($sql);
if ($res=== TRUE) {
  echo "New record created successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
    }





        public function AjouterProduits($p)
        {
             // private $IdProd;
          // private $nomProd;
          // private $diametre;
          // private $Prix;
          // private $IdCategorie;

          try{
          $requete="INSERT INTO produit(IdProd, nomProd, diametre, Prix, image, IdCategorie) VALUES (".$p->IdProd.",'".$p->nomProd."','".$p->diametre."','".$p->Prix."','".$p->Image."',".$p->IdCategorie.")";
          $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
          mysqli_query($c,$requete);
        }catch(exception $e)
        {
          echo "erreur";
        }
          echo "Produit ajouter ";
        }
          
        
}