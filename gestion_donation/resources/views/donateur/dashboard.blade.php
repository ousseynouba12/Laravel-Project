<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - DonEnsemble</title>
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
            background-color: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .cta-button {
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            margin-left: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(78, 147, 122, 0.2);
        }
        
        .cta-button:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(232, 141, 103, 0.3);
        }
        
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        
        .bar {
            width: 25px;
            height: 3px;
            background-color: var(--dark);
            margin: 3px 0;
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        
        .menu-toggle.active .bar:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        
        .menu-toggle.active .bar:nth-child(2) {
            opacity: 0;
        }
        
        .menu-toggle.active .bar:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
        
        /* Dashboard styles */
        .dashboard-section {
            padding-top: 150px;
            min-height: 100vh;
            position: relative;
        }
        
        .dashboard-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.5;
        }
        
        .shape-1 {
            width: 400px;
            height: 400px;
            background-color: var(--secondary);
            top: 10%;
            left: -200px;
        }
        
        .shape-2 {
            width: 300px;
            height: 300px;
            background-color: var(--tertiary);
            bottom: 20%;
            right: -150px;
        }
        
        .shape-3 {
            width: 200px;
            height: 200px;
            background-color: var(--accent);
            top: 60%;
            left: 10%;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .welcome-header {
            margin-bottom: 30px;
            text-align: center;
        }
        
        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }
        
        .welcome-subtitle {
            font-size: 18px;
            color: var(--dark);
            opacity: 0.8;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: var(--light);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .stat-icon i {
            font-size: 24px;
            color: var(--primary);
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .stat-label {
            font-size: 14px;
            color: var(--dark);
            opacity: 0.7;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .dashboard-card {
            background: var(--light);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: var(--light);
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }
        
        .card-subtitle {
            font-size: 14px;
            opacity: 0.8;
            position: relative;
            z-index: 1;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .card-button {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(78, 147, 122, 0.2);
        }
        
        .card-button:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(232, 141, 103, 0.3);
        }
        
        .activity-list {
            list-style: none;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .activity-icon i {
            font-size: 16px;
            color: var(--primary);
        }
        
        .activity-content {
            flex-grow: 1;
        }
        
        .activity-title {
            font-weight: 500;
            margin-bottom: 3px;
        }
        
        .activity-time {
            font-size: 12px;
            color: var(--dark);
            opacity: 0.7;
        }
        
        .activity-amount {
            font-weight: 600;
            color: var(--primary);
        }
        
        .association-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .association-item:last-child {
            border-bottom: none;
        }
        
        .association-logo {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            overflow: hidden;
        }
        
        .association-logo i {
            font-size: 24px;
            color: var(--primary);
        }
        
        .association-content {
            flex-grow: 1;
        }
        
        .association-name {
            font-weight: 500;
            margin-bottom: 3px;
        }
        
        .association-category {
            font-size: 12px;
            color: var(--dark);
            opacity: 0.7;
        }
        
        .association-progress {
            height: 6px;
            background-color: #eee;
            border-radius: 3px;
            margin-top: 8px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background-color: var(--primary);
            border-radius: 3px;
        }
        
        @media (max-width: 1024px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
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
                background-color: var(--light);
                flex-direction: column;
                align-items: flex-start;
                padding: 100px 30px 30px;
                transition: right 0.4s ease;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                right: 0;
            }
            
            .nav-link {
                margin: 15px 0;
            }
            
            .cta-button {
                margin: 15px 0;
            }
            
            .menu-toggle {
                display: flex;
                z-index: 101;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-container {
                padding: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .stats-container {
                grid-template-columns: 1fr;
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
        <a href="{{ route('accueil') }}" class="logo">
            <i class="fas fa-heart"></i>
            DonEnsemble
        </a>
        <div class="nav-links">
            <a href="{{ route('donateur.dashboard') }}" class="nav-link">Tableau de bord</a>
            <a href="{{ route('donateur.profile') }}" class="nav-link">Mon profil</a>
            <a href="{{ route('donateur.historique') }}" class="nav-link">Mes dons</a>
            <form action="{{ route('donateur.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="cta-button" style="border: none; cursor: pointer;">Déconnexion</button>
            </form>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <!-- Section tableau de bord -->
    <section class="dashboard-section">
        <div class="dashboard-bg">
            <div class="shape shape-1" data-speed="2"></div>
            <div class="shape shape-2" data-speed="-2"></div>
            <div class="shape shape-3" data-speed="3"></div>
        </div>
        
        <div class="dashboard-container" data-aos="fade-up" data-aos-duration="1000">
            @if (session('success'))
                <div style="background-color: var(--secondary); color: var(--dark); padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="welcome-header">
                <h1 class="welcome-title">Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }} !</h1>
                <p class="welcome-subtitle">Voici un aperçu de votre activité sur DonEnsemble</p>
            </div>
            
            <div class="stats-container" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-donate"></i>
                    </div>
                    <div class="stat-value">{{ Auth::user()->dons->count() }}</div>
                    <div class="stat-label">Dons effectués</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                    <div class="stat-value">{{ Auth::user()->dons->sum('montant') }} €</div>
                    <div class="stat-label">Total des dons</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stat-value">{{ Auth::user()->dons->pluck('association_id')->unique()->count() }}</div>
                    <div class="stat-label">Associations soutenues</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="stat-value">{{ Auth::user()->created_at->diffInMonths() + 1 }}</div>
                    <div class="stat-label">Mois d'ancienneté</div>
                </div>
            </div>
            
            <div class="dashboard-grid">
                <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <h3 class="card-title">Faire un don</h3>
                        <p class="card-subtitle">Soutenez une cause qui vous tient à cœur</p>
                    </div>
                    <div class="card-body">
                        <p>Choisissez parmi nos associations partenaires et contribuez à des projets qui font la différence. Chaque don compte, peu importe son montant.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-button">Faire un don</a>
                    </div>
                </div>
                
                <div class="dashboard-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-header">
                        <h3 class="card-title">Activité récente</h3>
                        <p class="card-subtitle">Vos derniers dons</p>
                    </div>
                    <div class="card-body">
                        <ul class="activity-list">
                            @forelse(Auth::user()->dons()->with('association')->latest()->take(4)->get() as $don)
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Don à {{ $don->association->nom }}</div>
                                        <div class="activity-time">{{ $don->created_at->format('d/m/Y') }}</div>
                                    </div>
                                    <div class="activity-amount">{{ $don->montant }} €</div>
                                </li>
                            @empty
                                <li class="activity-item">
                                    <div class="activity-content">
                                        <div class="activity-title">Aucun don effectué pour le moment</div>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('donateur.historique') }}" class="card-button">Voir tout l'historique</a>
                    </div>
                </div>
                
                <div class="dashboard-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-header">
                        <h3 class="card-title">Associations recommandées</h3>
                        <p class="card-subtitle">Basé sur vos intérêts</p>
                    </div>
                    <div class="card-body">
                        <div class="association-item">
                            <div class="association-logo">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="association-content">
                                <div class="association-name">Eco-Planète</div>
                                <div class="association-category">Environnement</div>
                                <div class="association-progress">
                                    <div class="progress-bar" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="association-item">
                            <div class="association-logo">
                                <i class="fas fa-paw"></i>
                            </div>
                            <div class="association-content">
                                <div class="association-name">Protection Animale</div>
                                <div class="association-category">Animaux</div>
                                <div class="association-progress">
                                    <div class="progress-bar" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="association-item">
                            <div class="association-logo">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="association-content">
                                <div class="association-name">Éducation Pour Tous</div>
                                <div class="association-category">Éducation</div>
                                <div class="association-progress">
                                    <div class="progress-bar" style="width: 45%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-button">Découvrir plus</a>
                    </div>
                </div>
            </div>
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
    </script>
</body>
</html>
