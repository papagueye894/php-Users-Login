<?php
if(isset($_POST['ok'])){
   
    $id=$_POST['id'];
   // echo $id;
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $age=$_POST['age'];
    $sexe=$_POST['sexe'];
    require_once("config.php");
    $ps=$pdo->prepare("UPDATE users SET prenom=?,nom=?,age=?,sexe=? WHERE id=?");
    $params=array($nom,$prenom,$age,$sexe,$id);
    $ps->execute($params);
    header("location:index.php");
}
?>