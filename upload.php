<?php
include "conn.php";
$Image=$_FILES['image']['name'];
$Contenido=$_POST['Contenido'];
$idDoc=$_POST['Id_documento'];
$codExp=$_POST['CodExpediente'];

$imagePath="uploads/".$Image; 
move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
$connect->query("INSERT INTO foja (Image,Contenido,Id_documento,CodExpediente) 
VALUES ('".$Image."','".$Contenido."','".$idDoc."','".$codExp."')");
?>