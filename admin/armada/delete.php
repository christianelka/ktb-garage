<?php 
require_once '../../include.php';

$hapus = "DELETE FROM mobil WHERE id_mobil='$_GET[id_mobil]'";
$query = mysqli_query($hai, $hapus);

if ($query){
	header("Location:index.php?notif4=true");
} 
?>