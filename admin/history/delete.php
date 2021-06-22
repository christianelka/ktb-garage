<?php 
require_once '../../include.php';

$hapus = "DELETE FROM pesan WHERE id_pesan='$_GET[id_pesan]'";
$query = mysqli_query($hai, $hapus);

if ($query){
	header("Location:index.php?notif2=true");
} 
?>