<?php
include '../middleware/getAuth.php';
require "../config/connection.php";
include "../helpers/pcode.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $catid = $_POST["catid"];
    $userid = $_SESSION['userid'];  // Assuming you store user id in session

    // Generate unique product code
    $productcode = generateUniqueProductId($connection);

    // Using prepared statements for security
    $qry = $connection->prepare("INSERT INTO `products`(`pcode`, `name`, `uid`) VALUES (?, ?, ?)");
    $qry->bind_param("ssi", $productcode, $name, $userid);
    $res = $qry->execute();

    if ($res) {
        // Get the last inserted product id
        $pid = $connection->insert_id;

        // Insert the category-product relation
        $rel_qry = $connection->prepare("INSERT INTO category_product (pid, cid) VALUES (?, ?)");
        $rel_qry->bind_param("ii", $pid, $catid);
        $rel_qry->execute();

        // Redirect to product page
        echo "<script>window.location.href='../views/product.php'</script>";
    } else {
        // Handle insertion error
        echo "Error: " . $connection->error;
    }
}
?>
