<?php
function uploadPhoto($file) {
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . uniqid() . "_" . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    
    // Validate file type
    $allowedTypes = ["jpg", "jpeg", "png"];
    if (!in_array($fileType, $allowedTypes)) {
        die(json_encode(["success" => false, "message" => "Invalid file type. Only JPG, JPEG, and PNG allowed."]));
    }

    // Validate file size (max 5MB)
    if ($file["size"] > 5 * 1024 * 1024) {
        die(json_encode(["success" => false, "message" => "File size exceeds 5MB limit."]));
    }

    // Move uploaded file
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $targetFilePath;
    } else {
        die(json_encode(["success" => false, "message" => "File upload failed."]));
    }
}
?>
