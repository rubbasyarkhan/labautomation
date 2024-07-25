<?php
require "../config/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tdate = $_POST["tdate"];
    $tresult = $_POST["tresult"];
    $tremark = $_POST["tremark"];
    $tester = $_POST["tester"];

    // $qry = "UPDATE `assigntests` SET `testperformdate`='$tdate',`result`='$tresult',`remarks`='$tremark', WHERE `id` = '$id' ";

    if (mysqli_query($connection, "UPDATE `assigntests` SET `testperformdate`='$tdate',`result`='$tresult',`remarks`='$tremark',`tester`='$tester' WHERE `id` = '$id' ")) {
        header("Location: ../views/testing.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
