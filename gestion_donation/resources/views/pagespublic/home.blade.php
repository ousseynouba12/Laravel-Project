<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonEnsemble - Plateforme de dons</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        :root {
            --primary: #4E937A;
            --secondary: #B5DFCA;
            --tertiary: #F4D1AE;
            --background: #F9F7F3;
            --accent: #E88D67;
            --dark: #2A3B47;
            --light: #FFFFFF;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--background);
            color: var(--dark);
            overflow-x: hidden;
        }
        
        /* Curseur personnalisé */
        .cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--accent);
            pointer-events: none;
            mix-blend-mode: difference;
            z-index: 999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            opacity: 0.7;
        }
        
        .cursor-follower {
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(232, 141, 103, 0.2);
            pointer-events: none;
            z-index: 998;
            transform: translate(-50%, -50%);
            transition: transform 0.3s ease, width 0.2s ease, height 0.2s ease;
        }
        
        /* Loader animé */
        .loader-wrapper {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-color: var(--background);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loader {
            display: flex;
            align-items: center;
        }
        
        .loader span {
            display: inline-block;
            height: 30px;
            width: 30px;
            background-color: var(--primary);
            border-radius: 50%;
            margin: 0 5px;
            animation: loader 1.5s infinite ease-in-out both;
        }
        
        .loader span:nth-child(1) {
            animation-delay: -0.3s;
            background-color: var(--accent);
        }
        
        .loader span:nth-child(2) {
            animation-delay: -0.15s;
            background-color: var(--primary);
        }
        
        .loader span:nth-child(3) {
            background-color: var(--tertiary);
        }
        
        @keyframes loader {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }
        
        /* Navbar innovante */
        .navbar {
            position: fixed;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 1200px;
            height: 70px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            z-index: 100;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.65, 0, 0.35, 1);
        }
        
        .navbar.scrolled {
            top: 20px;
            height: 60px;
            width: 85%;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .logo::before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: var(--secondary);
            border-radius: 50%;
            z-index: -1;
            transform: translate(-10%, -10%);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .logo:hover::before {
            transform: scale(1.1) translate(-10%, -10%);
            background-color: var(--tertiary);
        }
        
        .logo i {
            font-size: 22px;
            margin-right: 10px;
            background-color: var(--primary);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .logo:hover i {
            transform: rotateY(180deg);
            background-color: var(--accent);
        }
        
        .nav-links {
            display: flex;
            align-items: center;
        }
        
        .nav-link {
            color: var(--dark);
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            position: relative;
            padding: 5px 0;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .cta-button {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(78, 147, 122, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--accent), var(--primary));
            z-index: -1;
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.3);
        }
        
        .cta-button:hover::before {
            opacity: 1;
        }
        
        .menu-toggle {
            display: none;
            cursor: pointer;
            z-index: 101;
        }
        
        .menu-toggle .bar {
            width: 25px;
            height: 3px;
            background-color: var(--dark);
            margin: 5px 0;
            transition: all 0.3s ease;
            display: block;
            border-radius: 3px;
        }
        
        /* Hero section avec animation parallaxe */
        .hero {
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(20px);
        }
        
        .shape-1 {
            top: 15%;
            left: 15%;
            width: 300px;
            height: 300px;
            background-color: rgba(78, 147, 122, 0.15);
            animation: float 8s infinite alternate ease-in-out;
        }
        
        .shape-2 {
            bottom: 10%;
            right: 10%;
            width: 250px;
            height: 250px;
            background-color: rgba(232, 141, 103, 0.15);
            animation: float 7s infinite alternate-reverse ease-in-out;
        }
        
        .shape-3 {
            top: 50%;
            right: 20%;
            width: 150px;
            height: 150px;
            background-color: rgba(244, 209, 174, 0.2);
            animation: float 6s infinite alternate ease-in-out;
        }
        
        .shape-4 {
            bottom: 30%;
            left: 10%;
            width: 200px;
            height: 200px;
            background-color: rgba(181, 223, 202, 0.2);
            animation: float 9s infinite alternate-reverse ease-in-out;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(30px, 30px) rotate(5deg); }
        }
        
        .hero-content {
            max-width: 800px;
            padding: 60px;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-size: 64px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            position: relative;
            display: inline-block;
        }
        
        .hero-title span {
            position: relative;
            display: inline-block;
            color: transparent;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            animation: textShine 3s infinite alternate;
        }
        
        @keyframes textShine {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        
        .hero-description {
            font-size: 20px;
            line-height: 1.6;
            color: var(--dark);
            margin-bottom: 40px;
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .primary-btn, .secondary-btn {
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .primary-btn {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.2);
        }
        
        .primary-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(-25deg);
            transition: all 0.5s;
        }
        
        .primary-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(78, 147, 122, 0.3);
        }
        
        .primary-btn:hover::before {
            width: 100%;
        }
        
        .secondary-btn {
            background: transparent;
            color: var(--dark);
            border: 2px solid var(--primary);
        }
        
        .secondary-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: var(--primary);
            transition: all 0.5s;
            z-index: -1;
        }
        
        .secondary-btn:hover {
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.2);
        }
        
        .secondary-btn:hover::before {
            width: 100%;
        }
        
        /* Effet de scroll vers le bas */
        .scroll-down {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--dark);
            text-decoration: none;
            z-index: 2;
        }
        
        .scroll-down-text {
            margin-bottom: 10px;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .scroll-down-icon {
            width: 30px;
            height: 50px;
            border: 2px solid var(--dark);
            border-radius: 15px;
            position: relative;
        }
        
        .scroll-down-icon::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            width: 6px;
            height: 6px;
            background-color: var(--dark);
            border-radius: 50%;
            transform: translateX(-50%);
            animation: scrollDown 2s infinite;
        }
        
        @keyframes scrollDown {
            0% { transform: translate(-50%, 0); opacity: 1; }
            80% { transform: translate(-50%, 20px); opacity: 0; }
            100% { transform: translate(-50%, 0); opacity: 0; }
        }
        
        /* Section avec effet de carrousel 3D */
        .section {
            padding: 120px 0;
            position: relative;
            overflow: hidden;
        }
        
        .section-title {
            font-size: 42px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }
        
        .features {
            background-color: white;
            position: relative;
        }
        
        .features::before, .features::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background-color: rgba(181, 223, 202, 0.2);
            z-index: 0;
        }
        
        .features::before {
            top: -150px;
            left: -150px;
        }
        
        .features::after {
            bottom: -150px;
            right: -150px;
        }
        
        .features-carousel {
            position: relative;
            padding: 60px 0;
            perspective: 1000px;
        }
        
        .carousel-container {
            transform-style: preserve-3d;
            height: 400px;
            position: relative;
            width: 100%;
        }
        
        .feature-card {
            position: absolute;
            width: 300px;
            height: 350px;
            background: white;
            border-radius: 20px;
            text-align: center;
            padding: 40px 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            opacity: 0;
            pointer-events: none;
        }
        
        .feature-card.active {
            z-index: 5;
            opacity: 1;
            transform: translateX(-50%) scale(1);
            pointer-events: auto;
        }
        
        .feature-card.prev {
            z-index: 4;
            opacity: 0.7;
            transform: translateX(-120%) scale(0.9) rotateY(10deg);
        }
        
        .feature-card.next {
            z-index: 4;
            opacity: 0.7;
            transform: translateX(20%) scale(0.9) rotateY(-10deg);
        }
        
        .feature-card.prev-2, .feature-card.next-2 {
            z-index: 3;
            opacity: 0.4;
            transform: translateX(-190%) scale(0.8) rotateY(20deg);
        }
        
        .feature-card.next-2 {
            transform: translateX(90%) scale(0.8) rotateY(-20deg);
        }
        
        .feature-icon {
            font-size: 50px;
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .feature-icon::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--accent), var(--primary));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .feature-card:hover .feature-icon::before {
            opacity: 1;
        }
        
        .feature-icon i {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover .feature-icon i {
            transform: rotateY(360deg);
        }
        
        .feature-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .feature-description {
            color: #666;
            line-height: 1.6;
        }
        
        .carousel-nav {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 20px;
        }
        
        .carousel-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .carousel-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }
        
        /* Section associations avec effet de grille animée */
        .associations {
            background-color: var(--background);
            position: relative;
        }
        
        .associations-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .association-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            top: 0;
        }
        
        .association-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .card-image-container {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        
        .association-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .association-card:hover .association-image {
            transform: scale(1.1);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
        }
        
        .association-content {
            padding: 25px;
            position: relative;
        }
        
        .association-name {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .association-description {
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .progress-container {
            margin-bottom: 20px;
        }
        
        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: #666;
        }
        
        .progress-bg {
            height: 8px;
            background-color: #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }
        
        @keyframes progressAnim {
            0% { width: 0; }
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 4px;
            position: relative;
            width: 0;
        }
        
        .association-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(78, 147, 122, 0.2);
        }
        
        .association-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(78, 147, 122, 0.3);
        }
        
        /* Témoignages avec effet de swiper */
        .testimonials {
            background-color: white;
            position: relative;
            overflow: hidden;
        }
        
        .testimonials-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .testimonials-swiper {
            position: relative;
            padding: 30px 10px;
            overflow: hidden;
        }
        
        .swiper-slide {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.5s ease;
            position: absolute;
            width: 70%;
            left: 15%;
            top: 0;
        }
        
        .swiper-slide.active {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }
        
        .testimonial {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .testimonial::before {
            content: '\201C';
            position: absolute;
            top: 25px;
            left: 25px;
            font-family: Georgia, serif;
            font-size: 80px;
            color: var(--secondary);
            opacity: 0.4;
            line-height: 1;
        }
        
        .testimonial-text {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            border: 3px solid var(--primary);
        }
        
        .author-info h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .author-info p {
            font-size: 14px;
            color: #666;
        }
        
        .testimonial-nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 15px;
        }
        
        .testimonial-nav button {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: none;
            background-color: #e0e0e0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .testimonial-nav button.active {
            background-color: var(--primary);
            transform: scale(1.2);
        }
        
        /* Footer moderne */
        .footer {
            background-color: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
            overflow: hidden;
        }
        
        .footer::before, .footer::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(78, 147, 122, 0.1);
            z-index: 0;
        }
        
        .footer::before {
            top: -100px;
            right: -100px;
        }
        
        .footer::after {
            bottom: -100px;
            left: -100px;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            position: relative;
            z-index: 1;
        }
        
        .footer-logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 28px;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-link:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }
        
        .footer-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent);
            border-radius: 1.5px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .footer-links a::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-left: 8px solid var(--accent);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        .footer-links a:hover::before {
            opacity: 1;
            transform: translate(5px, -50%);
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .contact-item i {
            margin-right: 15px;
            color: var(--accent);
            font-size: 18px;
        }
        
        .footer-bottom {
            padding-top: 30px;
            margin-top: 50px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            position: relative;
            z-index: 1;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .associations-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
            
            .hero-title {
                font-size: 48px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                width: 90%;
                padding: 0 20px;
            }
            
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background-color: white;
                flex-direction: column;
                justify-content: center;
                transition: all 0.5s ease;
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
                z-index: 100;
            }
            
            .nav-links.active {
                right: 0;
            }
            
            .nav-link {
                margin: 15px 0;
                font-size: 18px;
            }
            
            .cta-button {
                margin-top: 20px;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .menu-toggle.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }
            
            .menu-toggle.active .bar:nth-child(2) {
                opacity: 0;
            }
            
            .menu-toggle.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
            
            .hero-content {
                padding: 30px;
            }
            
            .hero-title {
                font-size: 36px;
            }
            
            .hero-description {
                font-size: 16px;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .associations-grid {
                grid-template-columns: 1fr;
            }
            
            .section {
                padding: 80px 0;
            }
            
            .section-title {
                font-size: 32px;
            }
        }
        
        @media (max-width: 576px) {
            .footer-container {
                grid-template-columns: 1fr;
            }
            
            .feature-card {
                width: 250px;
                padding: 30px 20px;
            }
            
            .hero-title {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Curseur personnalisé -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    
    <!-- Loader animé -->
    <div class="loader-wrapper">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    
    <!-- Navbar innovante -->
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-heart"></i>
            DonEnsemble
        </a>
        </a>
        <div class="nav-links">
            <a href="{{ route('accueil') }}" class="nav-link">Accueil</a>
            <a href="#" class="nav-link">Associations</a>
            <a href="{{ route('donateur.connexion') }}" class="cta-button">Connexion</a>
            <a href="{{ route('donateur.inscription') }}" class="cta-button">Inscription</a>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <!-- Hero section avec animation parallaxe -->
    <section class="hero">
        <div class="hero-bg">
            <div class="shape shape-1" data-speed="2"></div>
            <div class="shape shape-2" data-speed="-2"></div>
            <div class="shape shape-3" data-speed="3"></div>
            <div class="shape shape-4" data-speed="-3"></div>
        </div>
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="hero-title">Faites la différence <span>ensemble</span></h1>
            <p class="hero-description">DonEnsemble vous permet de soutenir des associations et des projets qui vous tiennent à cœur, tout en suivant l'évolution et l'impact de vos dons de manière transparente.</p>
            <div class="hero-buttons">
                <a href="{{ route('donateur.connexion') }}" class="primary-btn">Faire un don</a>
                <a href="#" class="secondary-btn">Découvrir les associations</a>
            </div>
        </div>
        <a href="#features" class="scroll-down">
            <span class="scroll-down-text">Découvrir</span>
            <div class="scroll-down-icon"></div>
        </a>
    </section>

    <!-- Section caractéristiques avec effet de carrousel 3D -->
    <section id="features" class="section features">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Pourquoi nous choisir</h2>
            <div class="features-carousel" data-aos="fade-up" data-aos-delay="200">
                <div class="carousel-container">
                    <div class="feature-card active">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Dons sécurisés</h3>
                        <p class="feature-description">Effectuez vos dons en toute sécurité grâce à notre plateforme chiffrée et nos transactions protégées. Vos données personnelles restent confidentielles.</p>
                    </div>
                    <div class="feature-card next">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Suivi transparent</h3>
                        <p class="feature-description">Suivez en temps réel l'évolution des cagnottes et l'utilisation de vos dons. Nous vous garantissons une transparence totale sur l'impact de votre générosité.</p>
                    </div>
                    <div class="feature-card next-2">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="feature-title">Associations vérifiées</h3>
                        <p class="feature-description">Toutes les associations présentes sur notre plateforme sont rigoureusement vérifiées pour garantir le sérieux et la légitimité de leurs actions.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3 class="feature-title">Impact direct</h3>
                        <p class="feature-description">Chaque euro donné a un impact concret. Recevez des mises à jour régulières sur les projets que vous soutenez et leurs avancées.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Communauté engagée</h3>
                        <p class="feature-description">Rejoignez une communauté de donateurs engagés et partagez vos valeurs avec des milliers de personnes qui œuvrent pour un monde meilleur.</p>
                    </div>
                </div>
                <div class="carousel-nav">
                    <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Section associations avec effet de grille animée -->
    <section class="section associations">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Associations à soutenir</h2>
            <div class="associations-grid">
                <div class="association-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-image-container">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=400&q=80" alt="Éducation Pour Tous" class="association-image">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="association-content">
                        <h3 class="association-name">Éducation Pour Tous</h3>
                        <p class="association-description">Nous œuvrons pour offrir une éducation de qualité aux enfants défavorisés dans le monde entier.</p>
                        <div class="progress-container">
                            <div class="progress-label">
                                <span>75% Atteint</span>
                                <span>15 000€ / 20 000€</span>
                            </div>
                            <div class="progress-bg">
                                <div class="progress-bar" style="width: 75%"></div>
                            </div>
                        </div>
                        <a href="#" class="association-button">Soutenir</a>
                    </div>
                </div>
                <div class="association-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-image-container">
                        <img src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=400&q=80" alt="Planète Verte" class="association-image">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="association-content">
                        <h3 class="association-name">Planète Verte</h3>
                        <p class="association-description">Nous agissons pour protéger la biodiversité et lutter contre les changements climatiques qui menacent notre planète.</p>
                        <div class="progress-container">
                            <div class="progress-label">
                                <span>60% Atteint</span>
                                <span>12 000€ / 20 000€</span>
                            </div>
                            <div class="progress-bg">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <a href="#" class="association-button">Soutenir</a>
                    </div>
                </div>
                <div class="association-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-image-container">
                        <img src="https://images.unsplash.com/photo-1477973770766-6228305816df?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=400&q=80" alt="Médecins Sans Frontières" class="association-image">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="association-content">
                        <h3 class="association-name">Médecins Sans Frontières</h3>
                        <p class="association-description">Nous apportons une assistance médicale aux populations victimes de crises dans le monde entier.</p>
                        <div class="progress-container">
                            <div class="progress-label">
                                <span>85% Atteint</span>
                                <span>42 500€ / 50 000€</span>
                            </div>
                            <div class="progress-bg">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        <a href="#" class="association-button">Soutenir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages avec effet de swiper -->
    <section class="section testimonials">
        <div class="container testimonials-container">
            <h2 class="section-title" data-aos="fade-up">Ce qu'ils en disent</h2>
            <div class="testimonials-swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-slide active">
                    <div class="testimonial">
                        <p class="testimonial-text">"Grâce à DonEnsemble, j'ai pu facilement soutenir plusieurs associations qui me tiennent à cœur. Le suivi des dons est vraiment transparent et me permet de voir l'impact concret de ma contribution."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sophie Durand" class="author-image">
                            <div class="author-info">
                                <h4>Sophie Durand</h4>
                                <p>Donatrice régulière</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <p class="testimonial-text">"En tant que petite association, DonEnsemble nous a permis de gagner en visibilité et de collecter les fonds nécessaires pour mener à bien nos projets. La plateforme est intuitive et l'équipe est très réactive."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Thomas Martin" class="author-image">
                            <div class="author-info">
                                <h4>Thomas Martin</h4>
                                <p>Président d'une association</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <p class="testimonial-text">"J'apprécie particulièrement la rigueur avec laquelle les associations sont sélectionnées. Cela me donne confiance quant à l'utilisation de mes dons. De plus, les mises à jour régulières me permettent de suivre les projets que je soutiens."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Marie Lambert" class="author-image">
                            <div class="author-info">
                                <h4>Marie Lambert</h4>
                                <p>Donatrice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-nav">
                <button class="active" data-index="0"></button>
                <button data-index="1"></button>
                <button data-index="2"></button>
            </div>
        </div>
    </section>

    <!-- Footer moderne -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div>
                    <div class="footer-logo">DonEnsemble</div>
                    <p class="footer-description">Notre plateforme vous permet de soutenir des associations et des projets qui vous tiennent à cœur, tout en suivant l'évolution et l'impact de vos dons.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="footer-title">Liens rapides</h3>
                    <ul class="footer-links">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Associations</a></li>
                        <li><a href="#">Comment ça marche</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Légal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Conditions générales</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Contact</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Avenue de la République, 75011 Paris</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+33 1 23 45 67 89</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>contact@donensemble.fr</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 DonEnsemble. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation AOS (Animate On Scroll)
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
            
            // Masquer le loader après chargement
            setTimeout(() => {
                document.querySelector('.loader-wrapper').style.opacity = '0';
                setTimeout(() => {
                    document.querySelector('.loader-wrapper').style.display = 'none';
                }, 500);
            }, 1500);
            
            // Initialiser les animations des barres de progression
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                    bar.style.transition = 'width 1.5s ease-in-out';
                }, 500);
            });
        });
        
        // Curseur personnalisé
        const cursor = document.querySelector('.cursor');
        const cursorFollower = document.querySelector('.cursor-follower');
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            setTimeout(() => {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';
            }, 100);
        });
        
        document.addEventListener('mousedown', () => {
            cursor.style.transform = 'translate(-50%, -50%) scale(0.8)';
            cursorFollower.style.transform = 'translate(-50%, -50%) scale(0.6)';
        });
        
        document.addEventListener('mouseup', () => {
            cursor.style.transform = 'translate(-50%, -50%) scale(1)';
            cursorFollower.style.transform = 'translate(-50%, -50%) scale(1)';
        });
        
        // Effet sur les liens pour le curseur personnalisé
        const links = document.querySelectorAll('a, button');
        links.forEach(link => {
            link.addEventListener('mouseenter', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
                cursorFollower.style.width = '30px';
                cursorFollower.style.height = '30px';
            });
            
            link.addEventListener('mouseleave', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                cursorFollower.style.width = '40px';
                cursorFollower.style.height = '40px';
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
        
        // Carrousel de caractéristiques
        const carousel = document.querySelector('.carousel-container');
        const cards = carousel.querySelectorAll('.feature-card');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentIndex = 0;
        
        function updateCarousel() {
            cards.forEach((card, index) => {
                card.className = 'feature-card';
                
                if (index === currentIndex) {
                    card.classList.add('active');
                } else if (index === (currentIndex + 1) % cards.length) {
                    card.classList.add('next');
                } else if (index === (currentIndex + 2) % cards.length) {
                    card.classList.add('next-2');
                } else if (index === (currentIndex - 1 + cards.length) % cards.length) {
                    card.classList.add('prev');
                } else if (index === (currentIndex - 2 + cards.length) % cards.length) {
                    card.classList.add('prev-2');
                }
            });
        }
        
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + cards.length) % cards.length;
            updateCarousel();
        });
        
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % cards.length;
            updateCarousel();
        });
        
        // Swiper testimonials
        const testimonialSlides = document.querySelectorAll('.swiper-slide');
        const testimonialNavButtons = document.querySelectorAll('.testimonial-nav button');
        let currentTestimonial = 0;
        
        function updateTestimonials(index) {
            testimonialSlides.forEach(slide => {
                slide.classList.remove('active');
            });
            
            testimonialNavButtons.forEach(button => {
                button.classList.remove('active');
            });
            
            testimonialSlides[index].classList.add('active');
            testimonialNavButtons[index].classList.add('active');
            currentTestimonial = index;
        }
        
        testimonialNavButtons.forEach(button => {
            button.addEventListener('click', () => {
                const index = parseInt(button.getAttribute('data-index'));
                updateTestimonials(index);
            });
        });
        
        // Auto-rotation des témoignages
        setInterval(() => {
            const nextIndex = (currentTestimonial + 1) % testimonialSlides.length;
            updateTestimonials(nextIndex);
        }, 5000);
        
        // Effet de parallaxe pour le hero
        const shapes = document.querySelectorAll('.shape');
        
        window.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            shapes.forEach(shape => {
                const speed = shape.getAttribute('data-speed');
                const moveX = (x - 0.5) * speed * 50;
                const moveY = (y - 0.5) * speed * 50;
                
                shape.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
        
        // Smooth scroll
        document.querySelector('.scroll-down').addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
