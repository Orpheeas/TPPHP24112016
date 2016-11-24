<?php
	session_start();

	$_SESSION['pseudo'] = 'Moriarty';    //les variables de la session
	$_SESSION['mdp'] = 'Sherlock';

?>


<!DOCTYPE html>
<html lang='fr'>
<head>
	<meta charset="utf-8">
	<title>Facebook like</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<h1>Login</h1>

	<form action="#" method="POST"> >  <!-- l'endroit ou l'utilisateur rentre ses ID -->

		<label for="pseudo"> Pseudo : </label><input type="text" name="pseudo" /><br/>                   
		<label for="motdepasse"> mot de passe : </label><input type="password" name="mdp" /> <br/>

		<input type="submit" value="Vérification" />

	</form>

	<?php 

		$trimpseudo=rtrim($_SESSION['pseudo']);   //On supprime les carac spéciaux
		$trimmdp=rtrim($_SESSION['mdp']);

		$file= "log.txt";
		$fileopen=(fopen("$file",'a+'));
		fclose($fileopen);

		// On vérifie si les ID correspondent l'utilisateur se connecte sinon on lui indique qu'il a les mauvais ID

		if(isset($_POST['pseudo']) AND isset($_POST['mdp'])){  
 
			if (($_POST['pseudo']==$trimpseudo) && ($_POST['mdp']==$trimmdp )){

				echo '<a href="Blog.php">Connexion</a>';

			}else{

				echo "Mauvais identifiant";
			}
		}


	?>


</body>
</html>