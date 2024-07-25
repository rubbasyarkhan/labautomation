<?php
require "../config/connection.php";
include "../helpers/generatepass.php";

if (isset($_POST["submit"])) {
    session_start();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $roleid = $_POST["roleid"];
    
    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM `users` WHERE `email` = ?";
    $stmt = $connection->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already in use, please use another email'); window.history.back();</script>";
    } else {
        $pass = generatePassword();

        // Use prepared statements to prevent SQL injection
        $qry = "INSERT INTO `users`( `name`, `email`, `contact`, `password`) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($qry);
        $stmt->bind_param("ssss", $name, $email, $contact, $pass);

        if ($stmt->execute()) {
            $uid = $stmt->insert_id;
            $stmt->close();

            $qry_role_user = "INSERT INTO `role_user` (`rid`, `uid`) VALUES (?, ?)";
            $stmt_role_user = $connection->prepare($qry_role_user);
            $stmt_role_user->bind_param("ii", $roleid, $uid);
            $stmt_role_user->execute();
            $stmt_role_user->close();

            echo "<script>alert('Password for this user is $pass'); window.location.href='../views/user.php';</script>";
        } else {
            echo "<script>alert('Error: Could not add user.'); window.location.href='../views/add_user.php';</script>";
        }
    }
}
?>
