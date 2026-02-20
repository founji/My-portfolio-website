<?php include 'includes/header.php'; ?>

<section class="page-header" style="padding: 150px 0 50px; text-align: center; background: var(--primary-color); color: white;">
    <div class="container">
        <h1>Contact Me</h1>
    </div>
</section>

<section class="contact" style="padding: 100px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 50px;">
            <div class="contact-info">
                <h2 style="color: var(--primary-color); margin-bottom: 2rem;">Get In Touch</h2>
                <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 15px;">
                    <i data-lucide="mail" color="var(--accent-color)"></i>
                    <span>contact@founji.com</span>
                </div>
                <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 15px;">
                    <i data-lucide="phone" color="var(--accent-color)"></i>
                    <span>+123 456 7890</span>
                </div>
                <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 15px;">
                    <i data-lucide="map-pin" color="var(--accent-color)"></i>
                    <span>City, Country</span>
                </div>
                
                <div class="social-links" style="display: flex; gap: 20px; margin-top: 3rem;">
                    <a href="#"><i data-lucide="github"></i></a>
                    <a href="#"><i data-lucide="linkedin"></i></a>
                    <a href="#"><i data-lucide="twitter"></i></a>
                </div>
            </div>
            
            <div class="contact-form">
                <form action="#" method="POST" style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 5px;">Full Name</label>
                            <input type="text" name="name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px;">Email Address</label>
                            <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 5px;">Subject</label>
                        <input type="text" name="subject" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 5px;">Message</label>
                        <textarea name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
