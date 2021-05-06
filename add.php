<!doctype html>
<html lang="en">
  <head>
	<title>Formulaire</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>


<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #163c57;">
	  <a class="navbar-brand" href="#"></a>
	  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
		  aria-expanded="false" aria-label="Toggle navigation"></button>
	  <div class="collapse navbar-collapse" id="collapsibleNavId">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			  <li class="nav-item active">
				  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="add.php">Saisir</a>
			  </li>
			  <li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
				  <div class="dropdown-menu" aria-labelledby="dropdownId">
					   <a class="dropdown-item" href="login.php">Se Connecter </a>
					  <a class="dropdown-item" href="registre.php">Créer un Compte </a>
				  </div>
			  </li>
		  </ul>
		  <form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="text" placeholder="Rechercher">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
		  </form>
	  </div>
  </nav>


  <!--Confirmation-->

  <div style="height: 10vh;"></div>
	  
 <div class="col-4 offset-3">
	 <div class="card text-center">
	   <div class="card-body">
	 <h4 class="card-titl " style="color: #163c57;">Saisir une Personne</h4>
 <?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$prenom = $_POST['Prenom'];
	$nom = $_POST['Nom'];
	$age = $_POST['Age'];
	$sexe = $_POST['Sexe'];
		
	// checking empty fields
	if(empty($prenom) || empty($nom) || empty($age) || empty($sexe)) {
				
		if(empty($prenom)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($nom)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($sexe)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO personne(Nom, Prenom, Age, Sexe) VALUES(:Nom, :Prenom, :Age, :Sexe)";
		$query = $dbConn->prepare($sql);
				
		
		$query->bindparam(':Nom', $nom);
		$query->bindparam(':Prenom', $prenom);
			$query->bindparam(':Age', $age);
		$query->bindparam(':Sexe', $sexe);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message

		 echo " <h4 class='card-titl '><font color='green'>Data added successfully.</h4>";
		 echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>

	   </div>
	 </div>

 </div>
 

  <div style="height: 10vh;"></div>
	  
 
<!--Ajout-->

	<form action="add.php" method="post" name="form1">
		<table>
			<tr> 
				<td>Prenom</td>
				<td><input type="text" name="Prenom"></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="Nom"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="Age"></td>
			</tr>
			<tr> 
				<td>Sexe</td>
				<td><input type="text" name="Sexe"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>