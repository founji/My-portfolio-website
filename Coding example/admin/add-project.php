<?php
include '../includes/auth.php';
redirectIfNotLoggedIn();
include '../includes/db.php';

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $live_link = $_POST['live_link'];
    $github_link = $_POST['github_link'];
    
    // Handle image upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . time() . "_" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = "uploads/" . basename($target_file);
        }
    }

    $stmt = $pdo->prepare("INSERT INTO projects (title, category, description, tech_stack, live_link, github_link, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $category, $description, $tech_stack, $live_link, $github_link, $image]);
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Project - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .form-container { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
    </style>
</head>
<body style="background: #f8f9fa;">
    <div class="form-container">
        <h1>Add New Project</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="Web">Web Development</option>
                    <option value="Design">Graphic Design</option>
                    <option value="Video">Video Editing</option>
                </select>
            </div>
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label>Tech Stack (comma separated)</label>
                <input type="text" name="tech_stack" placeholder="PHP, MySQL, CSS">
            </div>
            <div class="form-group">
                <label>Live Link</label>
                <input type="url" name="live_link">
            </div>
            <div class="form-group">
                <label>GitHub Link</label>
                <input type="url" name="github_link">
            </div>
            <button type="submit" name="add" class="btn btn-primary" style="width: 100%;">Add Project</button>
        </form>
        <a href="dashboard.php" style="display: block; text-align: center; margin-top: 20px; color: #666;">Back to Dashboard</a>
    </div>
</body>
</html>
