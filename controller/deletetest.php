<?php
require "../config/connection.php";

if (isset($_POST['confirm_delete'])) {
    $id = $_POST['id'];

    // Delete from assigntests first
    mysqli_query($connection, "DELETE FROM `assigntests` WHERE tid = $id");

    // Delete from category_test
    mysqli_query($connection, "DELETE FROM `category_test` WHERE tid = $id");

    // Delete from tests
    $qry = "DELETE FROM `tests` WHERE id = $id";
    mysqli_query($connection, $qry);

    echo "<script>alert('Deleted'); window.location.href='../views/test.php';</script>";
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the number of assignments associated with the test
    $result = mysqli_query($connection, "SELECT COUNT(*) as count FROM `assigntests` WHERE tid = $id");
    $row = mysqli_fetch_assoc($result);
    $assignmentCount = $row['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Test</title>
    <script>
        function confirmDeletion() {
            if (confirm('This test has <?php echo $assignmentCount; ?> assignment(s) associated with it. Deleting this test will also delete all related assignments and category associations. Do you want to proceed?')) {
                document.getElementById('deleteForm').submit();
            } else {
                window.location.href = '../views/test.php';
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
