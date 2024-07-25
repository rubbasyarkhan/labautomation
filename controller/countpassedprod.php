<?php
require "../config/connection.php";

$sql = "SELECT COUNT(*) as total_prodpass FROM assigntests where assigntests.result = 'pass'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    echo "Total : " . $row['total_prodpass'];
} else {
    echo "0 products found";
}


?>

