    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                        <div style="width:32px; height:32px; background:var(--gold); color:#0F141C; font-family:'Cinzel',serif; font-weight:700; display:flex; align-items:center; justify-content:center; border-radius:4px; font-size:16px;">M</div>
                        <h3 style="margin:0; font-size:18px;">MUSKAN INTERIORS</h3>
                    </div>
                    <p>We Design. We Build. We Transform. Complete turnkey architecture and bespoke interior craftsmanship across Patna and Bihar.</p>
                    <p style="font-size:12px; color:#64748B; margin-top:12px;">📍 <?= SITE_ADDRESS ?></p>
                </div>
                <div class="footer-links">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services Overview</a></li>
                        <li><a href="projects.php">Projects Portfolio</a></li>
                        <li><a href="process.php">5-Step Process</a></li>
                        <li><a href="contact.php">Contact Studio</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="interior-design.php">Interior Design</a></li>
                        <li><a href="exterior-design.php">Exterior Design</a></li>
                        <li><a href="construction.php">Civil Construction</a></li>
                        <li><a href="wooden-work.php">Wooden Work</a></li>
                        <li><a href="turnkey-projects.php">Turnkey Projects</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Studio Contact</h4>
                    <p>Phone: <a href="tel:<?= SITE_PHONE_1 ?>" style="color:#CBD5E1; text-decoration:none;"><?= SITE_PHONE_1 ?></a></p>
                    <p>WhatsApp: <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" style="color:#25D366; text-decoration:none;">+91 98765 43210</a></p>
                    <p>Email: <a href="mailto:<?= SITE_EMAIL ?>" style="color:#CBD5E1; text-decoration:none;"><?= SITE_EMAIL ?></a></p>
                    <p style="font-size:12px; color:#64748B; margin-top:6px;">Mon – Sat: 9:30 AM – 7:30 PM</p>
                    <p style="font-size:12px; color:var(--gold); margin-top:10px;">★ Bihar's Premier Turnkey Studio</p>
                </div>
            </div>
            <div class="footer-bottom">
                <div>© <?= date('Y') ?> Muskan Interiors. All Rights Reserved.</div>
                <div style="color:#64748B;">
                    Architecture &bull; Civil &bull; Interiors &bull; Joinery
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON (DESKTOP & TABLET) -->
    <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="floating-whatsapp-btn" id="floatingWhatsapp" title="Chat with us on WhatsApp" aria-label="Chat on WhatsApp">
        <div class="whatsapp-pulse"></div>
        <i data-lucide="message-circle" style="width:28px;height:28px;"></i>
        <span class="whatsapp-tooltip">Chat on WhatsApp</span>
    </a>

    <!-- MOBILE STICKY ACTION BAR (PHONES <= 768px) -->
    <div class="mobile-sticky-bar" id="mobileStickyBar">
        <a href="tel:<?= SITE_PHONE_1 ?>" class="mobile-bar-btn btn-call">
            <i data-lucide="phone-call" style="width:18px;height:18px;"></i>
            <span>Call Studio</span>
        </a>
        <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="mobile-bar-btn btn-wa">
            <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
            <span>WhatsApp</span>
        </a>
        <a href="contact.php" class="mobile-bar-btn btn-inquire">
            <i data-lucide="calendar" style="width:18px;height:18px;"></i>
            <span>Book Visit</span>
        </a>
    </div>

    <script src="js/main.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>
</html>
