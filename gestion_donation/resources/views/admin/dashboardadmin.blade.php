<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - DonEnsemble</title>
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
            height: auto;
            
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
        .cherch-button {
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 7px;
            margin-top: 15px;
            margin-right: 60px;
            margin-left: 7px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            font-family: 'Outfit', sans-serif;
            box-shadow: 0 5px 15px rgba(78, 147, 122, 0.2);
        }
        
        .cherch-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(78, 147, 122, 0.3);
        }

        .form-control {
            width: 100%;
            gap: 5px;
            padding: 7px;
            margin-left: 5px;
            justify-content: center;
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
 

.nav-menu {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  padding: 0 15px;
  margin-top: 170px;
  background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.65, 0, 0.35, 1);
            width: 170px;
  
 
}
.nav-item {
  display: flex;
  align-items: center;
  padding: 14px 20px;
  color: var(--text-secondary);
  text-decoration: none;
  font-weight: 500;
  font-size: 15px;
  margin-bottom: 8px;
  transition: all 0.3s ease;
  border-radius: 12px;
  border-left: 3px solid transparent;
}
.nav-item:hover {
  background-color: var(--primary-light);
  color: var(--primary-color);
  transform: translateX(5px);
}
.nav-item.active {
  background-color: var(--primary-light);
  color: var(--primary-color);
  font-weight: 600;
  border-left: 3px solid var(--primary-color);
}
.nav-item i {
  margin-right: 15px;
  font-size: 18px;
  width: 24px;
  text-align: center;
}
.deconnecte{

    margin-top: 100px;
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

     <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-heart"></i>
            Admin Dashboard
        </a>
        </a>
        <div class="nav-links">
       <input type="text" id="chercher" class="form-control" name="chercher">
       <button type="submit" class="cherch-button">Rechercher</button>

       <a href="#" class="logo">
        <i class="fa-solid fa-user"></i>
        Profile
    </a>
           
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    

    <div class="nav-menu">
        <a href="#" class="nav-item active">
            <i class="fas fa-chart-line"></i>
          <span>Dashboard</span>
        </a>
        <a href="#" class="nav-item">
            <i class="fa-solid fa-user-tie"></i>
          <span>Association</span>
        </a>
        <a href="#" class="nav-item">
            <i class="fa-solid fa-hand-holding-heart"></i>
          <span>Donateur</span>
        </a>
        <a href="#" class="nav-item">
            <i class="fa-solid fa-book-open"></i>
          <span>Rapport</span>
        </a>
        <a href="#" class="nav-item">
            <i class="fa-solid fa-money-bill-trend-up"></i>
          <span>Transaction</span>
        </a>

        <a href="#" class="nav-item   deconnecte">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          <span>Deconnecter</span>
        </a>
      </div>

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