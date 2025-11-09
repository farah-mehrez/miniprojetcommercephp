<?php
    
class GestionCommande 
{

function AjouterCommande($idC,$iduser,$prixTotale)
{
	   		
	  try{	
          		$requete="INSERT INTO Commande(idCommande,prixTotale,dateC) VALUES (".$idC.",".$iduser.",".$prixTotale.",sysdate())";
          		$c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
          		mysqli_query($c,$requete);
      		
    	}catch(exception $e)
        {
          echo "erreur";
        }
          
}
function RecupererCommande($id)
{
			$db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from Commande ");
           return $response->fetchAll();
}
function RecupererCommandeParUser($id)
{
      $db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from Commande where idUser ='".$id."'");
           return $response->fetchAll();
}
function RecupererProduitsDansCommande($id)
{
			$db=new BD();
            $t=array();
            $i=0;

            $response=$db->getConnection()->query("select * from produitCommande where idCommande =".$id);
           return $response->fetchAll();
}
function AjouterProduitCommande($idprod,$iduser,$quantity)
{
  $gs=new GestionProduit();
   try{
        $id=0;
        $tab=$gs->RecupererProduitsParId($idprod,$iduser);
        foreach ($tab as $donne) 
        {
          $id=$donne['idProduit'];
        } 
        echo $id ;
          if($id!=0)
          {
            $requete="UPDATE produitcommande SET quantite = quantite+".$quantity." WHERE idProduit = ".$id." and idUser =".$iduser.";";
              $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
              mysqli_query($c,$requete);
            echo "Produit ... ";
          }
          else if($id==0)
        {
      
              $requete="INSERT INTO produitcommande(idProduit,idUser,quantite) VALUES (".$idprod.",".$iduser.",".$quantity.")";
              $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
              mysqli_query($c,$requete);
              
          }
      }catch(exception $e)
        {
          echo "erreur";
        }

}}
?>