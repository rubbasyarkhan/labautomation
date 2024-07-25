
<?php
require "../config/connection.php";


    $id = $_GET["pid"];

    

    $qry = "SELECT products.pcode,products.name,products.id FROM `assigntests` t1 inner join products on products.id = t1.pid WHERE t1.pid = $id AND NOT EXISTS ( SELECT 1 FROM `assigntests` t2  WHERE t2.pid = t1.pid AND t2.result = 'fail') GROUP by products.pcode,products.name,products.id;";





$result = mysqli_query($connection, $qry);
?>
