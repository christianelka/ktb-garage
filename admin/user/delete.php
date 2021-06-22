<?php 
require_once '../../include.php';

$hapus = "DELETE FROM user WHERE id_user='$_GET[id_user]'";
$query = mysqli_query($hai, $hapus);

if ($query){
	header("Location:index.php?notif4=true");
} 
?>