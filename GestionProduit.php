<?php

class GestionProduit {
	public function RecupererProduits()
        {
        	$db=new BD();
        	$t=array();
        	$i=0;
        	$response=$db->getConnection()->query("select * from produit");
                while($donne=$response->fetch())
                {
                    $tab=array(
                    "IdProd"=>$donne['IdProd'],
                    "nomProd"  =>$donne['nomProd'],
                    "diametre"  =>$donne['diametre'],
                    "Prix"  =>$donne['Prix'],
                    "image"  =>$donne['image'],
                    "IdCategorie"  =>$donne['IdCategorie'],
                );    

          $t[$i]=$tab;
          $i++;


        }
        return $t;

    }
    public function RecupererProduitsParCategorie($id)
        {
            $db=new BD();
            $t=array();
            $i=0;
            $response=$db->getConnection()->query("select * from produit where IdCategorie=".$id);
                while($donne=$response->fetch())
                {
                    $tab=array(
                    "IdProd"=>$donne['IdProd'],
                    "nomProd"  =>$donne['nomProd'],
                    "diametre"  =>$donne['diametre'],
                    "Prix"  =>$donne['Prix'],
                    "image"  =>$donne['image'],
                    "IdCategorie"  =>$donne['IdCategorie'],
                );    

          $t[$i]=$tab;
          $i++;


        }
        return $t;

    }
    public function RecupererProduitParId($id)
        {
            $db=new BD();
            $t=array();
            $i=0;
            $response=$db->getConnection()->query("select * from produit where IdProd=".$id);
                while($donne=$response->fetch())
                {
                    $tab=array(
                    "IdProd"=>$donne['IdProd'],
                    "nomProd"  =>$donne['nomProd'],
                    "diametre"  =>$donne['diametre'],
                    "Prix"  =>$donne['Prix'],
                    "image"  =>$donne['image'],
                    "IdCategorie"  =>$donne['IdCategorie'],
                );    

          $t[$i]=$tab;
          $i++;


        }
        return $t;

    }
     public function DeleteProduit($Id)
    {  

        $con=mysqli_connect("127.0.0.1","root","","keramoskhemis");


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM produit WHERE IdProd=".$Id.";" ;
$res=$con->query($sql);
if ($res=== TRUE) {
  echo "New record deleted successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
    }
    public function UpdateProduit($Id,$nom,$diametre,$prix,$image,$IdCategorie)
    {  

        $con=mysqli_connect("127.0.0.1","root","","keramoskhemis");


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE produit SET IdProd =".$Id." , nomProd='".$nom."',diametre='".$diametre."',Prix='".$prix."',image='".$image."' ,IdCategorie=".$IdCategorie."  WHERE IdProd=".$Id;
$res=$con->query($sql);
if ($res=== TRUE) {
  echo "New record Updated successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
    }

  }
    //  public function Panier($pro)
/*public function AjoutCategorie($cat)
    {  $ajout="";
        $bd=new BD();




          
             if ($this->verifLogin($emp->login) == false)
             {          $req=$bd->getConnection()->prepare('insert into categorie (IdCategorie, nomCateg) values (:IdCategorie,:nomCateg)');
                 $res=$req->execute(array(
                     'IdCategorie'=> $cat->IdCategorie,
                     'nomCateg'=> $cat->nomCateg,
                     
                     
                 ));
                 if ($res)
                 {
                     $ajout="succes";
                 }
                 else { $ajout="echouee";}
             }
             else {
                 $ajout=" est existe dans la base ";
             }

          return $ajout;
    }



*/


