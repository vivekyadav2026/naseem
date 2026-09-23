<?php
require_once __DIR__ . '/../config/config.php';

if (!isset($_SESSION['admin_user'])) {
    header('Location: login.php');
    exit;
}

$currentAdmin = $_SESSION['admin_user'];
