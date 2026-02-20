<?php 
include 'includes/db.php';
include 'includes/header.php'; 

// Fetch projects from database
try {
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
    $projects = $stmt->fetchAll();
} catch (Exception $e) {
    $projects = []; // Fallback empty
}
?>

<section class="page-header" style="padding: 150px 0 50px; text-align: center; background: var(--primary-color); color: white;">
    <div class="container">
        <h1>My Projects</h1>
    </div>
</section>

<section class="projects" style="padding: 100px 0;">
    <div class="container">
        <div class="filter-btns" style="display: flex; justify-content: center; gap: 20px; margin-bottom: 50px;">
            <button class="btn active" style="background: var(--accent-color); color: white;">All</button>
            <button class="btn">Web</button>
            <button class="btn">Design</button>
            <button class="btn">Video</button>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <?php if (empty($projects)): ?>
                <!-- Dummy Project 1 -->
                <div class="project-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    <div style="height: 250px; background: #eee; background-image: url('https://via.placeholder.com/600x400'); background-size: cover;"></div>
                    <div style="padding: 30px;">
                        <h3 style="margin-bottom: 10px; color: var(--primary-color);">Modern E-commerce</h3>
                        <p style="font-size: 0.9rem; margin-bottom: 20px;">A full-stack e-commerce solution with custom dashboard.</p>
                        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                            <span style="font-size: 0.8rem; background: #f0f0f0; padding: 2px 10px; border-radius: 4px;">PHP</span>
                            <span style="font-size: 0.8rem; background: #f0f0f0; padding: 2px 10px; border-radius: 4px;">MySQL</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a href="#" style="color: var(--accent-color); font-weight: 600;">Live Demo</a>
                            <a href="#"><i data-lucide="github"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Dummy Project 2 -->
                <div class="project-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    <div style="height: 250px; background: #eee; background-image: url('https://via.placeholder.com/600x400'); background-size: cover;"></div>
                    <div style="padding: 30px;">
                        <h3 style="margin-bottom: 10px; color: var(--primary-color);">Brand Identity Design</h3>
                        <p style="font-size: 0.9rem; margin-bottom: 20px;">Logo and branding for a corporate client.</p>
                        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                            <span style="font-size: 0.8rem; background: #f0f0f0; padding: 2px 10px; border-radius: 4px;">Adobe Illustrator</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a href="#" style="color: var(--accent-color); font-weight: 600;">View Portfolio</a>
                            <i data-lucide="external-link"></i>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <!-- Project details here -->
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
