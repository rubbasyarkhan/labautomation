
<?php
require "../config/connection.php";
$cid =  $_GET["cid"];
$pid =  $_GET["pid"];

$qry = "SELECT assigntests. * , products.name as pname , products.pcode as pcode , tests.name as tname FROM `assigntests` INNER join products on assigntests.pid = products.id INNER JOIN tests on tests.id = assigntests.tid where `pid` = $pid ";

$result = mysqli_query($connection, $qry);
?>