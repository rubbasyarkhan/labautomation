<?php
require "../config/connection.php";

$id = $_GET["id"];
$qry = "DELETE FROM `users` WHERE id = $id ";
mysqli_query($connection ,"DELETE FROM `role_user` WHERE uid = $id ");
mysqli_query($connection , $qry);

echo "<script>alert('Deleted')</script>";

echo "<script>window.location.href='../views/user.php'</script>";




?>