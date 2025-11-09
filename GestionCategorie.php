<?php

class GestionCategorie {

	public function RecupererCategories()
        {
        	$bd=new BD();
        	$t=array();
        	$i=0;
        	$response=$bd->getConnection()->query("select * from categorie");

        while($donne=$response->fetch())
        {
            $tab=array(
                "IdCategorie"=>$donne['IdCategorie'],
                 "nomCateg"  =>$donne['nomCateg'],
                );
           

          $t[$i]=$tab;
          $i++;


        
        

    }
    return $t;
}
public function RecupererCategorieIdByName($name)
        {
            $bd=new BD();
            $response=$bd->getConnection()->query("select * from categorie where nomCateg='".$name."'");

     return $response->fetchAll();
}
public function RecupererCategorieById($Id)
        {
            $bd=new BD();
            $response=$bd->getConnection()->query("select * from categorie where IdCategorie=".$Id.";");

     return $response->fetchAll();
}
  public function DeleteCategorie($Id)
    {  

        $con=mysqli_connect("127.0.0.1","root","","keramoskhemis");


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM categorie WHERE IdCategorie=".$Id.";" ;
$res=$con->query($sql);
$sql = "DELETE FROM produit WHERE IdCategorie=".$Id.";" ;
$res=$con->query($sql);
if ($res=== TRUE) {
  echo "New record deleted successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
    }
public function UpdateCategorie($Id,$nom)
    {  

        $con=mysqli_connect("127.0.0.1","root","","keramoskhemis");


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE categorie SET IdCategorie =".$Id." , nomCateg='".$nom."' WHERE IdCategorie= ".$Id;
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

?>