<?php
// === File: login.php ===
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid login!";
    }
}
?>
<!DOCTYPE html><html><head><title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-5">
<div class="container col-md-4">
    <h3>Photographer Login</h3>
    <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
        <button class="btn btn-primary">Login</button>
    </form>
</div>
</body></html>