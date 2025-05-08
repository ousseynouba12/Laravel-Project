<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - DonEnsemble</title>
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
            --error: #E74C3C;
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
        
        /* Section d'inscription */
        .register-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 150px 20px 100px;  /* Augmenté le padding en haut pour plus d'espace */
            position: relative;
            overflow: hidden;
        }
        
        .register-bg {
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
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(30px, 30px) rotate(5deg); }
        }
        
        /* Formulaire d'inscription */
        .register-container {
            width: 500px;
            max-width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            padding: 40px;
            position: relative;
            z-index: 1;
        }
        
        .register-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
            text-align: center;
        }
        
        .register-subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .register-form {
            display: flex;
            flex-direction: column;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .input-icon-wrapper {
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 15px 20px;
            padding-left: 50px;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Outfit', sans-serif;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(78, 147, 122, 0.1);
        }
        
        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            transition: color 0.3s ease;
        }
        
        .form-control:focus + .input-icon {
            color: var(--primary);
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary);
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .form-check {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .form-check input {
            margin-right: 10px;
            margin-top: 3px;
            accent-color: var(--primary);
        }
        
        .register-button {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            font-family: 'Outfit', sans-serif;
            box-shadow: 0 5px 15px rgba(78, 147, 122, 0.2);
        }
        
        .register-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.3);
        }
        
        .login-link {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 15px;
        }
        
        .login-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        /* Responsive */
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
            
            .register-container {
                padding: 30px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
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
        <a href="/" class="logo">
            <i class="fas fa-heart"></i>
            DonEnsemble
        </a>
        <div class="nav-links">
            <a href="/" class="nav-link">Accueil</a>
            <a href="#" class="nav-link">Associations</a>
            <a href="#" class="nav-link">Comment ça marche</a>
            <a href="#" class="nav-link">À propos</a>
            <a href="#" class="nav-link">Contact</a>
            <a href="#" class="cta-button">Faire un don</a>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <!-- Section d'inscription simplifié -->
    <section class="register-section">
        <div class="register-bg">
            <div class="shape shape-1" data-speed="2"></div>
            <div class="shape shape-2" data-speed="-2"></div>
            <div class="shape shape-3" data-speed="3"></div>
        </div>
        
        <div class="register-container" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="register-title">Créer un compte</h1>
            <p class="register-subtitle">Rejoignez notre communauté de donateurs</p>
            
            <form class="register-form" id="registerForm" action="" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <div class="input-icon-wrapper">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-icon-wrapper">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-icon-wrapper">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-icon-wrapper">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-icon-wrapper">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">J'accepte les <a href="#" style="color: var(--primary);">conditions générales</a> et la <a href="#" style="color: var(--primary);">politique de confidentialité</a></label>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Je souhaite recevoir la newsletter et être informé des nouveautés</label>
                </div>
                
                <button type="submit" class="register-button">S'inscrire</button>
                
                <p class="login-link">
                    Vous avez déjà un compte ? <a href="/login">Connectez-vous</a>
                </p>
            </form>
        </div>
    </section>

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
        const links = document.querySelectorAll('a, button, input, label');
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
        
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Toggle confirm password visibility
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordField = document.getElementById('password_confirmation');
        
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Effet de parallaxe pour le background
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
    </script>
</body>
</html>
