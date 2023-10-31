<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] == "user") {
    header("Location: dash_user.php");
} elseif ($_SESSION["role"] == "admin") {
    header("Location: dash_admin.php");
}else{
    header("Location: dash_null.php");
}

?>