<?php
// === File: view.php ===
include 'config.php';
$stage = $_POST['stage'] ?? 'choose';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($stage === 'choose') {
    $side = $_POST['side'] ?? '';
    if (!isset($settings['passkeys'][$side])) $stage = 'choose';
    else $stage = 'passkey';
  } elseif ($stage === 'passkey') {
    $side = $_POST['side'];
    $pass = $_POST['passkey'] ?? '';
    if ($pass === $settings['passkeys'][$side]) {
      $images = glob("uploads/$side/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
      $stage = 'gallery';
    } else {
      $stage = 'wrong';
    }
  }
}
?>
<!DOCTYPE html><html><head><title>View Photos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
<div class="container">
  <?php if ($stage === 'choose'): ?>
    <h2>Choose Your Side</h2>
    <form method="post">
      <input type="hidden" name="stage" value="choose">
      <button name="side" value="bride" class="btn btn-primary me-2">Bride Side</button>
      <button name="side" value="groom" class="btn btn-danger">Groom Side</button>
    </form>

  <?php elseif ($stage === 'passkey'): ?>
    <h2>Enter Passkey for <?= ucfirst($side) ?> Side</h2>
    <form method="post">
      <input type="hidden" name="stage" value="passkey">
      <input type="hidden" name="side" value="<?= htmlspecialchars($side) ?>">
      <input type="text" name="passkey" class="form-control mb-3" placeholder="Passkey" required>
      <button class="btn btn-success">Submit</button>
    </form>

  <?php elseif ($stage === 'gallery'): ?>
    <h2><?= ucfirst($side) ?> Side Gallery</h2>
    <div class="row">
      <?php foreach ($images as $img): ?>
        <?php $imgName = basename($img); ?>
        <div class="col-md-4 mb-4 text-center">
          <a href="uploads/<?= $side ?>/<?= $imgName ?>" download>
            <img src="uploads/<?= $side ?>/<?= $imgName ?>" class="img-fluid rounded mb-2" style="max-height: 200px;">
          </a><br>
          <a href="uploads/<?= $side ?>/<?= $imgName ?>" download class="btn btn-sm btn-outline-primary">Download</a>
        </div>
      <?php endforeach; ?>
    </div>

  <?php elseif ($stage === 'wrong'): ?>
    <div class="alert alert-danger">Invalid passkey. <a href="view.php">Try again</a></div>
  <?php endif; ?>
</div></body></html>