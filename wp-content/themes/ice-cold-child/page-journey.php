<?php
/**
 * MUKC – Journey Page Template
 * Template Name: Journey
 */

$site_name = get_bloginfo('name');
$logo_url = content_url('uploads/2026/02/MUKC_badge.png');
$footer_logo = content_url('uploads/2026/02/On-white.png');

// Assets
$hero_bg = content_url('uploads/2026/02/IMG_4738-scaled.jpg');
$camp_img = content_url('uploads/2026/02/9febc689a300d495ee6764cca5414690.jpeg');
$lbkt_img = content_url('uploads/2026/02/8dcde18aad760d180471bf872c3914d0-scaled.jpeg');
$lny_img = content_url('uploads/2026/02/LNY-performance.jpg');
$clubs_img = content_url('uploads/2026/02/Clubs-Day-Semester-02-2025-5.jpg');

$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $img = wp_get_attachment_image_src($custom_logo_id, 'full');
    if ($img) {
        $logo_url = $img[0];
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journey – <?php echo esc_html($site_name); ?></title>
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
            background: #1a1a1a;
            color: #ffffff;
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
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s ease;
        }

        .mukc-nav.is-scrolled {
            background: rgba(8, 8, 8, 0.95);
            height: 66px;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .mukc-nav__brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            flex-shrink: 0;
            transition: opacity 0.3s ease;
        }

        .mukc-nav__brand:hover {
            opacity: 0.85;
        }

        .mukc-nav__logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
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
            color: #ffffff;
            transition: all 0.4s ease;
        }

        .mukc-nav__brand:hover .mukc-nav__name {
            background: linear-gradient(135deg, #ffffff 0%, #bdc3c7 50%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: silverShift 2s linear infinite;
        }

        @keyframes silverShift {
            to {
                background-position: 200% center;
            }
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
            color: rgba(255, 255, 255, 0.70);
            text-decoration: none;
            transition: color 0.18s;
        }

        .mukc-nav__menu a:hover,
        .mukc-nav__menu .is-current a {
            color: #ffffff;
        }

        .mukc-nav__menu .is-current a {
            border-bottom: 1.5px solid #ffffff;
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
        .journey-hero {
            position: relative;
            height: 70vh;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #000;
        }

        .journey-hero__bg {
            position: absolute;
            inset: 0;
            background-image: url('<?php echo esc_url($hero_bg); ?>');
            background-size: cover;
            background-position: center 80%;
            filter: brightness(0.8);
        }

        /* ── CLUB EVENTS ────────────────────────────── */
        .events-section {
            padding: 100px 60px;
            background: #1a1a1a;
        }

        .events-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .events-header {
            margin-bottom: 60px;
        }

        .events-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .events-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .events-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .event-card {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .event-img-wrap {
            width: 100%;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .event-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .event-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-name {
            font-size: 1.6rem;
            font-weight: 600;
        }

        .event-desc {
            font-size: 0.95rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.7);
            text-wrap: pretty;
        }

        .event-desc a {
            color: #ffffff;
            font-weight: 500;
        }

        .journey-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.4);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.2s ease;
            margin-top: 10px;
            width: fit-content;
        }

        .journey-btn:hover {
            background: #ffffff;
            color: #111111;
            border-color: #ffffff;
        }

        /* ── FOOTER ───────────────────────────────────── */
        .mukc-footer {
            background: #d9d8d0;
            padding: 48px 60px 28px;
            color: #111;
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
            .events-grid {
                grid-template-columns: 1fr;
            }

            .events-section {
                padding: 60px 24px;
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
                background: #0d0d0d;
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                padding: 80px 28px 28px;
                z-index: 200;
            }

            .mukc-nav__menu.is-open {
                display: flex;
            }

            .mukc-nav__menu li {
                width: 100%;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            }

            .mukc-nav__menu a {
                display: block;
                padding: 14px 0;
                font-size: 1rem;
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
            <li class="is-current"><a href="<?php echo esc_url(home_url('/journey/')); ?>">Journeys</a></li>
            <li><a href="<?php echo esc_url(home_url('/gear/')); ?>">Gear</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a></li>
        </ul>
        <button class="mukc-nav__burger" aria-label="Toggle navigation" id="mukcBurger">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <section class="journey-hero">
        <div class="journey-hero__bg"></div>
    </section>

    <section class="events-section">
        <div class="events-container">
            <div class="events-header">
                <h2 class="events-title">Club Events</h2>
                <p class="events-subtitle">Annual events, and other social events</p>
            </div>

            <div class="events-grid">
                <!-- Martial Arts Camp -->
                <div class="event-card">
                    <div class="event-img-wrap">
                        <img class="event-img" src="<?php echo esc_url($camp_img); ?>" alt="Martial Arts Camp">
                    </div>
                    <div class="event-info">
                        <h3 class="event-name">Martial arts camp</h3>
                        <p class="event-desc">
                            We held our annual camp, during the mid of the April, with
                            <a href="#">Melbourne University Rhee Taekwondo</a> and
                            <a href="#">Melbourne University Wushu Kung Fu</a> clubs.
                        </p>
                        <a href="https://forms.gle/YoazBbPkdhb9nR7cA" target="_blank" class="journey-btn">Register for Camp &rarr;</a>
                    </div>
                </div>

                <!-- Lion Bushido Tournament -->
                <div class="event-card">
                    <div class="event-img-wrap">
                        <img class="event-img" src="<?php echo esc_url($lbkt_img); ?>" alt="Lion Bushido Tournament">
                    </div>
                    <div class="event-info">
                        <h3 class="event-name">Lion bushido karate tournament</h3>
                        <p class="event-desc">
                            Each August, our club participates in the Lion Bushido Karate Tournament,
                            an opportunity to put our skills and the lessons from the past year to the test.
                        </p>
                        <a href="#" class="journey-btn">Learn More &rarr;</a>
                    </div>
                </div>

                <!-- Lunar New Year Performance -->
                <div class="event-card">
                    <div class="event-img-wrap">
                        <img class="event-img" src="<?php echo esc_url($lny_img); ?>" alt="Lunar New Year Performance">
                    </div>
                    <div class="event-info">
                        <h3 class="event-name">Lunar new year performance</h3>
                        <p class="event-desc">
                            We celebrate the Lunar New Year with dynamic karate demonstrations,
                            showcasing traditional kata and powerful techniques to the university community.
                        </p>
                        <a href="#" class="journey-btn">Watch Highlights &rarr;</a>
                    </div>
                </div>

                <!-- Clubs Day -->
                <div class="event-card">
                    <div class="event-info">
                        <div class="event-img-wrap">
                            <img class="event-img" src="<?php echo esc_url($clubs_img); ?>" alt="Clubs Day">
                        </div>
                        <h3 class="event-name">Clubs day</h3>
                        <p class="event-desc">
                            Every semester, we welcome new students at Clubs Day. It's the perfect
                            opportunity to meet the team, ask questions, and start your karate journey with us.
                        </p>
                        <a href="/contact" class="journey-btn">How to Join &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            <div class="mukc-footer__copy">&copy; 1997&ndash;2026 Melbourne University Karate Club<br>Reg. No.
                A0035839X<br>ABN 20 213 278 331</div>
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