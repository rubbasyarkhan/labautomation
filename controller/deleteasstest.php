<?php
require "../config/connection.php";

$tid = $_GET["tid"];
$cid = $_GET["cid"];
$qry = "DELETE FROM `category_test` WHERE  cid = $cid";
mysqli_query($connection , $qry);

echo "<script>alert('Deleted')</script>";

echo "<script>window.location.href='../views/assignedtest.php'</script>";

?>