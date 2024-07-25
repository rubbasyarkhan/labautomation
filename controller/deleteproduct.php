<?php
require "../config/connection.php";

if (isset($_POST['confirm_delete'])) {
    $id = $_POST['id'];

    // Delete from assigntests first
    mysqli_query($connection, "DELETE FROM assigntests WHERE pid = $id");

    // Delete from category_product
    mysqli_query($connection, "DELETE FROM category_product WHERE pid = $id");

    // Delete from products
    $qry = "DELETE FROM products WHERE id = $id";
    mysqli_query($connection, $qry);

    echo "<script>alert('Deleted'); window.location.href='../views/product.php';</script>";
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the number of tests associated with the product
    $result = mysqli_query($connection, "SELECT COUNT(*) as count FROM assigntests WHERE pid = $id");
    $row = mysqli_fetch_assoc($result);
    $testCount = $row['count'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Product</title>
    <script>
        function confirmDeletion() {
            if (confirm('This product has <?php echo $testCount; ?> test(s) assigned to it. Deleting this product will also delete all associated tests and categories. Do you want to proceed?')) {
                document.getElementById('deleteForm').submit();
            } else {
                window.location.href = '../views/product.php';
            }
        }
    </script>
</head>

<body onload="confirmDeletion()">
    <form id="deleteForm" method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="confirm_delete" value="1">
    </form>
</body>

</html>