<?php
	session_start();

	$_SESSION['pseudo'] = 'Moriarty';
	$_SESSION['mdp'] = 'Sherlock';
	$_SESSION['date_log'] = date("F j, Y, g:i a"); 

	if ($_SESSION['date_log'] == date("F j, Y, g:i+1 a")){

		session_destroy();

	}

	if(isset($_SESSION['pseudo'])== '' ){

		header ('location : Index.php');

	}	



?>

<!DOCTYPE html>
<html lang='fr'>
<head>
	<meta charset="utf-8">
	<title>Facebook like</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<header>
	<h1>Fesse Broute</h1>
	</header>	
	
	<div id="message">
		<?php
		
			date_default_timezone_set('Europe/Paris');  //On set la date 
			$today = date("F j, Y, g:i a");     
			$file = fopen("messages.txt","a+");        
			
			
			if(isset($_POST['nom']) AND isset($_POST['titre']) AND isset($_POST['message']) )   //Si des les formulaires sont remplis on écrit dans le fichier
			{
				
				fwrite($file,"<br/>nom : ".$_POST['nom']."<br/>");
				fwrite($file,"Titre : ".$_POST['titre']."<br/>");
				fwrite($file,"Message : ".$_POST['message']."<br/>");
				fwrite($file,"Date : ".$today."<br/>");
				fwrite($file,"------------------------------------------------------------------");
				
				$lines = file("messages.txt");
				
				foreach($lines as $n => $line)  //On affiche ce qui a été écrit
				{
				 echo $line."<br/>";
				}
				
			}
			
		?>

	</div>

	</body>

	<footer>  
		<form action="#" method="POST">  
			<p>
				<label for="nom">Pseudo : </label><input type="text" name="nom" /> 
				<br/>
				<br/>
				<label for="titre">Titre : </label><input type="text" name="titre" />
				<br/>
				<br/>
				<br/>
				<textarea id="message" name="message" placeholder="Ecris ton message" rows="7" cols="100" ></textarea><br/>
				<br/>
				<br/> 	
				<br/>
				<input type="submit" value="Poster" />
			</p>
		</form>

		<?php 


		echo '<a href="Index.php">Déconnexion</a>';

		session_destroy()		


		?>

	</footer>	
</body>
</html>


