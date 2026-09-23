<?php
require_once __DIR__ . '/../config/config.php';

class UploadHelper {
    private static $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
    private static $maxFileSize = 15 * 1024 * 1024; // 15MB

    public static function uploadImage($fileInput, $targetSubdir = 'projects') {
        if (!isset($_FILES[$fileInput]) || $_FILES[$fileInput]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES[$fileInput];
        $targetDir = ($targetSubdir === 'designs') ? DESIGNS_UPLOAD_PATH : PROJECTS_UPLOAD_PATH;
        
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0777, true);
        }

        $fileName = basename($file['name']);
        $fileSize = $file['size'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($ext, self::$allowedExtensions)) {
            return ['error' => 'Invalid file extension. Only JPG, PNG, WEBP, and GIF are allowed.'];
        }

        if ($fileSize > self::$maxFileSize) {
            return ['error' => 'File size exceeds maximum limit of 15MB.'];
        }

        $uniqueName = 'muskan_' . $targetSubdir . '_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
        $destination = $targetDir . '/' . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return 'uploads/' . $targetSubdir . '/' . $uniqueName;
        }

        return ['error' => 'Failed to save uploaded file.'];
    }

    public static function uploadMultipleImages($fileInput, $targetSubdir = 'projects') {
        if (!isset($_FILES[$fileInput]) || empty($_FILES[$fileInput]['name'][0])) {
            return [];
        }

        $targetDir = ($targetSubdir === 'designs') ? DESIGNS_UPLOAD_PATH : PROJECTS_UPLOAD_PATH;
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0777, true);
        }

        $uploadedPaths = [];
        $files = $_FILES[$fileInput];
        $count = count($files['name']);

        for ($i = 0; $i < $count; $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $fileName = $files['name'][$i];
                $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (in_array($ext, self::$allowedExtensions)) {
                    $uniqueName = 'muskan_' . $targetSubdir . '_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
                    $destination = $targetDir . '/' . $uniqueName;

                    if (move_uploaded_file($files['tmp_name'][$i], $destination)) {
                        $uploadedPaths[] = 'uploads/' . $targetSubdir . '/' . $uniqueName;
                    }
                }
            }
        }

        return $uploadedPaths;
    }
}
