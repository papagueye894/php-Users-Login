<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['idPersonne'];

//deleting the row from table
$sql = "DELETE FROM personne WHERE idPersonne=:idPersonne";
$query = $dbConn->prepare($sql);
$query->execute(array(':idPersonne' => $id));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
