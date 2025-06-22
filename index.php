<?php
// === File: index.php ===
include 'auth.php';
include 'config.php';
?>
<!DOCTYPE html><html><head><title>Upload Photos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
<div class="container">
  <h1 class="mb-4">Upload Photos for Bride or Groom Side</h1>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Select Side:</label>
      <select name="side" required class="form-select">
        <option value="">Choose...</option>
        <option value="bride">Bride Side</option>
        <option value="groom">Groom Side</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Photos:</label>
      <input type="file" name="photos[]" multiple required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Upload Photos</button>
  </form>
  <hr class="my-5">
  <h2>QR Code (Scan to view Photos)</h2>
  <form action="generate_qr.php" method="POST">
    <button name="generate" type="submit" class="btn btn-success">Generate/View QR</button>
  </form>
  <?php if (file_exists('qr.png')): ?>
    <div class="mt-3">
      <img src="qr.png" alt="Scan QR to view photos">
      <p><a href="view.php" target="_blank">Open Gallery</a></p>
    </div>
  <?php endif; ?>
  <a href="logout.php" class="btn btn-outline-danger mt-4">Logout</a>
</div></body></html>