<?php
function generateUniqueProductId($connection) {
    $query = mysqli_query($connection, "SELECT MAX(CAST(id AS UNSIGNED)) as max_id FROM products");
    $result = mysqli_fetch_array($query);

    $maxId = $result['max_id'];
    $newId = (int)$maxId + 1;

    return str_pad($newId, 10, '0', STR_PAD_LEFT);
}
?>
