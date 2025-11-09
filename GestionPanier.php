<?php

class GestionPanier 
{

function AjouterAuPanier($idprod,$iduser,$quantity)
{
	  try{
	  		$id=0;
	  		$tab=$this->RecupererProduitsParIdProd($idprod,$iduser);
	  		foreach ($tab as $donne) 
	  		{
	  			$id=$donne['idProduit'];
	   		}	
	   		echo $id ;
      		if($id!=0)
      		{
      			$requete="UPDATE produitachete SET quantite = quantite+".$quantity." WHERE idProduit = ".$id." and idUser =".$iduser.";";
          		$c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
          		mysqli_query($c,$requete);
          		 $requete="UPDATE produitcommande SET quantite = quantite+".$quantity." WHERE idProduit = ".$id." and idUser =".$iduser.";";
              $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
              mysqli_query($c,$requete);
            echo "Produit ... ";
         		echo "Produit ... ";
      		}
      		else if($id==0)
	  		{
	  	
          		$requete="INSERT INTO produitachete(idProduit,idUser,quantite) VALUES (".$idprod.",".$iduser.",".$quantity.")";
          		$c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
          		mysqli_query($c,$requete);
          		  $requete="INSERT INTO produitcommande(idProduit,idUser,quantite) VALUES (".$idprod.",".$iduser.",".$quantity.")";
              $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
              mysqli_query($c,$requete);
          		echo "Produit aaaa ";
      			echo "erreur ". $id." ".$idprod." ".$iduser;
      		}
    	}catch(exception $e)
        {
          echo "erreur";
        }
          
}
function RecupererProduitsParUser($id)
{
			$db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from produitachete where idUser ='".$id."'");
           return $response->fetchAll();
}
function RecupererProduitsParIdProd($id,$idu)
{
			$db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from produitachete where idProduit =".$id."and idUser =".$idu );
           return $response->fetchAll();
}
function RecupererProduitsAchete()
{
			$db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from produitachete ");
           return $response->fetchAll();
}
}
?>