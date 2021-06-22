<?php 
require_once '../../include.php';

$hapus = "DELETE FROM driver WHERE id_driver='$_GET[id_driver]'";
$query = mysqli_query($hai, $hapus);

if ($query){
	header("Location:index.php?notif4=true");
} 
?>