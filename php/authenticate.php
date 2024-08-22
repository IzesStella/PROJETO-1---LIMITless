<?php
session_start();

if (!isset($_SESSION['username_id'])) {
    header('Location: entrar.php');
    exit();
}
?>