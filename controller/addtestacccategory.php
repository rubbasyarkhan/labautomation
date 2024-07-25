<?php
require "../config/connection.php";

if (isset($_POST["submit"])) {
    session_start();

    $pid = $_POST["pid"];
    $tid = $_POST["tid"];


    $check  = mysqli_query($connection, "select * from assigntests where pid = $pid and tid = $tid ");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Test already assigned to this product')</script>";
    } else {

        $pquery = mysqli_query($connection, "select pcode from products where id = $pid");
        $pdata = mysqli_fetch_assoc($pquery);
        $tcode = $tid . '' . $pdata["pcode"];
        $res = mysqli_query($connection, "INSERT INTO `assigntests`( `pid`, `tid`,testingid) VALUES ($pid,$tid,$tcode)");
        echo "<script>alert('Assigned Test')</script>";
    };
}


echo "<script>window.location.href='../views/product.php'</script>";
