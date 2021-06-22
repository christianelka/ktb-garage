<?php  
  include "../../include.php";
  $status = 1;
  // $sql = "INSERT INTO upload (id_file, username, nama_file) VALUES (NULL, :username, :nama_file)";
  $verif = "UPDATE pesan SET status='$status' WHERE id_pesan=$_GET[id_pesan]";
  $saved = mysqli_query($hai, $verif);
  header("Location: index.php?notif1=true");

?>