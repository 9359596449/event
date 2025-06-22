<?php
// === File: generate_qr.php ===
include 'auth.php';
include 'config.php';
$data = urlencode($settings['qr_target']);
file_put_contents('qr.png', file_get_contents(
  "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$data"
));
header('Location: index.php');
?>