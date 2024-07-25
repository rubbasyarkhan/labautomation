<?php
require "../config/connection.php";

if (isset($_POST["submit"])) {
    $tid = $_POST["tid"];
    $cid = $_POST["cid"];

    // Sanitize inputs to prevent SQL injection
    $tid = mysqli_real_escape_string($connection, $tid);
    $cid = mysqli_real_escape_string($connection, $cid);

    $sql = "INSERT INTO `category_test` (`cid`, `tid`) VALUES ('$cid', '$tid')";

    if (mysqli_query($connection, $sql)) {
        echo "<script>window.location.href='../views/assignedtest.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
