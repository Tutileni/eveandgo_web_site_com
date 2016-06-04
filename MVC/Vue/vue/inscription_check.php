							<!-- Validation du formulaire ! -->		
		<?php			
		
			
		$firstnameErr =$loginVErr= $nameErr = $adresse1Err = $adresse2Err = $adresse1Err2 = $adresse2Err2 = $villeErr = $password1Err = $password2Err = $password_check = $e_mail1Err = $e_mail2Err = $e_mail1Err2 = $e_mail2Err2 = $loginErr = $regionErr = $Date_naissance_Err = $Date_naissance_Err2 = $sexeErr ="";
		$firstname = $firstnameErr2= $name =$nameErr2= $adresse1 = $sexe = $adresse2 = $ville = $password1 = $password2 = $e_mail1 = $e_mail2 = $e_mail_check = $Login = $region = $Date_naissance = "";
		$firstnameErrno = $nameErrno = $loginVErrno=$adresse1Errno = $adresse2Errno = $villeErrno = $password1Errno = $password2Errno = $password_checkno = $e_mail1Errno =$e_mail2Errno  = $loginErrno = $regionErrno = $Date_naissance_Errno = $sexeErrno = "";
		
		
		
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['nom']))
			{
				$firstnameErr = "*Ce champ est obligatoire";
			}
			elseif(!preg_match("/^[a-zA-Z \-]*$/",$_POST['nom']))
			{
				//$firstname = test_input($_POST["nom"]);
				$firstnameErr2 = "*Seuls les lettres et les espaces sont autorisés.";
				
			}

			else
			{
				$firstnameErrno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['prenom']))
			{
				$nameErr = "*Ce champ est obligatoire.";
			}
			elseif(!preg_match("/^[a-zA-Z \-]*$/",$_POST['prenom']))
			{
				//$name = test_input($_POST["prenom"]);
				  $nameErr2 = "*Seuls les lettres et les espaces sont autorisés.";

			}
			else
			{
				$nameErrno="good";
			}
			
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['sexe']))
			{
				$sexeErr = "*Ce champ est obligatoire.";
			}
			else
			{
				$sexeErrno="good";
			}
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['adresse1']))
			{
				$adresse1Err = "*Ce champ est obligatoire.";
			}
			elseif (!preg_match("/^[0-9a-zA-Z\/ \-\/]*$/",$_POST['adresse1'])) 
			{
				   $adresse1Err2 = "*Caractères autorisés:[0-9;a-z;A-Z;(-);(_);(/)].";
			}
			else
			{
				$adresse1Errno="good";
			}

		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{		
			if (!preg_match("/^[0-9a-zA-Z\/ \-\/]*$/",$_POST['adresse2'])) 
			{
				$adresse2Err2 = "*Caractères autorisés:[0-9;a-z;A-Z;(-);(_);(/)].";
     
			}
			else
			{
				$adresse2Errno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['ville']))
			{
				$villeErr = "*Ce champ est obligatoire.";
			}
			elseif (!preg_match("/^[a-zA-Z \-]*$/",$_POST['ville']))
			{
				//$name = test_input($_POST["ville"]);
				$villeErr = "*Caractères autorisés:[0-9,a-z,A-Z,-]";
			}
			else
			{
				$villeErrno="good";
			}
			
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if($region ="none")
			{
				$regionErr="*Ce champ est obligatoire.";
			}
			
			else
			{
				$regionErrno="good";
			}
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['e_mail1']))
			{
				$e_mail1Err = "*Ce champ est obligatoire. ";
				
				
			}
			elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['e_mail1'])) 
			{
				
				$e_mail1Err2 = "*Adresse Email invalide.";
				
     
			}			
			
			elseif (($_POST['e_mail1']) != ($_POST['e_mail2']))
			{
				$e_mail_check = "*Veuillez reconfirmer votre Email.";
			}
			
			else
			{
				$e_mail1Errno="good";
			}

			
		}
		
			
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['Date_naissance']))
			{
				$Date_naissance_Err = "*Ce champ est obligatoire. ";
				
			}

			elseif (!preg_match("#^((([0-0]{1})([1-9]{1}))|(([1-2]{1})([0-9]{1}))|(([3-3]{1})([0-1]{1})))\/(([0-0]{1}[1-9]{1})|([1-1]{1}[0-2]{1}))\/((([1]{1})([9]{1})([0-9]{2}))|(([2]{1})([0-9]{3})))$#",$_POST['Date_naissance'])) 
			{
				$Date_naissance_Err2 = "*Date de naissance invalide.";
     
			}
			else
			{
				$Date_naissance_Errno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['e_mail2']))
			{
				$e_mail2Err = "*Ce champ est obligatoire. ";
				
			}

			
			elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['e_mail2'])) 
			{
				$e_mail2Err2 = "*Adresse Email invalide.";
     
			}	

			else
			{
				$e_mail2Errno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['Login']))
			{
				$loginErr = "*Ce champ est obligatoire.";
			}
			else
			{
				$loginErrno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['password1']))
			{
				$password1Err = "*Ce champ est obligatoire.";
			}
			elseif(isset($_POST['password1']))
			{
				$password1Errno="good";
			}
		}
		    
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST['password2']))
			{
				$password2Err = "*Ce champ est obligatoire.";
			}
			elseif(isset($_POST['password2']))
			{
				$password2Errno="good";
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (($_POST['password1']) != ($_POST['password2']) && !(empty($_POST['password2']) && empty($_POST['password1'])))
			{
				$password_check = "*Veuillez reconfirmer votre mot de passe.";
			}
			elseif($password1Errno="good" && $password2Errno="good")
			{
				$password_checkno="good";
			}
		}

		
				 
		
	/*	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if((isset($_POST['password2'])) && (isset($_POST['password1'])) && ($password1Err != "*Ce champ est obligatoire.") && ($password1Errno = "good") && ($password2Err != "*Ce champ est obligatoire.") && ($password2Errno="good") && ($password_check != "*Veuillez reconfirmer votre mot de passe.") && ($password_checkno="good"))
			{
				$pass="ok";
			}
		}*/
	/*	function test_input($data) 
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data; 
		}		*/
		

		/*if($firstnameErr = $nameErr = $adresse1Err = $adresse2Err = $adresse1Err2 = $adresse2Err2 = $villeErr = $password1Err = $password2Err = $password_check = $e_mail1Err = $e_mail2Err = $e_mail1Err2 = $e_mail2Err2 = $loginErr = $regionErr = $Date_naissance_Err = $Date_naissance_Err2 = $sexeErr ="")
		{
			$checkform="OK";
		}*/
		
		/*( isset($_POST['adresse1']) AND isset($_POST['e_mail1']) AND isset($_POST['e_mail2']) AND isset($_POST['password1'])  AND isset($_POST['password2']) AND isset($_POST['sexe']) )
		{
			require('modele_inscription.php');

		}*/
		
?>