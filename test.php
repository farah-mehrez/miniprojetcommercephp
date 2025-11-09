<?php 
include "GestionProduit.php";

$gp=new GestionProduit();
$tab=$gp->RecupererProduits(); 

for($i=0;$i<count($tab);$i++)
{
	echo $tab[$i]['IdProd']." ".$tab[$i]['nomProd']." ".$tab[$i]['diametre']." ".$tab[$i]['Prix']." ".$tab[$i]['image']." ".$tab[$i]['IdCategorie'] ;

}