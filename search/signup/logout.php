<?php
session_start();
if (!empty($_SESSION['id'])) {
    session_destroy();
    header("Location: ../../admin/login/login.php");
}
if (empty($_SESSION['id'])) {
    session_destroy();
    header("Location: ../../admin/login/login.php");
}
?>