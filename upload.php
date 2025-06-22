<?php
// === File: upload.php ===
include 'auth.php';
include 'config.php';
$side = $_POST['side'] ?? '';
if (!in_array($side, ['bride', 'groom'])) die('Invalid side.');
foreach ($_FILES['photos']['tmp_name'] as $i => $tmp) {
  $name = basename($_FILES['photos']['name'][$i]);
  move_uploaded_file($tmp, $settings['upload_dirs'][$side] . $name);
}
header('Location: index.php');
?>