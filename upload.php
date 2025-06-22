<?php
$targetDir = "upload/bride/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

foreach ($_FILES["photos"]["tmp_name"] as $key => $tmp_name) {
    $filename = basename($_FILES["photos"]["name"][$key]);
    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($tmp_name, $targetPath)) {
        // Log error, don't echo
        error_log("Upload failed: $filename");
    }
}

header("Location: index.php");
exit;
