   <?php
       include "../Controllers/GestionUsers.php";
       include "../Connection/BD.php";
		session_start();
		$tab1=null;
    	  if((!empty($_POST['Nom']))&&(!empty($_POST['Nom'])))
        {
        	$gs=new GestionUsers();
			$name=$_POST['Nom'];
			$Password=$_POST['Password'];
			$_SESSION['nom']=$name;

  			$tab1=$gs->RecupererUserLogin($name,$Password);
  			if($tab1==null)
  			{	
  				header("location:../Views/Login.php?UserError='not found'");
  			}
  			else
  			header("location:../Views/Home.php");
  		}else
  			header("location:../Views/Login.php?Empty='Empty fields'");
  ?>