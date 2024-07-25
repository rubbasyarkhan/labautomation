
<?php
require "../config/connection.php";
$cid =  $_GET["cid"];

$qry = " SELECT category.name as categoryname , tests.name as testname , category_test.tid FROM `category_test`  INNER join category on category_test.cid = category.id INNER JOIN tests on tests.id = category_test.tid where category_test.cid = $cid ";

$result = mysqli_query($connection, $qry);
?>