<?php
/**
 * MUKC – Contact Page Template
 * Template Name: Contact
 */

$site_name = get_bloginfo('name');
$logo_url = content_url('uploads/2026/02/MUKC_badge.png');
$footer_logo = content_url('uploads/2026/02/On-white.png');

$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $img = wp_get_attachment_image_src($custom_logo_id, 'full');
    if ($img) {
        $logo_url = $img[0];
    }
}

// ── FORM HANDLING ────────────────────────────────
$form_success = false;
$form_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mukc_contact_nonce'])) {
    // Basic SPAM protection: Honeypot
    if (!empty($_POST['mukc_hp_field'])) {
        // Bot filled the hidden field, just ignore/exit
        exit;
    }

    $name    = sanitize_text_field($_POST['mukc_name']);
    $email   = sanitize_email($_POST['mukc_email']);
    $message = sanitize_textarea_field($_POST['mukc_message']);

    if (empty($name) || empty($email) || empty($message)) {
        $form_error = 'Please fill out all required fields.';
    } elseif (!is_email($email)) {
        $form_error = 'Please provide a valid email address.';
    } else {
        $to = 'melbourneunikarateclub@gmail.com';
        $subject = 'MUKC Contact Form: ' . $name;
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        
        // Use a generic 'From' address that matches the domain to prevent spoofing blocks
        // and put the user's email in 'Reply-To' so you can still hit reply.
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: MUKC Website <noreply@mukc.org.au>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );

        if (wp_mail($to, $subject, $body, $headers)) {
            $form_success = true;
        } else {
            $form_error = 'There was an error sending your message. Please try again or contact us directly via email.';
        }
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us – <?php echo esc_html($site_name); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #ffffff;
            color: #111;
        }

        /* ── NAV ──────────────────────────────────────── */
        .mukc-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 48px;
            height: 76px;
            background: rgba(255, 255, 255, 0);
            transition: all 0.3s ease;
        }

        .mukc-nav.is-scrolled {
            background: rgba(255, 255, 255, 0.95);
            height: 66px;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .mukc-nav__brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }

        .mukc-nav__logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mukc-nav__brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.25;
        }

        .mukc-nav__name {
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #fff;
            transition: color 0.3s;
        }

        .mukc-nav.is-scrolled .mukc-nav__name {
            color: #111;
        }

        .mukc-nav__menu {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
        }

        .mukc-nav__menu a {
            font-size: 0.85rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
            transition: color 0.18s;
        }

        .mukc-nav__menu a:hover,
        .mukc-nav__menu .is-current a {
            color: #fff;
        }

        .mukc-nav__menu .is-current a {
            border-bottom: 1.5px solid #fff;
        }

        .mukc-nav.is-scrolled .mukc-nav__menu a {
            color: rgba(0, 0, 0, 0.70);
        }

        .mukc-nav.is-scrolled .mukc-nav__menu a:hover,
        .mukc-nav.is-scrolled .mukc-nav__menu .is-current a {
            color: #000;
        }

        .mukc-nav.is-scrolled .mukc-nav__menu .is-current a {
            border-bottom-color: #000;
        }

        /* Hamburger */
        .mukc-nav__burger {
            display: none;
            flex-direction: column;
            gap: 5px;
            margin-left: auto;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
        }

        .mukc-nav__burger span {
            display: block;
            width: 24px;
            height: 2px;
            background: #ffffff;
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .mukc-nav.is-scrolled .mukc-nav__burger span {
            background: #000;
        }

        .mukc-nav__burger.is-active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .mukc-nav__burger.is-active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-10px);
        }

        .mukc-nav__burger.is-active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ── HERO ─────────────────────────────────────── */
        .contact-hero {
            background: #232d4b;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 48px;
            margin-top: 0;
        }

        .contact-hero__title {
            color: #ffffff;
            font-size: 4rem;
            font-weight: 500;
            letter-spacing: -0.01em;
        }

        /* ── CONTENT ─────────────────────────────────── */
        .contact-section {
            padding: 100px 48px;
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 120px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .contact-info__title {
            font-size: 2.8rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .contact-info__text {
            font-size: 1.3rem;
            line-height: 1.5;
            color: #445566;
            margin-bottom: 24px;
        }

        .contact-info__small {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #667788;
        }

        /* ── FORM ────────────────────────────────────── */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #111;
        }

        .form-group span {
            font-size: 0.75rem;
            color: #777;
            font-weight: 400;
        }

        .form-input,
        .form-textarea {
            border: none !important;
            border-bottom: 2px solid #232d4b !important;
            padding: 12px 0 !important;
            font-size: 1rem;
            font-family: inherit;
            outline: none;
            transition: all 0.2s;
            background: transparent !important;
            width: 100%;
            display: block;
            border-radius: 0 !important;
            box-shadow: none !important;
            -webkit-appearance: none;
            appearance: none;
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-bottom-color: #232d4b;
        }

        .submit-btn {
            background: #232d4b;
            color: #fff;
            border: none;
            padding: 16px 40px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            align-self: flex-start;
            transition: background 0.2s;
        }

        .submit-btn:hover {
            background: #1a223a;
        }

        .form-status {
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 24px;
            font-size: 0.95rem;
        }

        .form-status--success {
            background: #e6f7ef;
            color: #1e7e34;
            border: 1px solid #c3e6cb;
        }

        .form-status--error {
            background: #fdf2f2;
            color: #dc3545;
            border: 1px solid #f5c6cb;
        }

        /* ── FOOTER ───────────────────────────────────── */
        .mukc-footer {
            background: #d9d8d0;
            padding: 48px 60px 28px;
            color: #111;
            margin-top: 60px;
        }

        .mukc-footer__top {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 36px;
        }

        .mukc-footer__brand img {
            width: 240px;
            height: auto;
            mix-blend-mode: multiply;
            opacity: 0.85;
        }

        .mukc-footer__col-title {
            font-size: 0.90rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .mukc-footer__col-body {
            font-size: 0.82rem;
            color: #444;
            line-height: 1.7;
        }

        .mukc-footer__col-body a {
            color: #444;
            text-decoration: none;
        }

        .mukc-footer__bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        .mukc-footer__copy {
            font-size: 0.75rem;
            color: #666;
        }

        .mukc-footer__social {
            display: flex;
            gap: 18px;
        }

        .mukc-footer__social svg {
            width: 22px;
            height: 22px;
            fill: #333;
        }

        @media (max-width: 900px) {
            .contact-section {
                grid-template-columns: 1fr;
                gap: 60px;
                padding: 60px 24px;
            }

            .contact-hero__title {
                font-size: 2.5rem;
            }

            .mukc-nav {
                padding: 0 18px;
            }

            .mukc-nav__brand {
                gap: 8px;
            }

            .mukc-nav__logo {
                width: 40px;
                height: 40px;
            }

            .mukc-nav__menu {
                display: none;
                position: fixed;
                inset: 0 0 0 auto;
                width: 260px;
                height: 100vh;
                background: #ffffff;
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                padding: 80px 28px 28px;
                z-index: 200;
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.05);
            }

            .mukc-nav__menu.is-open {
                display: flex;
            }

            .mukc-nav__menu li {
                width: 100%;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .mukc-nav__menu a {
                display: block;
                padding: 14px 0;
                font-size: 1rem;
                color: #000 !important;
            }

            .mukc-nav__name {
                font-size: 0.85rem;
            }

            .mukc-nav__burger {
                display: flex;
                z-index: 300;
            }

            .mukc-footer__top {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <nav class="mukc-nav">
        <a class="mukc-nav__brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img class="mukc-nav__logo" src="<?php echo esc_url($logo_url); ?>" alt="MUKC">
            <div class="mukc-nav__brand-text">
                <span class="mukc-nav__name"><?php echo esc_html($site_name); ?></span>
            </div>
        </a>
        <ul class="mukc-nav__menu">
            <li><a href="<?php echo esc_url(home_url('/about-mukc/')); ?>">About MUKC</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Our People</a></li>
            <li><a href="<?php echo esc_url(home_url('/journey/')); ?>">Journeys</a></li>
            <li><a href="<?php echo esc_url(home_url('/gears/')); ?>">Gears</a></li>
            <li class="is-current"><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a></li>
        </ul>
        <button class="mukc-nav__burger" aria-label="Toggle navigation" id="mukcBurger">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <section class="contact-hero">
        <h1 class="contact-hero__title">Your Journey Start here</h1>
    </section>

    <main class="contact-section">
        <div class="contact-info">
            <h2 class="contact-info__title">Get in Touch</h2>
            <div class="contact-info__text">
                <p>If you are around the UniMelb campus, please just come along to our training sessions! Come for a
                    chat and a trial session whilst you are at it. We are a much friendly bunch than this stoic
                    monochrome contact us form suggests.</p>
            </div>
            <div class="contact-info__small">
                <p>If your question is about trial sessions, there's no need to fill out this form. Wear comfortable
                    sports clothing, a bottle of water and gate-crash our next training session 😉</p>
            </div>
        </div>

        <div class="contact-form-container">
            <?php if ($form_success): ?>
                <div class="form-status form-status--success">
                    Thank you for your message! We'll get back to you as soon as possible.🥋
                </div>
            <?php else: ?>
                <?php if ($form_error): ?>
                    <div class="form-status form-status--error">
                        <?php echo esc_html($form_error); ?>
                    </div>
                <?php endif; ?>

                <form class="contact-form" action="" method="post">
                    <input type="hidden" name="mukc_contact_nonce" value="1">
                    <div style="display:none;">
                        <input type="text" name="mukc_hp_field" value="">
                    </div>

                    <div class="form-group">
                        <label>Name <span>(required)</span></label>
                        <input type="text" name="mukc_name" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label>Email <span>(required)</span></label>
                        <input type="email" name="mukc_email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label>Your message <span>(required)</span></label>
                        <textarea name="mukc_message" class="form-textarea" placeholder="How can we help?" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            <?php endif; ?>
        </div>
    </main>

    <footer class="mukc-footer">
        <div class="mukc-footer__top">
            <div class="mukc-footer__brand"><img src="<?php echo esc_url($footer_logo); ?>" alt="MUKC"></div>
            <div>
                <h3 class="mukc-footer__col-title">Location</h3>
                <p class="mukc-footer__col-body">Nona Lee Sports Centre - Lazer Room<br>(located in University of
                    Melbourne Parkville)</p>
            </div>
            <div style="text-align: right;">
                <h3 class="mukc-footer__col-title">Contact</h3>
                <p class="mukc-footer__col-body"><a
                        href="mailto:melbourneunikarateclub@gmail.com">melbourneunikarateclub@gmail.com</a></p>
            </div>
        </div>
        <div class="mukc-footer__bottom">
            <div class="mukc-footer__copy">&copy; 1997&ndash;2026 Melbourne University Karate Club<br>Reg. No. A0035839X<br>ABN 20 213 278 331</div>
            <div class="mukc-footer__social">
                <a href="https://www.youtube.com/@melbourneuniversitykarate" target="_blank" rel="noopener"
                    aria-label="YouTube">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.498 6.186a2.998 2.998 0 0 0-2.11-2.12C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.388.566A2.998 2.998 0 0 0 .502 6.186 31.408 31.408 0 0 0 0 12a31.408 31.408 0 0 0 .502 5.814 2.998 2.998 0 0 0 2.11 2.12C4.495 20.5 12 20.5 12 20.5s7.505 0 9.388-.566a2.998 2.998 0 0 0 2.11-2.12A31.408 31.408 0 0 0 24 12a31.408 31.408 0 0 0-.502-5.814zM9.75 15.5v-7l6.5 3.5-6.5 3.5z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/groups/132927239365" target="_blank" rel="noopener"
                    aria-label="Facebook">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.883v2.271h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/melbourneunikarateclub/" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.265.069 1.645.069 4.849s-.011 3.584-.069 4.849c-.063 1.366-.335 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.266.058-1.646.069-4.85.069s-3.584-.011-4.849-.069c-1.366-.063-2.633-.335-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.248 3.608-1.31C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 2.014 2.014.673 3.355.157 5.197.072 7.052.014 8.332 0 8.741 0 12s.014 3.668.072 4.948c.085 1.855.601 3.697 1.942 5.038 1.341 1.341 3.183 1.857 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.038-1.942 1.341-1.341 1.857-3.183 1.942-5.038C23.986 15.668 24 15.259 24 12s-.014-3.668-.072-4.948c-.085-1.855-.601-3.697-1.942-5.038C20.645.673 18.803.157 16.948.072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nav = document.querySelector('.mukc-nav');
            const burger = document.getElementById('mukcBurger');
            const menu = document.querySelector('.mukc-nav__menu');

            // Scroll Logic
            const handleScroll = () => {
                if (window.scrollY > 50) {
                    nav.classList.add('is-scrolled');
                } else {
                    nav.classList.remove('is-scrolled');
                }
            };
            window.addEventListener('scroll', handleScroll);
            handleScroll();

            // Burger Logic
            if (burger && menu) {
                burger.addEventListener('click', function (e) {
                    e.stopPropagation();
                    burger.classList.toggle('is-active');
                    menu.classList.toggle('is-open');
                    document.body.classList.toggle('no-scroll');
                });

                // Close on link click
                menu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        burger.classList.remove('is-active');
                        menu.classList.remove('is-open');
                        document.body.classList.remove('no-scroll');
                    });
                });

                // Close on outside click
                document.addEventListener('click', (e) => {
                    if (menu.classList.contains('is-open') && !menu.contains(e.target) && !burger.contains(e.target)) {
                        burger.classList.remove('is-active');
                        menu.classList.remove('is-open');
                        document.body.classList.remove('no-scroll');
                    }
                });
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>

</html>