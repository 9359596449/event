<?php
$side = $_POST['side'] ?? 'bride'; // 'bride' or 'groom'
$targetDir = "upload/$side/";

// Create folder if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (isset($_FILES['photos'])) {
    foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
        $filename = basename($_FILES['photos']['name'][$key]);
        $targetPath = $targetDir . $filename;

        if (move_uploaded_file($tmp_name, $targetPath)) {
            // Success
        } else {
            error_log("❌ Failed to upload $filename");
        }
    }
}

// Redirect after upload
header("Location: view.php?side=$side");
exit;
?>
