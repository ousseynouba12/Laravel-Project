<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Donateur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 500px;
            width: 100%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-height: 100px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        .social-login {
            margin-top: 20px;
            text-align: center;
        }
        .social-btn {
            margin: 5px;
            padding: 10px 15px;
        }
        .footer-links {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="header">
                <img src="/api/placeholder/200/100" alt="Logo Organisation" class="img-fluid">
                <h1>Connexion Donateur</h1>
                <p class="text-muted">Accédez à votre espace personnel</p>
            </div>

            <form id="donateurLoginForm">
                <div class="mb-3">
                    <label for="donateurEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="donateurEmail" required>
                </div>
                
                <div class="mb-3">
                    <label for="donateurPassword" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="donateurPassword" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleDonateurPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="donateurRemember">
                    <label class="form-check-label" for="donateurRemember">Se souvenir de moi</label>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
                
                <div class="footer-links">
                    <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                   <a href="{{ route('admin.connexion') }}" class="text-decoration-none">Espace administrateur</a>
                </div>
                
                <div class="mt-3 text-center">
                    <p>Pas encore de compte ? <a href="{{ route('donateur.inscription') }}" class="text-decoration-none">S'inscrire</a></p>
                </div>
                
               
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Afficher/masquer le mot de passe
        document.getElementById('toggleDonateurPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('donateurPassword');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Traitement du formulaire de connexion
        document.getElementById('donateurLoginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Connexion donateur réussie !');
            // Redirection vers l'espace donateur après connexion
            // window.location.href = 'espace-donateur.html';
        });
    </script>
</body>
</html>