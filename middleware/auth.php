<?php
// middleware/auth.php

session_start();

function checkAuthentication()
{
    if (!isset($_SESSION['user'])) {
        header('Location: labautomation/views/login.php');
        exit();
    }
}

checkAuthentication();
