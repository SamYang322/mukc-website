<?php
/**
 * MUKC – Our People Page Template
 * Template Name: Our People
 */

$site_name = get_bloginfo('name');
$logo_url = content_url('uploads/2026/02/MUKC_badge.png');
$footer_logo = content_url('uploads/2026/02/On-white.png');

// Assets
$hero_bg = content_url('uploads/2026/02/2006.10-Alex-Albert-Miao-Chai.jpg');
$alex_img = content_url('uploads/2026/02/IMG_0822-scaled.jpg');
$sean_img = content_url('uploads/2026/02/IMG_0535.jpg');
$joachim_img = content_url('uploads/2026/02/DSC5400-scaled-1.jpg');
$jie_img = content_url('uploads/2026/02/FB_IMG_1740290134515.jpg');

// Committee Assets
$comm_banner = content_url('uploads/2026/02/Untitled-design.png');
$sean_lee_img = content_url('uploads/2026/02/Sean.jpeg');
$ibuki_img = content_url('uploads/2026/02/Ibuki.jpg');
$shan_yang_img = content_url('uploads/2026/02/Clubs-Day-Semester-02-2025-6.jpg');
$teresa_img = content_url('uploads/2026/02/440818505_758034119479733_434913980865297983_n-edited.jpg');
$molly_img = content_url('uploads/2026/02/Molly.png');
$aristo_img = content_url('uploads/2026/02/Aristo.jpg');
$emeil_img = content_url('uploads/2026/02/Emeil.jpeg');

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
    <title>Our People –
        <?php echo esc_html($site_name); ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        /* ============================================================
   MUKC OUR PEOPLE PAGE
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
            background: #f4f4f2;
            /* Light base */
            color: #111111;
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
            transition: background 0.3s ease, height 0.3s ease;
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

        @media (max-width: 768px) {
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
                /* Matching brand dark */
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
                /* Better mobile fit */
            }

            .mukc-nav__burger {
                display: flex;
                z-index: 300;
            }
        }

        /* ── HERO ─────────────────────────────────────── */
        .people-hero {
            position: relative;
            height: 65vh;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            text-align: center;
            overflow: hidden;
            background: #000;
        }

        .people-hero__bg {
            position: absolute;
            inset: 0;
            background-image: url('<?php echo esc_url($hero_bg); ?>');
            background-size: cover;
            background-position: center 30%;
            filter: brightness(0.5);
        }

        .people-hero__content {
            position: relative;
            z-index: 10;
        }

        .people-hero__title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            line-height: 1;
        }

        .people-hero__subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            letter-spacing: 0.2em;
            margin-top: 10px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.8);
        }

        /* ── INSTRUCTOR SECTIONS ────────────────────── */
        .instructor-section {
            padding: 60px 60px;
            background: #d9d8d0;
            /* Beige background matched to screenshot */
        }

        .instructor-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 60px;
            align-items: center;
        }

        .instructor-img-wrap {
            position: relative;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            overflow: hidden;
        }

        .instructor-img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            display: block;
        }

        .instructor-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .instructor-name {
            font-size: clamp(2.2rem, 4vw, 3.4rem);
            font-weight: 700;
            color: #111111;
            line-height: 1.1;
        }

        .instructor-title {
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #444444;
        }

        .instructor-bio {
            font-size: 1rem;
            line-height: 1.7;
            color: #333333;
            text-wrap: pretty;
        }

        .instructor-btn {
            align-self: flex-start;
            padding: 14px 32px;
            background: #22314e;
            /* Navy button */
            color: #ffffff;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 8px;
        }

        .instructor-btn:hover {
            opacity: 0.9;
        }

        /* Alternating flip */
        .instructor-section--reverse .instructor-container {
            grid-template-columns: 0.8fr 1.2fr;
            direction: rtl;
        }

        .instructor-section--reverse .instructor-content {
            direction: ltr;
            /* Reset text direction */
        }

        @media (max-width: 1000px) {
            .instructor-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .instructor-section--reverse .instructor-container {
                grid-template-columns: 1fr;
            }

            .instructor-section {
                padding: 60px 40px;
            }
        }

        /* ── COMMITTEE SECTION ───────────────────────── */
        .committee-section {
            padding: 0 60px 80px;
            background: #ffffff;
        }

        .committee-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .committee-banner-wrap {
            position: relative;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            height: 380px;
            margin-bottom: 80px;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 40px;
        }

        .committee-banner-bg {
            position: absolute;
            inset: 0;
            background-image: url('<?php echo esc_url($comm_banner); ?>');
            background-size: cover;
            background-position: center 20%;
            filter: brightness(0.6);
        }

        .committee-banner-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: #ffffff;
        }

        .committee-banner-title {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            line-height: 1;
            font-style: italic;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .committee-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .comm-card {
            display: flex;
            flex-direction: column;
        }

        .comm-img-wrap {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            margin-bottom: 16px;
            background: #eee;
        }

        .comm-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .comm-img--shan {
            transform: scale(1.4);
            object-position: center 5%;
        }

        .comm-img--aristo {
            transform: scale(1.3);
            object-position: center 20%;
        }

        .comm-name {
            font-size: 1.15rem;
            font-weight: 600;
            color: #111111;
            margin-bottom: 4px;
        }

        .comm-role {
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #666666;
        }

        @media (max-width: 900px) {
            .committee-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .committee-section {
                padding: 60px 24px;
            }
        }

        @media (max-width: 500px) {
            .committee-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── ALEX JOURNEY TIMELINE ─────────────────────── */
        .journey-section {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            background: #e8e7e0;
        }

        .journey-section.is-open {
            max-height: 20000px;
            transition: max-height 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .journey-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 60px 80px;
        }

        /* Journey Header */
        .journey-header {
            text-align: center;
            padding: 80px 60px 40px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .journey-header__label {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #22314e;
            border: 1.5px solid #22314e;
            padding: 6px 16px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .journey-header__title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: #111111;
            margin-bottom: 12px;
            line-height: 1.1;
        }

        .journey-header__subtitle {
            font-size: 1rem;
            color: #555;
            font-weight: 400;
            font-style: italic;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Profile Card */
        .journey-profile {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 64px;
        }

        .journey-profile__card {
            background: #ffffff;
            border-radius: 6px;
            padding: 36px 40px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .journey-profile__card h3 {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #22314e;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #22314e;
        }

        .journey-profile__row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            gap: 16px;
        }

        .journey-profile__row:last-child {
            border-bottom: none;
        }

        .journey-profile__label {
            font-size: 0.85rem;
            color: #666;
            font-weight: 500;
            flex-shrink: 0;
            min-width: 140px;
        }

        .journey-profile__value {
            font-size: 0.85rem;
            color: #111;
            font-weight: 600;
            text-align: right;
            text-wrap: pretty;
        }

        /* Chapter Divider */
        .journey-chapter {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 64px 0 40px;
        }

        .journey-chapter__icon {
            width: 48px;
            height: 48px;
            background: #22314e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .journey-chapter__icon svg {
            width: 22px;
            height: 22px;
            fill: #ffffff;
        }

        .journey-chapter__text {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .journey-chapter__title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111;
        }

        .journey-chapter__line {
            flex: 1;
            height: 1px;
            background: rgba(0, 0, 0, 0.12);
        }

        /* Timeline */
        .journey-timeline {
            position: relative;
            padding-left: 40px;
            margin-bottom: 20px;
        }

        .journey-timeline::before {
            content: '';
            position: absolute;
            left: 7px;
            top: 8px;
            bottom: 8px;
            width: 2px;
            background: #c5c3ba;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 28px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -33px;
            top: 8px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22314e;
            border: 2px solid #e8e7e0;
            z-index: 1;
        }

        .timeline-item__year {
            font-size: 0.8rem;
            font-weight: 700;
            color: #22314e;
            letter-spacing: 0.04em;
            margin-bottom: 4px;
        }

        .timeline-item__text {
            font-size: 0.92rem;
            color: #333;
            line-height: 1.65;
        }

        /* Sport Sub-Section */
        .journey-sport {
            background: #ffffff;
            border-radius: 6px;
            padding: 32px 36px;
            margin-bottom: 24px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .journey-sport__head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .journey-sport__emoji {
            font-size: 1.4rem;
        }

        .journey-sport__title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #111;
        }

        /* Essay / Long-form Sections */
        .journey-essay {
            background: #ffffff;
            border-radius: 6px;
            padding: 48px 52px;
            margin-bottom: 32px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .journey-essay__title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #22314e;
        }

        .journey-essay__body {
            font-size: 0.95rem;
            color: #333;
            line-height: 1.85;
            text-wrap: pretty;
        }

        .journey-essay__body p {
            margin-bottom: 16px;
        }

        .journey-essay__body p:last-child {
            margin-bottom: 0;
        }

        /* Close Button */
        .journey-close {
            display: flex;
            justify-content: center;
            padding: 20px 0 0;
        }

        .journey-close__btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 36px;
            background: #22314e;
            color: #ffffff;
            border: none;
            font-family: 'Inter', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            border-radius: 2px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .journey-close__btn:hover {
            opacity: 0.9;
        }

        .journey-close__btn svg {
            width: 14px;
            height: 14px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linecap: round;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .journey-inner {
                padding: 0 24px 60px;
            }

            .journey-header {
                padding: 60px 24px 32px;
            }

            .journey-profile {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .journey-profile__card {
                padding: 28px 24px;
            }

            .journey-profile__row {
                flex-direction: column;
                gap: 4px;
            }

            .journey-profile__value {
                text-align: left;
            }

            .journey-essay {
                padding: 32px 24px;
            }

            .journey-sport {
                padding: 24px 20px;
            }

            .journey-chapter {
                margin: 48px 0 28px;
            }
        }

        /* ── FOOTER ───────────────────────────────────── */
        .mukc-footer {
            background: #d9d8d0;
            padding: 48px 60px 28px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
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
        }
    </style>
</head>

<body <?php body_class('mukc-people'); ?>>
    <?php wp_body_open(); ?>

    <!-- ── NAVBAR ─────────────────────────────────── -->
    <nav class="mukc-nav" aria-label="Main navigation">
        <a class="mukc-nav__brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img class="mukc-nav__logo" src="<?php echo esc_url($logo_url); ?>"
                alt="<?php echo esc_attr($site_name); ?> crest">
            <div class="mukc-nav__brand-text">
                <span class="mukc-nav__name"><?php echo esc_html($site_name); ?></span>
            </div>
        </a>

        <ul class="mukc-nav__menu">
            <li><a href="<?php echo esc_url(home_url('/about-mukc/')); ?>">About MUKC</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Our People</a></li>
            <li><a href="<?php echo esc_url(home_url('/journey/')); ?>">Journeys</a></li>
            <li><a href="<?php echo esc_url(home_url('/gears/')); ?>">Gears</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a></li>
        </ul>
        <!-- Mobile burger (Updated with animation) -->
        <button class="mukc-nav__burger" aria-label="Toggle navigation" id="mukcBurger">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <!-- ── HERO ─────────────────────────────────────── -->
    <section class="people-hero">
        <div class="people-hero__bg"></div>
        <div class="people-hero__content">
            <h1 class="people-hero__title">SENSEI</h1>
            <p class="people-hero__subtitle">Instructors</p>
        </div>
    </section>

    <!-- ── INSTRUCTOR 1: ALEXANDER ALBERT ──────────── -->
    <section class="instructor-section">
        <div class="instructor-container">
            <div class="instructor-img-wrap">
                <img class="instructor-img" src="<?php echo esc_url($alex_img); ?>" alt="Alexander Albert">
            </div>
            <div class="instructor-content">
                <h2 class="instructor-name">Alexander Albert</h2>
                <p class="instructor-title">Chief Instructor</p>
                <p class="instructor-bio">
                    Nothing worthwhile is easy. How you deal with that is a measure of yourself.
                    It is all part of the journey. The journey is the point of it. Enjoy the journey.
                </p>
                <button type="button" class="instructor-btn" id="alexJourneyBtn" onclick="toggleAlexJourney()">Read his
                    Journey</button>
            </div>
        </div>
    </section>

    <!-- ── ALEX JOURNEY TIMELINE ─────────────────── -->
    <section class="journey-section" id="alexJourney">
        <div class="journey-header">
            <span class="journey-header__label">The Journey</span>
            <h2 class="journey-header__title">Alexander Albert</h2>
            <p class="journey-header__subtitle">"Nothing worthwhile is easy. How you deal with that is a measure of yourself. It is all part of the journey."</p>
        </div>

        <div class="journey-inner">

            <!-- Profile Cards -->
            <div class="journey-profile">
                <div class="journey-profile__card">
                    <h3>Personal</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Tertiary Degrees</span>
                        <span class="journey-profile__value">Bachelor of Science,<br>Bachelor of Laws (Hons.)<br>&ndash; Melbourne University, 1978</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Profession</span>
                        <span class="journey-profile__value">Barrister (1992 onwards)</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Other Interests</span>
                        <span class="journey-profile__value">Environment, Conservation<br>(Life Member ACF)</span>
                    </div>
                </div>
                <div class="journey-profile__card">
                    <h3>Martial Arts</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Started at MUKC</span>
                        <span class="journey-profile__value">1974</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Chief Instructor</span>
                        <span class="journey-profile__value">Appointed 2000</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Grade</span>
                        <span class="journey-profile__value">6th Dan Black Belt</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded</span>
                        <span class="journey-profile__value">18 April 2018 &ndash; IMAA</span>
                    </div>
                </div>
            </div>

            <!-- ─── SPORTS ───────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95.49-7.4-2.07-8.53-5.44L8 12.93l2-1 2 2v3l1 1v2zm6.9-6.44l-2.4-1-.6-1.5 1.5-2.5c-1.28-1.67-3.21-2.77-5.4-2.95V7h-2V4.54C7.82 4.93 5 7.68 5 12c0 .34.04.67.09 1l3.41-1.71 2 1L11 14l-1 1v3.5l-1.56-1.56c1.41 3.39 5.41 5 8.81 3.59.62-.26 1.19-.6 1.7-1l.04-.04z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Sports</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <!-- Soccer -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#9917;</span>
                    <h4 class="journey-sport__title">Soccer</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1970</div>
                        <div class="timeline-item__text">Victorian under 16 representative.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1974</div>
                        <div class="timeline-item__text">Reserve goalkeeper for State League team &ndash; at that stage the highest level in Victoria.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1975</div>
                        <div class="timeline-item__text">Stopped playing &ndash; pursued other interests &ndash; karate. Love for the beautiful game re-ignited when sons started playing.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2007</div>
                        <div class="timeline-item__text">Assisted coaching youngest son&rsquo;s junior club team.</div>
                    </div>
                </div>
            </div>

            <!-- Cross Country Skiing -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#9975;</span>
                    <h4 class="journey-sport__title">Cross Country Skiing</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1978</div>
                        <div class="timeline-item__text">First time on skis (Alpine).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1980</div>
                        <div class="timeline-item__text">First time on cross country skis.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1984 &ndash; 1994</div>
                        <div class="timeline-item__text">Raced in citizen cross country ski races, including badge result (time within 25% of place getters) in Australian Birkebeiner 42 km.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1989</div>
                        <div class="timeline-item__text">Qualified as cross country ski instructor (Australian Ski Federation). Occasionally worked during ski season as instructor.</div>
                    </div>
                </div>
            </div>

            <!-- Sailing -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#9973;</span>
                    <h4 class="journey-sport__title">Sailing</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1980</div>
                        <div class="timeline-item__text">Learned to sail.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1981 &ndash; 1985</div>
                        <div class="timeline-item__text">Recreationally sailed 125 dinghy.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1982 &ndash; 1992</div>
                        <div class="timeline-item__text">Sailboarding.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2007</div>
                        <div class="timeline-item__text">Returned to sailing.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2009 &ndash; 2012</div>
                        <div class="timeline-item__text">Crewed in Pacer dinghy in club races and State championship.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2013 &ndash; 2018</div>
                        <div class="timeline-item__text">Crewed in B-14 skiff in club races, State championships, Australian Championships, World Championship. For the joy of sailing but with little racing success.</div>
                    </div>
                </div>
            </div>

            <!-- Other Sports -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#127947;</span>
                    <h4 class="journey-sport__title">Other Sports &amp; Recreation</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__text">SCUBA diving, spearfishing, bushwalking, yoga (6 years).</div>
                    </div>
                </div>
            </div>

            <!-- ─── CAREER ───────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Career</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1978</div>
                        <div class="timeline-item__text">Graduated Melbourne University &ndash; Bachelor of Science, Bachelor of Laws (Hons.).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1979</div>
                        <div class="timeline-item__text">Solicitor in private practice.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1980 &ndash; 1992</div>
                        <div class="timeline-item__text">Solicitor in Victoria Public Service &ndash; Victorian Government Solicitor&rsquo;s Office, Environment Protection Authority, Corporate Affairs, Office of Public Prosecutions.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1992 onwards</div>
                        <div class="timeline-item__text">Barrister.</div>
                    </div>
                </div>
            </div>

            <!-- ─── PHILOSOPHY ───────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Philosophy</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <!-- Why Martial Arts -->
            <div class="journey-essay">
                <h3 class="journey-essay__title">Why Martial Arts?</h3>
                <div class="journey-essay__body">
                    <p>Martial arts are not for everyone. For some of us, for some reason at some time in our lives, we feel a need to follow the way of the warrior in some way. It might be because we need a direction, or a challenge, or for self-improvement or for the self discipline, or for fitness and strength, or for self-defence, or for sport, or for moral compass, or for pressure relief or for social interaction with others who have a similar mindset that also has drawn them to martial arts, or because martial arts has the right mix of some or all of those things that gives balance to our lives. For me, all of those things came into play to varying degree at different times.</p>
                    <p>If you are committed to it, it becomes a habit as much as having breakfast &ndash; you can miss it, once or a few times or more, but eventually your body tells you it is missing and you need to get back to it. It is always available to you and is readily accessible. You can find a place to train by yourself almost anywhere. You do not need equipment or much space or much time. You can practice in front of the TV (you do not want to see the ads anyway) or listening to music (AC/DC fits well). You can practice for hours or in a few spare minutes.</p>
                    <p>You wake up in the middle of the night for some reason and feel the need to practice what you have learned at the previous training so you do not forget it so you go through the arm movements as far as you can without getting out of bed without getting up (it is cosy here but of course it does disturb your partner &ndash; &ldquo;go back to sleep dear, you are just having a bad dream&rdquo;). What do you do when waiting for the microwave to finish heating or bread in the toaster to pop up? &hellip; Of course &ndash; you do a few kicks because &hellip; that is you &hellip; it is not what you do &ndash; it is what you are. (Note: Care needs to be taken doing circular spinning kicks in a kitchen &ndash; plates and glasses are fragile). Or when you are brushing your teeth you drop into a deep horse riding stance because? &hellip; because why not? Each little bit of training adds a bit to your proficiency. After each training you are invariably in a better frame of mind than before. It lifts you up when you are feeling down and relaxes you if you are frantic.</p>
                    <p>Of course it is not always smooth. Obstacles, difficulties and times of pain is part of it. Coping and overcoming is part of it. Always trying to learn and improve is part of it. Nothing worthwhile is easy. How you deal with that is a measure of yourself. It is all part of the journey. The journey is the point of it. Enjoy the journey.</p>
                </div>
            </div>

            <!-- Why MUKC -->
            <div class="journey-essay">
                <h3 class="journey-essay__title">Why MUKC?</h3>
                <div class="journey-essay__body">
                    <p>We would love to know and master everything in the martial arts. That is not possible &ndash; the field is vast and the journey into it is never-ending. A springboard is needed for the journey &ndash; a base and framework that is something to work from, to come back to and refine. At MUKC the base/framework is karate, very much slanted towards the old style Okinawan approach to it plus more modern approaches in martial arts and aspects from other disciplines. We are willing to take and incorporate what is useful to us from anywhere.</p>
                    <p>However, my experience is that when I come across something I think I have not seen and appears good, I often (not always) then find it in karate in some manner or degree &ndash; I just have not recognised it previously or have not emphasised it or have not taken a further step to reach it. So what we practice at MUKC does and should change from year to year. There should always be something new to learn, but at the same time the base/framework is there that always can be improved and refined.</p>
                    <p>As to the goal of what is practiced at MUKC: Physically, it is to have a system that incorporates the essential elements that are in martial arts (i.e. percussive techniques, grappling, throws, groundwork, weapons, vulnerable points [kyusho], sport, conditioning, fitness, strength) so we have a balanced approach. Of course, coming with those goals should be determination, self-discipline, respect for others.</p>
                    <p>Martial arts schools are not all the same. A school that feels right for one person may not feel right for another. It may be about the physical practice. More often it is about atmosphere, culture or ethos.</p>
                    <p>At MUKC we have an atmosphere that is friendly and enjoyable with the expectation of commitment and respect for others. No-one would continue training if it was not enjoyable. But not all of it is. Necessarily parts of it are unexciting, require perseverance, hard work and toughness in spirit and body. The culture is &lsquo;tuf luv&rsquo;. It is expected that you do the best you can. You are respected for that effort, and you respect others because they are doing the same. There is an ethos that everyone must assist each other &ndash; it is not about individual ego.</p>
                    <p>There is also respect for those who have come before us travelling the same path &ndash; your spirit joins with theirs in the dojo (&ldquo;training area&rdquo;). Part of the reason we bow when we enter and leave the dojo is to show respect for that spirit. That sounds a bit eerie &ndash; but &ldquo;Wow&rdquo; what a nice thought! What a nice link with all those with whom we train and have trained before us.</p>
                    <p>The approach at MUKC has resonated with me &ndash; it fits my nature. I understand that it does not suit everyone. For those whom it does, the MUKC dojo is like a second home.</p>
                </div>
            </div>

            <!-- What is of Most Importance -->
            <div class="journey-essay">
                <h3 class="journey-essay__title">What is of Most Importance In Martial Arts?</h3>
                <div class="journey-essay__body">
                    <p>In 2003 I attended a seminar of Okinawan karate masters Kyoshi Koichi Nakasone (8th dan Shido-kan, full contact karate champion) and Hanshi Seikichi Iha (1932&ndash;2024, 10th dan).</p>
                    <p>Kyoshi Nakasone was a legend in Okinawa because of his full contact success. He was supple and very solid, and had a huge smile.</p>
                    <p>Hanshi Iha was short and of medium build. He exuded warmth and integrity. His karate was unbelievably smooth and natural. When we start karate, we learn different stances and moving in them. Our stances make techniques work or work better. The stances are not natural. We are told that after many, many years of training the stances should transform into us moving smoothly in them to the point that they are natural and effortless. Hanshi Iha was the epitome of that. When he performed his techniques it looked like he was taking a stroll in the park.</p>
                    <p>Hanshi asked a rhetorical question during the seminar. &ldquo;What is the most important aspect of karate?&rdquo; I thought &ldquo;safety&rdquo; of course &ndash; but that should go without saying in any practice school so I assumed this was not what Hanshi was getting at. I then thought about some of the martial arts maxims about fighting tactics and martial arts philosophy.</p>
                    <p>The answer Hanshi gave was: friendship. At the time, that seemed to me to be some distance from what we do in practice. I pondered on it for some months after the seminar. I tried closing my eyes and flashed &ldquo;karate&rdquo; in my mind to see what popped up. What generally came up (in addition to really nifty pressure point knockouts) was being with friends that I had made in martial arts doing things outside martial arts. Those times were all the better for being shared with likeminded kindred spirits.</p>
                    <p>Hanshi Iha&rsquo;s answer was profound &hellip; (but maybe pressure point knockouts should come in at a close second!)</p>
                </div>
            </div>

            <div class="journey-close">
                <button type="button" class="journey-close__btn" onclick="toggleAlexJourney()">
                    <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15" /></svg>
                    Close Journey
                </button>
            </div>

        </div>
    </section>

    <!-- ── INSTRUCTOR 2: SEAN MCMULLEN ─────────────── -->
    <section class="instructor-section instructor-section--reverse">
        <div class="instructor-container">
            <div class="instructor-img-wrap">
                <img class="instructor-img" src="<?php echo esc_url($sean_img); ?>" alt="Sean McMullen">
            </div>
            <div class="instructor-content">
                <h2 class="instructor-name">Sean McMullen</h2>
                <p class="instructor-title">Senior Instructor</p>
                <p class="instructor-bio">
                    Karate offered me some really concentrated and intense training sessions, building up my
                    fitness and strength while increasing my confidence and sense of discipline.
                </p>
                <button type="button" class="instructor-btn" id="seanJourneyBtn" onclick="toggleSeanJourney()">Read his
                    Journey</button>
            </div>
        </div>
    </section>

    <!-- ── SEAN JOURNEY TIMELINE ─────────────────── -->
    <section class="journey-section" id="seanJourney">
        <div class="journey-header">
            <span class="journey-header__label">The Journey</span>
            <h2 class="journey-header__title">Sean McMullen</h2>
            <p class="journey-header__subtitle">"Being part of something that reached back to origins centuries ago meant a lot to me, and I have always felt proud of being one of the current custodians of karate as a martial art."</p>
        </div>

        <div class="journey-inner">

            <!-- Profile Cards -->
            <div class="journey-profile">
                <div class="journey-profile__card">
                    <h3>Personal</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Family</span>
                        <span class="journey-profile__value">Partner Zoya<br>(blue belt with stripe),<br>Daughter Catherine<br>(yellow belt with stripe)</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Other Interests</span>
                        <span class="journey-profile__value">Environment, Climate Change, Animal Welfare, Writing</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">First Aid</span>
                        <span class="journey-profile__value">First Aid Officer<br>at work for ~20 years</span>
                    </div>
                </div>
                <div class="journey-profile__card">
                    <h3>Martial Arts</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Started at MUKC</span>
                        <span class="journey-profile__value">1981</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded Black Belt</span>
                        <span class="journey-profile__value">February 1985</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Current Grade</span>
                        <span class="journey-profile__value">4th Dan Black Belt</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded</span>
                        <span class="journey-profile__value">18 April 2018 &ndash; IMAA</span>
                    </div>
                </div>
            </div>

            <!-- ─── TERTIARY EDUCATION ───────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Tertiary Education</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1974</div>
                        <div class="timeline-item__text">Bachelor of Arts, Physics &amp; History &ndash; Melbourne University.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1976</div>
                        <div class="timeline-item__text">Graduate Diploma Information Science &ndash; Canberra CAE.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1981</div>
                        <div class="timeline-item__text">Graduate Diploma Computing &ndash; La Trobe University.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1984</div>
                        <div class="timeline-item__text">Master of Arts (Statistical Model) &ndash; Melbourne University.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1999</div>
                        <div class="timeline-item__text">Graduate Certificate of Administration for Scientists and Engineers &ndash; Deakin University.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2008</div>
                        <div class="timeline-item__text">PhD (Statistical Model) &ndash; Melbourne University.</div>
                    </div>
                </div>
            </div>

            <!-- ─── CAREER ───────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Career</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1969 &ndash; 1970</div>
                        <div class="timeline-item__text">Laboratory assistant.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1970 &ndash; 1972</div>
                        <div class="timeline-item__text">Truck driver.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1972 &ndash; 1974</div>
                        <div class="timeline-item__text">Victorian State Opera (singer).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1972 &ndash; 1975</div>
                        <div class="timeline-item__text">Department of Housing and Construction (Administration).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1975</div>
                        <div class="timeline-item__text">National Library of Australia (Acquisitions).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1975 &ndash; 1976</div>
                        <div class="timeline-item__text">Lead singer, folk/rock band Joe Wilson&rsquo;s Mates.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1976</div>
                        <div class="timeline-item__text">Canberra CAE Library (Acquisitions team leader).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1976 &ndash; 1980</div>
                        <div class="timeline-item__text">State Library of Victoria.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1980 &ndash; 1981</div>
                        <div class="timeline-item__text">Chief Librarian: Victorian Ministry of Transport and Tramways. Duties included modernization and automation of the library.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1981 &ndash; 2014</div>
                        <div class="timeline-item__text">Australian Bureau of Meteorology (Computer Systems Officer / Senior Professional Officer C). Duties included Satellite Imagery and Tracking computer maintenance, Automated Regional Office Systems installation, Strategic Planning, Year 2000 Compliance Project Coordinator (for about 6000 computers), Disaster Contingency Planning for mission critical systems. Retired as Executive Level 2A (acting).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1985 &ndash; present</div>
                        <div class="timeline-item__text">Parallel career as science fiction and fantasy author. 104 stories and 32 books sold and published. Winner of 17 national and international awards. Translated into 14 languages. Hugo Award nominee 2011. British Science Fiction Association Award nominee 2002. Scriptwriter for short film <em>Hard Cases</em>.</div>
                    </div>
                </div>
            </div>

            <!-- ─── SPORTS ───────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95.49-7.4-2.07-8.53-5.44L8 12.93l2-1 2 2v3l1 1v2zm6.9-6.44l-2.4-1-.6-1.5 1.5-2.5c-1.28-1.67-3.21-2.77-5.4-2.95V7h-2V4.54C7.82 4.93 5 7.68 5 12c0 .34.04.67.09 1l3.41-1.71 2 1L11 14l-1 1v3.5l-1.56-1.56c1.41 3.39 5.41 5 8.81 3.59.62-.26 1.19-.6 1.7-1l.04-.04z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Sports</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <!-- Medieval & Conventional Fencing -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#9876;</span>
                    <h4 class="journey-sport__title">Fencing</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1983</div>
                        <div class="timeline-item__text">Medieval Fencing: New Varengian Guard (runner up, one tournament).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1983 &ndash; 1986</div>
                        <div class="timeline-item__text">SCA &ndash; Society for Creative Anachronisms (won four tournaments).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2000 &ndash; 2002</div>
                        <div class="timeline-item__text">Conventional Fencing &ndash; Melbourne University Fencing Club.</div>
                    </div>
                </div>
            </div>

            <!-- General Fitness -->
            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#127947;</span>
                    <h4 class="journey-sport__title">General Fitness</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1984 &ndash; present</div>
                        <div class="timeline-item__text">Jogging.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1996 &ndash; present</div>
                        <div class="timeline-item__text">Weights training.</div>
                    </div>
                </div>
            </div>

            <!-- ─── PHILOSOPHY ───────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Philosophy</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <!-- Why Martial Arts -->
            <div class="journey-essay">
                <h3 class="journey-essay__title">Why Martial Arts?</h3>
                <div class="journey-essay__body">
                    <p>As must be obvious from my CV, I have led a pretty busy life, so having both my sporting activities and studies at Melbourne University saved me a lot of time. Karate offered me some really concentrated and intense training sessions, building up my fitness and strength while increasing my confidence and sense of discipline. This helped considerably with my tertiary studies as well as my professional career in computing.</p>
                    <p>Being part of something that reached back to origins centuries ago meant a lot to me, and I have always felt proud of being one of the current custodians of karate as a martial art. It also forced me to take the need for physical activity seriously, because most of my professional life has involved sitting at a keyboard.</p>
                    <p>As far as self defense goes, I have found that the self-confidence that karate confers actually kept me out of trouble. Bullies want victims, not challenges, and they seem to sense that I am not an easy target and leave me alone. Having a daughter and a girlfriend who have also done karate has made me particularly aware of the need for women to be their own last line of defence in bad situations, and I try to make sure that female students who spend even a short time in MUKC develop at least a few useful self-defence skills.</p>
                    <p>For those who would also like a trophy or two to impress their friends, the club participates in the interclub Lion Bushido Tournament every August in sparring, kata and self-defence categories (the club&rsquo;s more senior instructors participate as judges, but I&rsquo;m afraid judges are not eligible for trophies).</p>
                    <p>The reason that I have stayed at MUKC for over four decades is largely due to Shihan Alex Albert being the Chief Instructor. He has always been keen to develop karate as a martial art, rather than just preserving traditions, so that there is constant scope for improvement in our style&rsquo;s effectiveness and practicality. Shihan Alex combines hard physical training with erudite martial arts scholarship in a way that I find particularly appealing.</p>
                    <p>There are some down sides to becoming increasingly experienced at martial arts. I probably annoy people by laughing at badly acted action scenes in movies, for example. On the other hand, when writing fiction it helps to know what I am talking about when my characters have to fight. My readers often say that action scenes in my novels are exciting because they are really plausible, which is a great compliment for any author.</p>
                    <p>Lastly, I stay in MUKC because the people are exceedingly friendly and sociable, and I have never heard of anyone feeling frightened or intimidated at training. From what I have heard, you are more likely to get injured playing netball or soccer. There are plenty of social events during the year ranging from dinners to bushwalking, so there is plenty of scope for making friends. For those students who decide to stand for the club&rsquo;s committee, there is also the opportunity to learn a lot of administrative skills that can be a big advantage when you finish your studies and apply for jobs.</p>
                </div>
            </div>

            <div class="journey-close">
                <button type="button" class="journey-close__btn" onclick="toggleSeanJourney()">
                    <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15" /></svg>
                    Close Journey
                </button>
            </div>

        </div>
    </section>

    <!-- ── INSTRUCTOR 3: JOACHIM LAI ───────────────── -->
    <section class="instructor-section">
        <div class="instructor-container">
            <div class="instructor-img-wrap">
                <img class="instructor-img" src="<?php echo esc_url($joachim_img); ?>" alt="Joachim Lai">
            </div>
            <div class="instructor-content">
                <h2 class="instructor-name">Joachim Lai</h2>
                <p class="instructor-title">Senior Instructor</p>
                <p class="instructor-bio">
                    Know yourself and know your enemy.
                </p>
                <button type="button" class="instructor-btn" id="joxJourneyBtn" onclick="toggleJoxJourney()">Read his
                    Journey</button>
            </div>
        </div>
    </section>

    <!-- ── JOACHIM JOURNEY TIMELINE ─────────────────── -->
    <section class="journey-section" id="joxJourney">
        <div class="journey-header">
            <span class="journey-header__label">The Journey</span>
            <h2 class="journey-header__title">Joachim Lai</h2>
            <p class="journey-header__subtitle">"Know yourself and know your enemy."</p>
        </div>

        <div class="journey-inner">

            <!-- Profile Cards -->
            <div class="journey-profile">
                <div class="journey-profile__card">
                    <h3>Personal</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Other Interests</span>
                        <span class="journey-profile__value">Climate Change, Animal Welfare,<br>Environment, Hiking,<br>AI, Cooking/Foodie,<br>Competitive Mario Kart</span>
                    </div>
                </div>
                <div class="journey-profile__card">
                    <h3>Martial Arts</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Started at MUKC</span>
                        <span class="journey-profile__value">2014</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded Black Belt</span>
                        <span class="journey-profile__value">30 April 2018</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Current Grade</span>
                        <span class="journey-profile__value">2nd Dan Black Belt</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded</span>
                        <span class="journey-profile__value">29 July 2023 &ndash; IMAA</span>
                    </div>
                </div>
            </div>

            <!-- ─── OTHER SPORTS / MARTIAL ARTS ──────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95.49-7.4-2.07-8.53-5.44L8 12.93l2-1 2 2v3l1 1v2zm6.9-6.44l-2.4-1-.6-1.5 1.5-2.5c-1.28-1.67-3.21-2.77-5.4-2.95V7h-2V4.54C7.82 4.93 5 7.68 5 12c0 .34.04.67.09 1l3.41-1.71 2 1L11 14l-1 1v3.5l-1.56-1.56c1.41 3.39 5.41 5 8.81 3.59.62-.26 1.19-.6 1.7-1l.04-.04z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Sports &amp; Martial Arts</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#129354;</span>
                    <h4 class="journey-sport__title">Martial Arts Journey</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">1992 &ndash; 1994</div>
                        <div class="timeline-item__text">Darwin Karate Club.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1995 &ndash; 1998</div>
                        <div class="timeline-item__text">Freestyle Chinese Boxing.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">1998 &ndash; 1999</div>
                        <div class="timeline-item__text">Chung Wah Society Lion Dance Troupe.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2013 &ndash; 2015</div>
                        <div class="timeline-item__text">Burn Boxing and Fitness.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2014</div>
                        <div class="timeline-item__text">Joined MUKC.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2019 &ndash; 2020</div>
                        <div class="timeline-item__text">MMTA Muay Thai &amp; De Been Jiu Jitsu. Trained under multiple Muay Thai instructors in Melbourne and Darwin.</div>
                    </div>
                </div>
            </div>

            <div class="journey-sport">
                <div class="journey-sport__head">
                    <span class="journey-sport__emoji">&#127939;</span>
                    <h4 class="journey-sport__title">Endurance &amp; Events</h4>
                </div>
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">2016</div>
                        <div class="timeline-item__text">Tough Mudder NSW, Moorooduc Apocalypse Obstacle Run, Zedtown Zombie Apocalypse Nerf War.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2019</div>
                        <div class="timeline-item__text">Tough Mudder VIC.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2024 &ndash; present</div>
                        <div class="timeline-item__text">Park Run.</div>
                    </div>
                </div>
            </div>

            <!-- ─── EDUCATION ────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Education</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">2005 &ndash; 2009</div>
                        <div class="timeline-item__text">Bachelor of Environmental Science &ndash; RMIT.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2011 &ndash; 2012</div>
                        <div class="timeline-item__text">National Green Jobs Corps Program &ndash; GLG.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2013 &ndash; 2014</div>
                        <div class="timeline-item__text">Certificate IV &ndash; Training and Assessment &ndash; Kangan.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2016 &ndash; 2017</div>
                        <div class="timeline-item__text">CCENT/CCNA 100-105 &ndash; Cisco Online.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2020 &ndash; 2021</div>
                        <div class="timeline-item__text">Anatomy and Physiology Certification &ndash; H&amp;H Colleges.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2020 &ndash; 2021</div>
                        <div class="timeline-item__text">Science of Exercise Certification &ndash; UOC.</div>
                    </div>
                </div>
            </div>

            <!-- ─── CAREER ───────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Career</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">2008 &ndash; 2009</div>
                        <div class="timeline-item__text">Laboratory Assistant.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2010 &ndash; 2011</div>
                        <div class="timeline-item__text">Land &amp; Soil Auditor.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2013 &ndash; 2014</div>
                        <div class="timeline-item__text">Bank Systems Administration.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2014 &ndash; 2018</div>
                        <div class="timeline-item__text">Lead Service Engineer.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2018 &ndash; 2019</div>
                        <div class="timeline-item__text">Client Systems Support &amp; Asset Reclamation in the Automotive Industry.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2019 &ndash; 2022</div>
                        <div class="timeline-item__text">Service Desk / Delivery Team Lead in the Healthcare Industry.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2022 &ndash; present</div>
                        <div class="timeline-item__text">Service Desk Team Lead in the Retail Industry.</div>
                    </div>
                </div>
            </div>

            <div class="journey-close">
                <button type="button" class="journey-close__btn" onclick="toggleJoxJourney()">
                    <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15" /></svg>
                    Close Journey
                </button>
            </div>

        </div>
    </section>

    <!-- ── INSTRUCTOR 4: JIE VAN TIEL ──────────────── -->
    <section class="instructor-section instructor-section--reverse">
        <div class="instructor-container">
            <div class="instructor-img-wrap">
                <img class="instructor-img" src="<?php echo esc_url($jie_img); ?>" alt="Jie van Tiel">
            </div>
            <div class="instructor-content">
                <h2 class="instructor-name">Jie van Tiel (Nee Zhou)</h2>
                <p class="instructor-title">Assistant Instructor</p>
                <p class="instructor-bio">
                    I joined MUKC when I started my undergraduate degree, a time when you really start having agency in
                    your life, and clubs and societies offer an opportunity to try things you had never done before.
                </p>
                <button type="button" class="instructor-btn" id="jieJourneyBtn" onclick="toggleJieJourney()">Read her
                    Journey</button>
            </div>
        </div>
    </section>

    <!-- ── JIE JOURNEY TIMELINE ─────────────────── -->
    <section class="journey-section" id="jieJourney">
        <div class="journey-header">
            <span class="journey-header__label">The Journey</span>
            <h2 class="journey-header__title">Jie van Tiel (Nee Zhou)</h2>
            <p class="journey-header__subtitle">"Martial arts is not just attending classes, but a way of life. Even when your body and joints are not what they used to be, you find ways to adapt."</p>
        </div>

        <div class="journey-inner">

            <!-- Profile Cards -->
            <div class="journey-profile">
                <div class="journey-profile__card">
                    <h3>Personal</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Profession</span>
                        <span class="journey-profile__value">Research Scientist (Immunologist)</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Committee</span>
                        <span class="journey-profile__value">MUKC Secretary 2008&ndash;2009</span>
                    </div>
                </div>
                <div class="journey-profile__card">
                    <h3>Martial Arts</h3>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Started at MUKC</span>
                        <span class="journey-profile__value">2008</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Graded Black Belt</span>
                        <span class="journey-profile__value">30 April 2018</span>
                    </div>
                    <div class="journey-profile__row">
                        <span class="journey-profile__label">Current Grade</span>
                        <span class="journey-profile__value">1st Dan Black Belt</span>
                    </div>
                </div>
            </div>

            <!-- ─── EDUCATION ────────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Education</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <div class="journey-sport">
                <div class="journey-timeline">
                    <div class="timeline-item">
                        <div class="timeline-item__year">2010</div>
                        <div class="timeline-item__text">Bachelor of Biomedicine.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2012</div>
                        <div class="timeline-item__text">Degree with Honours.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item__year">2020</div>
                        <div class="timeline-item__text">Doctor of Philosophy (Immunology).</div>
                    </div>
                </div>
            </div>

            <!-- ─── PHILOSOPHY ───────────────────────── -->
            <div class="journey-chapter">
                <div class="journey-chapter__icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <div class="journey-chapter__text">
                    <h3 class="journey-chapter__title">Philosophy</h3>
                </div>
                <div class="journey-chapter__line"></div>
            </div>

            <!-- Why Martial Arts -->
            <div class="journey-essay">
                <h3 class="journey-essay__title">Why Martial Arts?</h3>
                <div class="journey-essay__body">
                    <p>I joined MUKC when I started my undergraduate degree, a time when you really start having agency in your life, and clubs and societies offer an opportunity to try things you had never done before.</p>
                    <p>After starting karate, I also participated in Wushu once a week and occasionally watched TKD, but ultimately decided that MUKC was the club for me (although I have made many friends across the disciplines over the years). I enjoyed the focus on self defence (the &lsquo;martial&rsquo;), the practical approach to different situations, as well as the kata (the &lsquo;arts&rsquo;). I have since had short stints in boxing (fitness class), tai chi, and BJJ, and would happily crosstrain elsewhere given the time and opportunity.</p>
                    <p>I have been the young woman walking home from the bus stop late at night&hellip; You pull your hoodie further over your head and hunch to hide your figure. The keys are clutched tightly in your pocket (Wolverine style) and every moving shadow makes you wary&hellip; Now I use those moments to devise the most efficient way to incapacitate an attacker and make them cry for help.</p>
                    <p>I&rsquo;ve always had an affinity for the technical side of things (let&rsquo;s face it, I&rsquo;m no Juggernaut), so my semester in anatomy complements well with our study of pressure points, as well as the way our joints move (or don&rsquo;t move where the objective is to injure or subdue).</p>
                    <p>During my early years at MUKC, I was fortunate enough to receive tuition from visiting instructors Lakan Guro David MacSporran (escrima sticks) and Sensei Terry Bradford (bo), and it was then that I discovered a great passion for traditional weapons. I was later able to attend David&rsquo;s classes independently and formally grade in escrima sticks, as well as dabble with a range of other kobudo arts such as Filipino staff, jo, cane, knives, katana/shinai/bokken, to name a few. Many skills I found to translate well between weapons and empty hand, and I hope to bring a bit of diversity and continuity to our classes by taking the odd escrima sticks class here and there.</p>
                    <p>As an instructor I value commitment, attention to detail, and taking care of our training partners. As a karateka I enjoy doing kata in wild places&hellip; mountain tops and beaches, lakeside, campsites, monuments&hellip; martial arts is not just attending classes, but a way of life. Even when your body and joints are not what they used to be&hellip; You find ways to adapt.</p>
                    <p>At the time of writing this (2025), I am deep in the newborn trenches&hellip; Which is another type of warfare altogether. Battling fatigue, poonamis, and inconsolable distress requires a lot of patience and perseverance&hellip; Skills that I refined over the years as a martial artist. My availability is limited in the foreseeable future, but in time I hope to at least visit you all. As I discovered first hand once before, MUKC always welcomes back returning members, and it does not take long to pick up where you left off!</p>
                    <p>In the mean time, I&rsquo;ll be practicing my kiba dachi with incremental weights and stepping through kata to rock my little one to sleep&hellip;</p>
                </div>
            </div>

            <div class="journey-close">
                <button type="button" class="journey-close__btn" onclick="toggleJieJourney()">
                    <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15" /></svg>
                    Close Journey
                </button>
            </div>

        </div>
    </section>

    <!-- ── COMMITTEE SECTION ───────────────────────── -->
    <section class="committee-section">
        <div class="committee-container">
            <div class="committee-banner-wrap">
                <div class="committee-banner-bg"></div>
                <div class="committee-banner-content">
                    <h2 class="committee-banner-title">COMMITTEE</h2>
                </div>
            </div>

            <div class="committee-grid">
                <!-- President -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img" src="<?php echo esc_url($sean_lee_img); ?>" alt="Sean Lee">
                    </div>
                    <h3 class="comm-name">Sean Lee</h3>
                    <span class="comm-role">President</span>
                </div>

                <!-- Vice President -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img" src="<?php echo esc_url($ibuki_img); ?>" alt="Ibuki Tadamasa">
                    </div>
                    <h3 class="comm-name">Ibuki Tadamasa</h3>
                    <span class="comm-role">Vice President</span>
                </div>

                <!-- Secretary -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img comm-img--shan" src="<?php echo esc_url($shan_yang_img); ?>"
                            alt="Shan Yang">
                    </div>
                    <h3 class="comm-name">Shan Yang</h3>
                    <span class="comm-role">Secretary</span>
                </div>

                <!-- Vice Secretary -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img" src="<?php echo esc_url($teresa_img); ?>" alt="Teresa Schramm">
                    </div>
                    <h3 class="comm-name">Teresa Schramm</h3>
                    <span class="comm-role">Vice Secretary</span>
                </div>

                <!-- Treasurer -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img" src="<?php echo esc_url($molly_img); ?>" alt="Molly Hunter">
                    </div>
                    <h3 class="comm-name">Molly Hunter</h3>
                    <span class="comm-role">Treasurer</span>
                </div>

                <!-- Vice Treasurer -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img comm-img--aristo" src="<?php echo esc_url($aristo_img); ?>"
                            alt="Aristo Cham">
                    </div>
                    <h3 class="comm-name">Aristo Cham</h3>
                    <span class="comm-role">Vice Treasurer</span>
                </div>

                <!-- Quartermaster -->
                <div class="comm-card">
                    <div class="comm-img-wrap">
                        <img class="comm-img" src="<?php echo esc_url($emeil_img); ?>" alt="Emeil Boddenberg">
                    </div>
                    <h3 class="comm-name">Emeil Boddenberg</h3>
                    <span class="comm-role">Quartermaster</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ── FOOTER ───────────────────────────────────── -->
    <footer class="mukc-footer">
        <div class="mukc-footer__top">
            <div class="mukc-footer__brand">
                <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr($site_name); ?>">
            </div>
            <div class="mukc-footer__col-center">
                <h3 class="mukc-footer__col-title">Location</h3>
                <p class="mukc-footer__col-body">
                    Nona Lee Sports Centre - Lazer Room<br>
                    (located in University of Melbourne Parkville)
                </p>
            </div>
            <div class="mukc-footer__col-right">
                <h3 class="mukc-footer__col-title">Contact</h3>
                <p class="mukc-footer__col-body">
                    <a href="mailto:melbourneunikarateclub@gmail.com">melbourneunikarateclub@gmail.com</a>
                </p>
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
        /* ── Alex Journey Toggle ── */
        function toggleAlexJourney() {
            const section = document.getElementById('alexJourney');
            const btn = document.getElementById('alexJourneyBtn');
            const isOpen = section.classList.contains('is-open');

            if (isOpen) {
                section.classList.remove('is-open');
                btn.textContent = 'Read his Journey';
                // Scroll back to Alex's section
                const alexSection = btn.closest('.instructor-section');
                if (alexSection) {
                    setTimeout(function () {
                        alexSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            } else {
                section.classList.add('is-open');
                btn.textContent = 'Close Journey';
                // Scroll to the journey section
                setTimeout(function () {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 80);
            }
        }

        /* ── Jie Journey Toggle ── */
        function toggleJieJourney() {
            const section = document.getElementById('jieJourney');
            const btn = document.getElementById('jieJourneyBtn');
            const isOpen = section.classList.contains('is-open');

            if (isOpen) {
                section.classList.remove('is-open');
                btn.textContent = 'Read her Journey';
                const jieSection = btn.closest('.instructor-section');
                if (jieSection) {
                    setTimeout(function () {
                        jieSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            } else {
                section.classList.add('is-open');
                btn.textContent = 'Close Journey';
                setTimeout(function () {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 80);
            }
        }

        /* ── Joachim Journey Toggle ── */
        function toggleJoxJourney() {
            const section = document.getElementById('joxJourney');
            const btn = document.getElementById('joxJourneyBtn');
            const isOpen = section.classList.contains('is-open');

            if (isOpen) {
                section.classList.remove('is-open');
                btn.textContent = 'Read his Journey';
                const joxSection = btn.closest('.instructor-section');
                if (joxSection) {
                    setTimeout(function () {
                        joxSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            } else {
                section.classList.add('is-open');
                btn.textContent = 'Close Journey';
                setTimeout(function () {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 80);
            }
        }

        /* ── Sean Journey Toggle ── */
        function toggleSeanJourney() {
            const section = document.getElementById('seanJourney');
            const btn = document.getElementById('seanJourneyBtn');
            const isOpen = section.classList.contains('is-open');

            if (isOpen) {
                section.classList.remove('is-open');
                btn.textContent = 'Read his Journey';
                const seanSection = btn.closest('.instructor-section');
                if (seanSection) {
                    setTimeout(function () {
                        seanSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            } else {
                section.classList.add('is-open');
                btn.textContent = 'Close Journey';
                setTimeout(function () {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 80);
            }
        }

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