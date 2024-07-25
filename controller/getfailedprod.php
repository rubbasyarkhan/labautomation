
<?php
require "../config/connection.php";

if(isset($_GET["search"])){
    $search = $_GET["search"];

    $qry = "SELECT assigntests. * , products.name as pname , products.pcode as pcode , tests.name as tname FROM `assigntests` INNER join products on assigntests.pid = products.id INNER JOIN tests on tests.id = assigntests.tid where products.pcode = '$search'  ";

}
else{

    $qry = "SELECT assigntests. * , products.name as pname , products.pcode as pcode , tests.name as tname FROM `assigntests` INNER join products on assigntests.pid = products.id INNER JOIN tests on tests.id = assigntests.tid  where assigntests.result = 'fail' ";

}


$result = mysqli_query($connection, $qry);
?>