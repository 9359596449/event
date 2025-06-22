<?php
include 'auth.php';
include 'config.php';
$side = $_POST['side'] ?? 'bride'; // 'bride' or 'groom'
$targetDir = "upload/$side/";

// ✅ Ensure directory exists before uploading
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (isset($_FILES['photos'])) {
    foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
        $filename = basename($_FILES['photos']['name'][$key]);
        $targetPath = $targetDir . $filename;

       if (!move_uploaded_file($tmp_name, $targetPath)) {
    error_log("Upload failed: $filename"); // ✅ don't echo!
}
    }
}

// Redirect after upload
header("Location: view.php?side=$side");
exit;
?>
