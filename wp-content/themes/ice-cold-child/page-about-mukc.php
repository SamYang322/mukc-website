<?php
/**
 * MUKC – About Page Template
 * Template Name: About MUKC
 *
 * Loaded via WordPress template hierarchy (page-about-mukc.php).
 * Self-contained — zero Ice Cold markup. All styles inline.
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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About MUKC – <?php echo esc_html($site_name); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        /* ============================================================
   MUKC ABOUT PAGE — fully self-contained styles
   ============================================================ */

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
            background: #111111;
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
            background: #111111;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            transition: all 0.3s ease;
        }

        .mukc-nav.is-scrolled {
            height: 66px;
            background: rgba(17, 17, 17, 0.95);
            backdrop-filter: blur(8px);
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
            letter-spacing: 0.01em;
            transition: color 0.18s;
            padding-bottom: 3px;
        }

        .mukc-nav__menu a:hover {
            color: #ffffff;
        }

        .mukc-nav__menu .is-current a {
            color: #ffffff;
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

        @media (max-width: 900px) {
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
        }

        /* ── SECTION CORE ───────────────────────────── */
        .mukc-section {
            padding: 96px 60px;
            width: 100%;
        }

        .mukc-section--first {
            padding-top: 160px;
        }

        .mukc-banner {
            width: 100%;
            display: block;
        }

        .mukc-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .mukc-heading {
            font-size: clamp(2.2rem, 4vw, 3.4rem);
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 40px;
        }

        .mukc-text-block {
            max-width: 850px;
        }

        .mukc-lead {
            font-size: 1.1rem;
            font-weight: 400;
            color: #ffffff;
            line-height: 1.75;
            margin-bottom: 22px;
            text-wrap: pretty;
        }

        .mukc-lead strong {
            font-weight: 600;
        }

        .mukc-body {
            font-size: 0.88rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.80);
            line-height: 1.8;
            margin-bottom: 18px;
            text-wrap: pretty;
        }

        .mukc-body strong {
            font-weight: 600;
            color: #ffffff;
        }

        /* ── HISTORY TOGGLE ─────────────────────────── */
        .history-more-content {
            display: none;
            margin-top: 18px;
        }

        .history-more-content.is-expanded {
            display: block;
        }

        .history-toggle-btn {
            background: none;
            border: none;
            color: #888888;
            font-size: 0.88rem;
            font-family: inherit;
            cursor: pointer;
            padding: 8px 0;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .history-toggle-btn:hover {
            color: #ffffff;
        }

        .history-toggle-btn svg {
            width: 14px;
            height: 14px;
            fill: currentColor;
            transition: transform 0.3s ease;
        }

        .history-toggle-btn.is-expanded svg {
            transform: rotate(180deg);
        }

        /* Two-column layout tweak for Section 1 */
        .wwp-grid,
        .history-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 80px;
            align-items: center;
        }

        .history-grid {
            grid-template-columns: 420px 1fr;
        }

        .wwp-symbol svg,
        .wwp-symbol img {
            width: 100%;
            max-width: 380px;
            height: auto;
        }

        /* ── HISTORY MONTAGE ────────────────────────── */
        .history-montage {
            position: relative;
            aspect-ratio: 4 / 3;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            max-width: 380px;
            width: 100%;
        }

        .history-montage img.montage-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            max-width: 100%;
            opacity: 0;
            animation: historyCrossfade 28s infinite;
            border-radius: 0;
        }

        .history-montage .montage-img:nth-child(1) {
            animation-delay: 0s;
        }

        .history-montage .montage-img:nth-child(2) {
            animation-delay: 4s;
        }

        .history-montage .montage-img:nth-child(3) {
            animation-delay: 8s;
        }

        .history-montage .montage-img:nth-child(4) {
            animation-delay: 12s;
        }

        .history-montage .montage-img:nth-child(5) {
            animation-delay: 16s;
        }

        .history-montage .montage-img:nth-child(6) {
            animation-delay: 20s;
        }

        .history-montage .montage-img:nth-child(7) {
            animation-delay: 24s;
        }

        @keyframes historyCrossfade {
            0% {
                opacity: 0;
                transform: scale(1.05);
            }

            5% {
                opacity: 1;
                transform: scale(1);
            }

            25% {
                opacity: 1;
                transform: scale(1);
            }

            30% {
                opacity: 0;
                transform: scale(1.05);
            }

            100% {
                opacity: 0;
                transform: scale(1.05);
            }
        }

        /* ── FOOTER ───────────────────────────────────── */
        .mukc-footer {
            background: #d9d8d0;
            padding: 48px 60px 28px;
            margin-top: 0;
        }

        .mukc-footer__top {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 40px;
            align-items: start;
            margin-bottom: 36px;
        }

        .mukc-footer__brand img {
            width: 240px;
            height: auto;
            display: block;
            mix-blend-mode: multiply;
            opacity: 0.85;
        }

        .mukc-footer__col-title {
            font-size: 0.90rem;
            font-weight: 600;
            color: #111111;
            margin-bottom: 12px;
        }

        .mukc-footer__col-body {
            font-size: 0.82rem;
            color: #444444;
            line-height: 1.7;
        }

        .mukc-footer__col-body a {
            color: #444444;
            text-decoration: none;
        }

        .mukc-footer__col-body a:hover {
            text-decoration: underline;
        }

        .mukc-footer__col-center {
            text-align: center;
        }

        .mukc-footer__col-right {
            text-align: right;
        }

        .mukc-footer__col-right .mukc-footer__col-body {
            text-align: right;
        }

        .mukc-footer__bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(0, 0, 0, 0.12);
            padding-top: 20px;
        }

        .mukc-footer__copy {
            font-size: 0.75rem;
            color: #666666;
        }

        .mukc-footer__social {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mukc-footer__social a {
            display: flex;
            align-items: center;
            color: #333333;
            transition: color 0.2s;
        }

        .mukc-footer__social a:hover {
            color: #000000;
        }

        .mukc-footer__social svg {
            width: 22px;
            height: 22px;
            fill: currentColor;
        }

        /* ── SECTION 2: KATA ─────────────────────────── */
        .kata-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .kata-card {
            text-decoration: none;
            transition: transform 0.2s;
        }

        .kata-card:hover {
            transform: translateY(-5px);
        }

        .kata-video-thumb {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .kata-video-thumb::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url('https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_Logo_2017.svg') no-repeat center;
            background-size: 60px;
            opacity: 0.9;
        }

        .kata-card-title {
            font-size: 0.88rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.90);
        }

        .kata-footer-note {
            font-size: 0.82rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.70);
            line-height: 1.7;
            max-width: 850px;
            text-wrap: pretty;
        }

        .kata-footer-note strong {
            font-weight: 600;
            color: #ffffff;
        }

        /* ── SECTION 6: GRADING ──────────────────────── */
        .mukc-grading__list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 40px;
            margin-bottom: 32px;
        }

        .mukc-grading__header {
            display: grid;
            grid-template-columns: 25% 60% 15%;
            padding: 0 24px 12px;
            font-size: 0.85rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mukc-grading__row {
            display: grid;
            grid-template-columns: 25% 60% 15%;
            padding: 24px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 8px;
            align-items: center;
            transition: background 0.2s;
        }

        .mukc-grading__row:nth-child(even) {
            background: rgba(255, 255, 255, 0.04);
        }

        .mukc-grading__row:hover {
            background: rgba(255, 255, 255, 0.07);
        }

        .mukc-grading__rank {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .mukc-grading__rank-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.4;
        }

        .mukc-grading__rank-text span {
            display: block;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            margin-top: 4px;
        }

        .mukc-grading__belt {
            width: 28px;
            height: 16px;
            background: var(--belt);
            border-radius: 2px;
            position: relative;
            margin-top: 4px;
            flex-shrink: 0;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.15);
        }

        .mukc-grading__belt::after {
            content: '';
            position: absolute;
            top: 0;
            right: 4px;
            width: 6px;
            height: 100%;
            background: var(--stripe);
            display: block;
        }

        .mukc-grading__criteria {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.6;
        }

        .mukc-grading__criteria div {
            margin-bottom: 4px;
        }

        .mukc-grading__criteria div:last-child {
            margin-bottom: 0;
        }

        .mukc-grading__cost {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            text-align: right;
        }

        .mukc-grading__cost span {
            font-size: 0.8rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.5);
            margin-right: 6px;
        }

        .mukc-grading__more {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.6s ease, opacity 0.6s ease, padding 0.6s ease;
        }

        .mukc-grading__more.is-expanded {
            max-height: 2500px;
            opacity: 1;
            padding-top: 12px;
        }

        .mukc-grading__toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            padding: 14px 24px;
            margin: 20px auto 0;
            border-radius: 4px;
            transition: all 0.2s ease;
            width: 100%;
            max-width: 300px;
        }

        .mukc-grading__toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .mukc-grading__toggle svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
            transition: transform 0.3s ease;
        }

        .mukc-grading__toggle[aria-expanded="true"] svg {
            transform: rotate(180deg);
        }

        .mukc-grading__note {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 32px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .mukc-grading__header {
                display: none;
            }

            .mukc-grading__row {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px;
            }

            .mukc-grading__cost {
                text-align: left;
                padding-top: 12px;
                border-top: 1px solid rgba(255, 255, 255, 0.05);
            }

            .mukc-grading__cost span {
                display: none;
            }

            .mukc-grading__cost::before {
                content: 'Fee: $';
                font-size: 1.15rem;
                font-weight: 700;
                color: #ffffff;
            }
        }

        /* ── BANNER IMAGES ───────────────────────────── */
        .mukc-banner {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 4px;
            margin-top: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        /* ── VIDEO MODAL ────────────────────────────── */
        .video-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.92);
            z-index: 2100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            backdrop-filter: blur(5px);
        }

        .video-modal.is-active {
            display: flex;
        }

        .video-modal__content {
            position: relative;
            width: 100%;
            max-width: 900px;
            aspect-ratio: 16 / 9;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 50px rgba(255, 255, 255, 0.1);
        }

        .video-modal__content iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-modal__close {
            position: absolute;
            top: -45px;
            right: -5px;
            background: none;
            border: none;
            color: #fff;
            font-size: 2.5rem;
            cursor: pointer;
            line-height: 1;
            transition: transform 0.3s ease;
        }

        .video-modal__close:hover {
            transform: rotate(90deg);
        }

        @media (max-width: 600px) {
            .video-modal__close {
                top: -35px;
                right: 0;
                font-size: 2rem;
            }
        }

        @media (max-width: 900px) {

            .wwp-grid,
            .history-grid {
                grid-template-columns: 1fr;
                gap: 48px;
            }

            .wwp-symbol {
                order: -1;
            }

            .wwp-symbol img {
                max-width: 240px;
            }

            .history-montage {
                max-width: 100%;
            }

            .mukc-section {
                padding: 60px 28px;
            }

            .kata-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .mukc-footer {
                padding: 36px 24px 20px;
            }

            .mukc-footer__top {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .mukc-footer__col-body,
            .mukc-footer__col-right .mukc-footer__col-body {
                text-align: left;
            }

            .mukc-footer__col-center,
            .mukc-footer__col-right {
                text-align: left;
            }

            .kata-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body <?php body_class('mukc-about'); ?>>
    <?php wp_body_open(); ?>

    <!-- ── NAVBAR ─────────────────────────────────── -->
    <nav class="mukc-nav" aria-label="Main navigation">

        <a class="mukc-nav__brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img class="mukc-nav__logo" src="<?php echo esc_url($logo_url); ?>"
                alt="<?php echo esc_attr($site_name); ?> crest" width="50" height="50">
            <div class="mukc-nav__brand-text">
                <span class="mukc-nav__name"><?php echo esc_html($site_name); ?></span>
            </div>
        </a>

        <ul class="mukc-nav__menu">
            <li class="is-current"><a href="<?php echo esc_url(home_url('/about-mukc/')); ?>">About MUKC</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Our People</a></li>
            <li><a href="<?php echo esc_url(home_url('/journey/')); ?>">Journeys</a></li>
            <li><a href="<?php echo esc_url(home_url('/gear/')); ?>">Gear</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a></li>
        </ul>

        <button class="mukc-nav__burger" aria-label="Toggle navigation" id="mukcBurger">
            <span></span><span></span><span></span>
        </button>

    </nav>

    <!-- ══════════════════════════════════════════════
     SECTION 1 — WHAT WE PRACTICE
     ══════════════════════════════════════════════ -->
    <section class="mukc-section mukc-section--first" style="background: #111111;">
        <div class="mukc-container">
            <div class="wwp-grid">
                <div class="mukc-text-block">
                    <h1 class="mukc-heading">What We Practice</h1>
                    <p class="mukc-lead">
                        At Melbourne University Karate Club, we practice karate inspired by traditional Okinawan roots,
                        combining <strong>Shotokan fundamentals</strong> with a unique, modern sparring approach.
                    </p>
                    <p class="mukc-body">
                        Our training covers <strong>Kata, Bunkai, Kumite, and Weapons</strong>. Helping members build
                        strong
                        foundations, coordination, and confidence. Classes are suitable for complete beginners through
                        to advanced students, with experienced instructors providing clear guidance
                        and&nbsp;individual&nbsp;feedback.
                    </p>
                    <p class="mukc-body">
                        We value discipline, respect, and continuous self-improvement, both inside and
                        outside&nbsp;the&nbsp;dojo.
                    </p>
                    <p class="mukc-body">
                        Alongside training, we foster a strong sense of community through gradings, tournaments, and
                        social events, making the club a place to grow, challenge yourself, and
                        train&nbsp;with&nbsp;friends.
                    </p>
                </div>
                <!-- Right: Shotokan symbol (uploaded image) -->
                <div class="wwp-symbol">
                    <img src="<?php echo esc_url(content_url('uploads/2026/02/Shotokan-1.png')); ?>"
                        alt="Shotokan karate symbol">
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 1A — CLUB HISTORY
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #22314e;">
        <div class="mukc-container">
            <div class="history-grid">
                <!-- Left: Historical Photo Montage -->
                <div class="wwp-symbol history-montage">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/1978-Roger-Brain-kicking-Portland.jpg')); ?>"
                        alt="1978 Portland Camp">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/1979-Portland-camp.-Alan-Stafford-and-Mike-Dyall-Smith-kicking.jpg')); ?>"
                        alt="1979 Portland Camp">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/1999-MU-Karate-Camp-Portsea-99-camp.jpg')); ?>"
                        alt="1999 Portsea Camp">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/2006.10-Alex-Albert-Miao-Chai.jpg')); ?>"
                        alt="2006 MUKC Members">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/2003.02-MUKC-Black-dan-gradings.jpg')); ?>"
                        alt="2003 Black Dan Gradings">
                    <img class="montage-img"
                        src="<?php echo esc_url(content_url('uploads/2026/02/Water_sports_L.jpg')); ?>"
                        alt="MUKC Water Sports">
                    <img class="montage-img" src="<?php echo esc_url(content_url('uploads/2026/02/IMG_0147.jpg')); ?>"
                        alt="MUKC Historical Photo">
                </div>
                <!-- Right: Text Content -->
                <div class="mukc-text-block">
                    <h2 class="mukc-heading">Our History</h2>
                    <p class="mukc-lead">
                        Founded in 1968, Melbourne University Karate Club (MUKC) is one of the oldest karate clubs in
                        Australia and a proud member of the University of Melbourne Sports Association. Thousands of
                        students have trained with the club over the decades.
                    </p>

                    <div class="history-more-content" id="historyMore">
                        <p class="mukc-body">
                            MUKC was established under the leadership of Sensei Paul Guerillot, a French martial artist
                            whose teaching combined Shotokan karate, savate, kendo, and meditative practice. He viewed
                            karate as a path of self-development — a "yoga in action" — emphasising discipline, mental
                            strength, and the cultivation of energy over competition.
                        </p>
                        <p class="mukc-body">
                            After his passing in 1995, the club entered a period of transition and reaffirmed its
                            independence. Through the leadership of senior instructors including Sensei Meng Ng and
                            Sensei Alexander Albert, MUKC evolved into a more holistic and open martial arts community.
                        </p>
                        <p class="mukc-body">
                            Today, under the guidance of Sensei Alexander Albert (training with MUKC since 1974), the
                            club continues to honour its Okinawan and Shotokan roots while incorporating broader martial
                            influences. Training balances kata and bunkai, sparring and grappling, traditional
                            discipline and practical self-defence — maintaining a complete and evolving martial arts
                            system.
                        </p>
                        <p class="mukc-body" style="margin-bottom: 0;">
                            MUKC remains committed to inclusivity, growth, and the lifelong journey of karate.
                        </p>
                    </div>

                    <button class="history-toggle-btn" id="historyToggle" aria-expanded="false"
                        aria-controls="historyMore">
                        <span>Read more</span>
                        <svg viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 2 — KATA
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #111111;">
        <div class="mukc-container">
            <div class="mukc-text-block">
                <h2 class="mukc-heading">Kata</h2>
                <p class="mukc-body" style="font-size: 0.95rem;">
                    Kata are set sequences of movements practiced in karate, usually performed solo to develop
                    technique, balance,&nbsp;and&nbsp;focus.<br>
                    Our club teaches <strong>Shotokan-style kata</strong>, which form a core part of training and are
                    <strong>required&nbsp;for&nbsp;gradings</strong>.
                </p>
            </div>

            <div class="kata-grid">
                <!-- Shodan -->
                <a href="https://www.youtube.com/watch?v=hAoH0m4O6s8" class="kata-card video-trigger"
                    data-video-id="hAoH0m4O6s8">
                    <div class="kata-video-thumb"
                        style="background-image: url('https://img.youtube.com/vi/hAoH0m4O6s8/mqdefault.jpg');"></div>
                    <span class="kata-card-title">Taikyoku Shodan (1st)</span>
                </a>
                <!-- Nidan -->
                <a href="https://www.youtube.com/watch?v=fs_orf7ufj0" class="kata-card video-trigger"
                    data-video-id="fs_orf7ufj0">
                    <div class="kata-video-thumb"
                        style="background-image: url('https://img.youtube.com/vi/fs_orf7ufj0/mqdefault.jpg');"></div>
                    <span class="kata-card-title">Taikyoku Nidan (2nd)</span>
                </a>
                <!-- Sandan -->
                <a href="https://www.youtube.com/watch?v=0lHywewxmzg" class="kata-card video-trigger"
                    data-video-id="0lHywewxmzg">
                    <div class="kata-video-thumb"
                        style="background-image: url('https://img.youtube.com/vi/0lHywewxmzg/mqdefault.jpg');"></div>
                    <span class="kata-card-title">Taikyoku Sandan (3rd)</span>
                </a>
                <!-- Yondan -->
                <a href="https://www.youtube.com/watch?v=HzfwYMjPcXc" class="kata-card video-trigger"
                    data-video-id="HzfwYMjPcXc">
                    <div class="kata-video-thumb"
                        style="background-image: url('https://img.youtube.com/vi/HzfwYMjPcXc/mqdefault.jpg');"></div>
                    <span class="kata-card-title">Taikyoku Yondan (4th)</span>
                </a>
            </div>

            <p class="kata-footer-note">
                The kata practiced at MUKC is continually evolving. These videos serve as a <strong>foundational
                    reference only</strong>. Students are strongly encouraged to seek guidance from our senior
                instructors to refine the details, timing, and intent of each movement once the kata
                has&nbsp;been&nbsp;learned.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 3 — BUNKAI
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #22314e;">
        <div class="mukc-container">
            <div class="mukc-text-block">
                <h2 class="mukc-heading">Bunkai</h2>
                <p class="mukc-body" style="font-size: 1rem; margin-bottom: 24px;">
                    Bunkai is the part of kata where we explore the <strong>real applications</strong> behind each
                    movement.<br>
                    At our club, this is the part we emphasize the most, helping students understand and
                    practice&nbsp;techniques&nbsp;effectively.
                </p>
            </div>
            <img class="mukc-banner" src="<?php echo esc_url(content_url('uploads/2026/02/12.jpg')); ?>"
                alt="MUKC Bunkai training">
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 4 — KUMITE
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #111111;">
        <div class="mukc-container">
            <div class="mukc-text-block">
                <h2 class="mukc-heading">Kumite</h2>
                <p class="mukc-body" style="font-size: 1rem; margin-bottom: 24px;">
                    Kumite means <strong>sparring</strong> in karate. At our club, we practice both point sparring and
                    continuous sparring, allowing students to develop timing, distance, and control. We use light
                    contact, with clear rules in place to keep training safe and controlled. Kumite is introduced
                    progressively, helping students build confidence while respecting their&nbsp;training&nbsp;partners.
                </p>
            </div>
            <img class="mukc-banner" src="<?php echo esc_url(content_url('uploads/2026/02/IMG_5006.png')); ?>"
                alt="MUKC Kumite training">
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 5 — WEAPONS
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #22314e;">
        <div class="mukc-container">
            <div class="mukc-text-block">
                <h2 class="mukc-heading">Weapons</h2>
                <p class="mukc-body" style="font-size: 1rem; margin-bottom: 24px;">
                    At MUKC, weapons training forms part of our broader karate curriculum. We practise bo (staff) kata
                    to develop control, coordination, and precision, and study their practical applications through
                    structured partner drills.
                </p>
            </div>
            <img class="mukc-banner" src="<?php echo esc_url(content_url('uploads/2026/02/Weapon.jpg')); ?>"
                alt="MUKC Weapons training">
        </div>
    </section>

    <!-- ══════════════════════════════════════════════
     SECTION 6 — GRADING
     ══════════════════════════════════════════════ -->
    <section class="mukc-section" style="background: #111111;">
        <div class="mukc-container">
            <div class="mukc-text-block" style="max-width: 800px; margin-bottom: 40px;">
                <h2 class="mukc-heading">Grading</h2>
                <p class="mukc-body" style="font-size: 0.95rem; line-height: 1.7; margin-bottom: 12px;">
                    Gradings are held to assess students' progress and award new ranks. The specific requirements for
                    each belt level differ, however, for all gradings it is expected you perform kata and applications
                    (bunkai).<br>
                    Below are the criteria and fees for each grade.
                </p>
            </div>

            <div class="mukc-grading__list">

                <div class="mukc-grading__header">
                    <div>Rank</div>
                    <div>Criteria</div>
                    <div style="text-align: right;">Cost</div>
                </div>

                <div class="mukc-grading__row">
                    <div class="mukc-grading__rank">
                        <div class="mukc-grading__belt" style="--belt: #f1c40f; --stripe: transparent;"></div>
                        <div class="mukc-grading__rank-text">10th Kyu <span>Yellow Belt</span></div>
                    </div>
                    <div class="mukc-grading__criteria">
                        <div><strong>Kata:</strong> 1st &amp; 2nd Kata Taikyokyu</div>
                        <div><strong>Bunkai:</strong> 2 applications from each kata</div>
                    </div>
                    <div class="mukc-grading__cost"><span>$</span>45</div>
                </div>

                <div class="mukc-grading__row">
                    <div class="mukc-grading__rank">
                        <div class="mukc-grading__belt" style="--belt: #f1c40f; --stripe: #e67e22;"></div>
                        <div class="mukc-grading__rank-text">9th Kyu <span>Yellow Belt (Stripe)</span></div>
                    </div>
                    <div class="mukc-grading__criteria">
                        <div><strong>Kata:</strong> 3rd &amp; 4th Kata Taikyokyu</div>
                        <div><strong>Bunkai:</strong> 4 applications from each kata</div>
                    </div>
                    <div class="mukc-grading__cost"><span>$</span>50</div>
                </div>

                <div class="mukc-grading__row">
                    <div class="mukc-grading__rank">
                        <div class="mukc-grading__belt" style="--belt: #e67e22; --stripe: transparent;"></div>
                        <div class="mukc-grading__rank-text">8th Kyu <span>Orange Belt</span></div>
                    </div>
                    <div class="mukc-grading__criteria">
                        <div><strong>Kata:</strong> 5th &amp; 6th Kata Taikyokyu</div>
                        <div><strong>Bunkai:</strong> 4 applications from each kata + continuous free flow of 6th kata
                            applications</div>
                    </div>
                    <div class="mukc-grading__cost"><span>$</span>55</div>
                </div>

                <div class="mukc-grading__row">
                    <div class="mukc-grading__rank">
                        <div class="mukc-grading__belt" style="--belt: #e67e22; --stripe: #2ecc71;"></div>
                        <div class="mukc-grading__rank-text">7th Kyu <span>Orange Belt (Stripe)</span></div>
                    </div>
                    <div class="mukc-grading__criteria">
                        <div><strong>Kata:</strong> Pinan 2 (ni)</div>
                        <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                    </div>
                    <div class="mukc-grading__cost"><span>$</span>60</div>
                </div>

                <!-- Hidden Ranks Wrapper -->
                <div class="mukc-grading__more" id="gradingMore">

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #2ecc71; --stripe: transparent;"></div>
                            <div class="mukc-grading__rank-text">6th Kyu <span>Green Belt</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Pinan 1 (sho)</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>65</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #2ecc71; --stripe: #3498db;"></div>
                            <div class="mukc-grading__rank-text">5th Kyu <span>Green Belt (Stripe)</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Tensho</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>70</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #3498db; --stripe: transparent;"></div>
                            <div class="mukc-grading__rank-text">4th Kyu <span>Blue Belt</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Pinan 3 (sandan)</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>75</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #3498db; --stripe: #8b4513;"></div>
                            <div class="mukc-grading__rank-text">3rd Kyu <span>Blue Belt (Stripe)</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Pinan 4 (yondan)</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>80</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #8b4513; --stripe: transparent;"></div>
                            <div class="mukc-grading__rank-text">2nd Kyu <span>Brown Belt</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Pinan 5 (godan)</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>85</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #8b4513; --stripe: #111111;"></div>
                            <div class="mukc-grading__rank-text">1st Kyu <span>Brown Belt (Stripe)</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> Naifanchi 1</div>
                            <div><strong>Bunkai:</strong> 8 applications from the kata + continuous free flow</div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>90</div>
                    </div>

                    <div class="mukc-grading__row">
                        <div class="mukc-grading__rank">
                            <div class="mukc-grading__belt" style="--belt: #111111; --stripe: transparent;"></div>
                            <div class="mukc-grading__rank-text">1st Dan <span>Black Belt</span></div>
                        </div>
                        <div class="mukc-grading__criteria">
                            <div><strong>Kata:</strong> All previous kata</div>
                            <div><strong>Bunkai:</strong> Applications from each kata</div>
                            <div style="margin-top: 12px; font-size: 0.85rem; color: rgba(255, 255, 255, 0.6);">
                                * Note: For Black Belt, there is an additional assessment such as sparring.
                            </div>
                        </div>
                        <div class="mukc-grading__cost"><span>$</span>95</div>
                    </div>

                </div> <!-- End Hidden Ranks Wrapper -->

            </div>

            <button class="mukc-grading__toggle" id="gradingToggle" aria-expanded="false" aria-controls="gradingMore">
                <span>Show all ranks</span>
                <svg viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z" />
                </svg>
            </button>

        </div>
    </section>

    <!-- ── FOOTER ─────────────────────────────────── -->
    <div class="video-modal" id="videoModal">
        <div class="video-modal__content">
            <button class="video-modal__close" id="modalClose">&times;</button>
            <div id="videoIframeWrap"></div>
        </div>
    </div>

    <footer class="mukc-footer">
        <div class="mukc-footer__top">
            <div class="mukc-footer__brand"><img src="<?php echo esc_url($footer_logo); ?>" alt="MUKC footer icon">
            </div>
            <div class="mukc-footer__col-center">
                <p class="mukc-footer__col-title">Location</p>
                <p class="mukc-footer__col-body">Nona Lee Sports Centre &middot; Lazer Room<br>(located in University of
                    Melbourne Parkville)</p>
            </div>
            <div class="mukc-footer__col-right">
                <p class="mukc-footer__col-title">Contact</p>
                <p class="mukc-footer__col-body"><a
                        href="mailto:melbourneunikarateclub@gmail.com">melbourneunikarateclub@gmail.com</a></p>
            </div>
        </div>
        <div class="mukc-footer__bottom">
            <span class="mukc-footer__copy">&copy; 1997&ndash;2026 Melbourne University Karate Club<br>Reg. No.
                A0035839X<br>ABN 20 213 278 331</span>
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
                <a href="https://www.instagram.com/melbourneunikarateclub/" target="_blank" rel="noopener"
                    aria-label="Instagram">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

            // History Toggle Logic
            const historyToggle = document.getElementById('historyToggle');
            const historyMore = document.getElementById('historyMore');

            if (historyToggle && historyMore) {
                historyToggle.addEventListener('click', function () {
                    const isExpanded = historyToggle.getAttribute('aria-expanded') === 'true';
                    historyToggle.setAttribute('aria-expanded', !isExpanded);
                    historyMore.classList.toggle('is-expanded');

                    const span = historyToggle.querySelector('span');
                    if (isExpanded) {
                        span.textContent = 'Read more';
                    } else {
                        span.textContent = 'Show less';
                    }
                });
            }

            // Grading Toggle Logic
            const gradingToggle = document.getElementById('gradingToggle');
            const gradingMore = document.getElementById('gradingMore');

            if (gradingToggle && gradingMore) {
                gradingToggle.addEventListener('click', function () {
                    const isExpanded = gradingToggle.getAttribute('aria-expanded') === 'true';
                    gradingToggle.setAttribute('aria-expanded', !isExpanded);
                    gradingMore.classList.toggle('is-expanded');

                    const span = gradingToggle.querySelector('span');
                    if (isExpanded) {
                        span.textContent = 'Show all ranks';
                    } else {
                        span.textContent = 'Show less';
                    }
                });
            }

            // Video Modal Logic
            const modal = document.getElementById('videoModal');
            const modalClose = document.getElementById('modalClose');
            const videoWrap = document.getElementById('videoIframeWrap');
            const triggers = document.querySelectorAll('.video-trigger');

            const openVideo = (id) => {
                videoWrap.innerHTML = `
                    <iframe 
                        src="https://www.youtube.com/embed/${id}?autoplay=1" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>`;
                modal.classList.add('is-active');
                document.body.classList.add('no-scroll');
            };

            const closeVideo = () => {
                modal.classList.remove('is-active');
                videoWrap.innerHTML = '';
                document.body.classList.remove('no-scroll');
            };

            triggers.forEach(trigger => {
                trigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    const videoId = this.getAttribute('data-video-id');
                    openVideo(videoId);
                });
            });

            if (modalClose) modalClose.addEventListener('click', closeVideo);
            if (modal) {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) closeVideo();
                });
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>

</html>