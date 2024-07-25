<?php
require "../config/connection.php";

$qry1 =  "SELECT tests.name as testname, category_test.cid,category_test.tid  , category.name as catename FROM `category_test` inner JOIN tests on category_test.tid = tests.id INNER JOIN category on category_test.cid = category.id";
$result= mysqli_query($connection, $qry1);
?>