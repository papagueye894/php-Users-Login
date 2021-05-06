<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['idPersonne'];
	
	$prenom=$_POST['Prenom'];
	$nom=$_POST['Nom'];
	$age=$_POST['Age'];
	$sexe=$_POST['Sexe'];	
	
	// checking empty fields
	if(empty($nom) || empty($prenom)|| empty($age) || empty($sexe)) {	
			
		if(empty($prenom)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($nom)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($sexe)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE personne SET Nom=:Nom, Prenom=:Prenom, Age=:Age, Sexe=:Sexe WHERE idPersonne=:idPersonne";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':idPersonne', $id);
		$query->bindparam(':Prenom', $prenom);
		$query->bindparam(':Nom', $nom);
		$query->bindparam(':Age', $age);
		$query->bindparam(':Sexe', $sexe);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['idPersonne'];

//selecting data associated with this particular id
$sql = "SELECT * FROM personne WHERE idPersonne=:idPersonne";
$query = $dbConn->prepare($sql);
$query->execute(array(':idPersonne' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$nom = $row['Nom'];
	$prenom = $row['Prenom'];
	$age = $row['Age'];
	$sexe = $row['Sexe'];
}
?>


<!doctype html>
<html lang="en">
  <head>
	<title>Edit</title>
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

  <div style="height: 10vh;"></div>

    
	  
 <div class="col-4 offset-3">
	 <div class="card text-center">
	   <div class="card-body">
		 <h4 class="card-titl " style="color: #163c57;">Editer une Personne</h4>
	   </div>
	 </div>

 </div>

 <div style="height: 10vh;"></div>
	  
	
	<form name="form1" method="post" action="edit.php">
		<table>
			<tr> 
				<td>Prenom</td>
				<td><input type="text" name="Prenom" value="<?php echo $prenom;?>"></td>
			</tr>
			<tr> 
				<td>Nom</td>
				<td><input type="text" name="Nom" value="<?php echo $nom;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="Age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Sexe</td>
				<td><input type="text" name="Sexe" value="<?php echo $sexe;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idPersonne" value=<?php echo $_GET['idPersonne'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
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