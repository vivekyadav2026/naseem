<?php
require_once __DIR__ . '/auth_check.php';
require_once __DIR__ . '/../config/db.php';

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

$dm = DataManager::getInstance();

if ($type === 'project' && !empty($id)) {
    $dm->deleteProject($id);
    header('Location: projects.php');
    exit;
} elseif ($type === 'design' && !empty($id)) {
    $dm->deleteDesign($id);
    header('Location: designs.php');
    exit;
} elseif ($type === 'enquiry' && !empty($id)) {
    $dm->deleteEnquiry($id);
    header('Location: enquiries.php');
    exit;
}

header('Location: index.php');
exit;
