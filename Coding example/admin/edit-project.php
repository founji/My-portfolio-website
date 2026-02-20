<?php
include '../includes/auth.php';
redirectIfNotLoggedIn();
include '../includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();

if (!$project) {
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $live_link = $_POST['live_link'];
    $github_link = $_POST['github_link'];
    
    $image = $project['image_url'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . time() . "_" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = "uploads/" . basename($target_file);
        }
    }

    $stmt = $pdo->prepare("UPDATE projects SET title = ?, category = ?, description = ?, tech_stack = ?, live_link = ?, github_link = ?, image_url = ? WHERE id = ?");
    $stmt->execute([$title, $category, $description, $tech_stack, $live_link, $github_link, $image, $id]);
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project - Admin</title>
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
        <h1>Edit Project</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $project['title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="Web" <?php echo $project['category'] == 'Web' ? 'selected' : ''; ?>>Web Development</option>
                    <option value="Design" <?php echo $project['category'] == 'Design' ? 'selected' : ''; ?>>Graphic Design</option>
                    <option value="Video" <?php echo $project['category'] == 'Video' ? 'selected' : ''; ?>>Video Editing</option>
                </select>
            </div>
            <div class="form-group">
                <label>Project Image (Leave blank to keep current)</label>
                <input type="file" name="image">
                <?php if($project['image_url']): ?>
                    <p style="font-size: 0.8rem; margin-top: 5px;">Current: <?php echo $project['image_url']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4"><?php echo $project['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Tech Stack</label>
                <input type="text" name="tech_stack" value="<?php echo $project['tech_stack']; ?>">
            </div>
            <div class="form-group">
                <label>Live Link</label>
                <input type="url" name="live_link" value="<?php echo $project['live_link']; ?>">
            </div>
            <div class="form-group">
                <label>GitHub Link</label>
                <input type="url" name="github_link" value="<?php echo $project['github_link']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary" style="width: 100%;">Update Project</button>
        </form>
        <a href="dashboard.php" style="display: block; text-align: center; margin-top: 20px; color: #666;">Back to Dashboard</a>
    </div>
</body>
</html>
