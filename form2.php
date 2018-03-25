<?php

require_once 'config.php';
 


$Nom_P = mysqli_real_escape_string($link, $_REQUEST['Nom_P']);
$Num = mysqli_real_escape_string($link, $_REQUEST['Num']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$pack = mysqli_real_escape_string($link, $_REQUEST['pack']);
 
$sql = "INSERT INTO stand (Nom_P, Num, Email, pack) VALUES ('$Nom_P', '$Num', '$Email', '$pack')";
if(mysqli_query($link, $sql)){
	$message = "Enregistrement effectué avec succès ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("location: index.php");
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>
