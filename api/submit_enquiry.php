<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? 'Not Provided');
$city = trim($_POST['city'] ?? 'Patna, Bihar');
$service = trim($_POST['service'] ?? 'General Inquiry');
$property = trim($_POST['property_type'] ?? 'N/A');
$area = trim($_POST['area'] ?? 'N/A');
$budget = trim($_POST['budget'] ?? 'N/A');
$message = trim($_POST['message'] ?? '');
$source = trim($_POST['source'] ?? 'Website Form');

if (empty($name) || empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Name and phone number are required.']);
    exit;
}

$dm = DataManager::getInstance();
$leadId = 'ENQ-' . time() . '-' . rand(100, 999);

$enquiryData = [
    'id' => $leadId,
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'city' => $city,
    'service' => $service,
    'property_type' => $property,
    'area' => $area,
    'budget' => $budget,
    'message' => $message,
    'status' => 'New',
    'source' => $source,
    'notes' => '',
    'created_at' => date('Y-m-d H:i:s')
];

$savedId = $dm->saveEnquiry($enquiryData);

if ($savedId) {
    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your request has been recorded. Our project lead will reach out shortly.',
        'lead_id' => $savedId
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Unable to save inquiry. Please call us directly.']);
}
