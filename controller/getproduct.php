<?php
require "../config/connection.php";




$qry = "SELECT products.* , category.name as catename, category.id as cid FROM `category_product` inner JOIN products on category_product.pid = products.id INNER JOIN category on category_product.cid = category.id";
$result = mysqli_query($connection, $qry);
?>