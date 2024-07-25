<?php
require "../config/connection.php";


if (isset($_POST["submit"])) {
    session_start();

    $email = $_POST["email"];
    $password = $_POST["pass"];

    $res = mysqli_query($connection, "SELECT users.*, roles.name AS role_name FROM role_user INNER JOIN users ON users.id = role_user.uid INNER JOIN roles ON roles.id = role_user.rid WHERE users.email='$email' AND users.password='$password'");

    if ($record = mysqli_fetch_array($res)) {
        $_SESSION['user'] = json_encode([
            "name" => $record["name"],
            "email" => $record["email"],
            "id" => $record["id"],
            "role" => $record["role_name"]
        ]);
        echo "<script>alert('Logged In');</script>";
        header('Location: ../views/dashboard.php');
        exit();
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}


?>
