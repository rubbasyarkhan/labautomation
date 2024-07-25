<?php
require "../config/connection.php";

if (isset($_POST['confirm_delete'])) {
    $id = $_POST['id'];

    // Delete from category_test first
    mysqli_query($connection, "DELETE FROM `category_test` WHERE cid = $id");

    // Delete from category
    $qry = "DELETE FROM `category` WHERE id = $id";
    $result = mysqli_query($connection, $qry);

    echo "<script>alert('Deleted'); window.location.href='../views/category.php';</script>";
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the number of tests associated with the category
    $result = mysqli_query($connection, "SELECT COUNT(*) as count FROM `category_test` WHERE cid = $id");
    $row = mysqli_fetch_assoc($result);
    $testCount = $row['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Category</title>
    <script>
        function confirmDeletion() {
            if (confirm('This category has <?php echo $testCount; ?> test(s) assigned to it. Deleting this category will also delete all associated tests. Do you want to proceed?')) {
                document.getElementById('deleteForm').submit();
            } else {
                window.location.href = '../views/category.php';
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
