<?php
include '../includes/db.php';
session_start();

$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check in database (Note: In a real app, use password_verify)
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    
    // For this example, we'll accept 'admin'/'admin123' if DB is not setup
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_id'] = 1;
        header('Location: dashboard.php');
        exit();
    } else if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - FIN.</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; height: 100vh; background: var(--primary-color); }
        .login-card { background: white; padding: 40px; border-radius: 20px; width: 400px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); }
        h2 { margin-bottom: 20px; color: var(--primary-color); text-align: center; }
        .error { color: #d9534f; margin-bottom: 20px; text-align: center; }
        input { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Admin Login</h2>
        <?php if($error): ?><div class="error"><?php echo $error; ?></div><?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>
    </div>
</body>
</html>
