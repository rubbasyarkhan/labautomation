<?php
require "../config/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $categoryName = $_POST['categoryName'];
    $parentId = isset($_POST['parent_id']) ? $_POST['parent_id'] : NULL;

    $qry = "UPDATE category SET name = '$categoryName', parent_id = '$parentId' WHERE id = $id";
    mysqli_query($connection, $qry);

    header('Location: ../views/category.php');
    exit();
}
?>
