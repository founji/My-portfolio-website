<?php
include '../includes/auth.php';
redirectIfNotLoggedIn();
include '../includes/db.php';

// Simple project deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: dashboard.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
$projects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .sidebar { background: var(--primary-color); color: white; width: 250px; height: 100vh; position: fixed; padding: 30px; }
        .main-content { margin-left: 250px; padding: 50px; }
        .project-table { width: 100%; border-collapse: collapse; margin-top: 30px; background: white; border-radius: 10px; overflow: hidden; }
        .project-table th, .project-table td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        .project-table th { background: #f8f9fa; }
        .btn-add { background: var(--accent-color); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin FIN.</h2>
        <ul style="margin-top: 50px;">
            <li style="margin-bottom: 20px;"><a href="dashboard.php" style="color: var(--accent-color);">Projects</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Manage Projects</h1>
            <a href="add-project.php" class="btn-add">Add Project</a>
        </div>
        
        <table class="project-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo $project['title']; ?></td>
                    <td><?php echo $project['category']; ?></td>
                    <td>
                        <a href="edit-project.php?id=<?php echo $project['id']; ?>" style="color: blue;">Edit</a> | 
                        <a href="?delete=<?php echo $project['id']; ?>" style="color: red;" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($projects)): ?>
                <tr><td colspan="3" style="text-align: center;">No projects found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>
