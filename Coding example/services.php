<?php include 'includes/header.php'; ?>

<section class="page-header" style="padding: 150px 0 50px; text-align: center; background: var(--primary-color); color: white;">
    <div class="container">
        <h1>My Services</h1>
    </div>
</section>

<section class="services" style="padding: 100px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <!-- Service Card 1 -->
            <div class="service-card" style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; transition: var(--transition);">
                <div style="color: var(--accent-color); margin-bottom: 1.5rem;"><i data-lucide="code" size="48"></i></div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Web Development</h3>
                <p>Creating responsive and high-performance websites tailored to your business needs.</p>
            </div>
            <!-- Service Card 2 -->
            <div class="service-card" style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; transition: var(--transition);">
                <div style="color: var(--accent-color); margin-bottom: 1.5rem;"><i data-lucide="palette" size="48"></i></div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Graphic Design</h3>
                <p>Visual storytelling through modern and impactful design solutions.</p>
            </div>
            <!-- Service Card 3 -->
            <div class="service-card" style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; transition: var(--transition);">
                <div style="color: var(--accent-color); margin-bottom: 1.5rem;"><i data-lucide="video" size="48"></i></div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Video Editing</h3>
                <p>Professional video production and editing to bring your content to life.</p>
            </div>
            <!-- Service Card 4 -->
            <div class="service-card" style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; transition: var(--transition);">
                <div style="color: var(--accent-color); margin-bottom: 1.5rem;"><i data-lucide="trending-up" size="48"></i></div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Digital Marketing</h3>
                <p>Strategic marketing campaigns to grow your brand and reach your audience.</p>
            </div>
        </div>
    </div>
</section>

<style>
.service-card:hover {
    transform: translateY(-10px);
    background: var(--primary-color) !important;
    color: white !important;
}
.service-card:hover h3, .service-card:hover div {
    color: white !important;
}
</style>

<?php include 'includes/footer.php'; ?>
