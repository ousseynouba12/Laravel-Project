<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
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
        .header h1 {
            color: #2c3e50;
        }
        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
            padding: 10px 20px;
        }
        .btn-success:hover {
            background-color: #219955;
            border-color: #219955;
        }
        .form-control:focus {
            border-color: #27ae60;
            box-shadow: 0 0 0 0.25rem rgba(39, 174, 96, 0.25);
        }
        .admin-badge {
            display: inline-block;
            background-color: #2c3e50;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 10px;
            font-size: 14px;
        }
        .secure-note {
            font-size: 14px;
            color: #7f8c8d;
            display: flex;
            align-items: center;
            margin-top: 20px;
            justify-content: center;
        }
        .secure-note i {
            margin-right: 5px;
            color: #27ae60;
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
                <h1>Connexion <span class="admin-badge">Administration</span></h1>
                <p class="text-muted">Accès restreint au personnel autorisé</p>
            </div>

            <form id="adminLoginForm">
                <div class="mb-4">
                    <label for="adminUsername" class="form-label">Identifiant administrateur</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                        <input type="text" class="form-control" id="adminUsername" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="adminPassword" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="adminPassword" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleAdminPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="adminRemember">
                    <label class="form-check-label" for="adminRemember">Se souvenir de moi</label>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Connexion administrateur</button>
                </div>
                
                <div class="footer-links">
                    <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                    <a href="connexiondonateur.html" class="text-decoration-none">Espace donateur</a>
                </div>
                
                <div class="secure-note">
                    <i class="fas fa-shield-alt"></i>
                    <span>Connexion sécurisée - Accès réservé aux administrateurs</span>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Afficher/masquer le mot de passe
        document.getElementById('toggleAdminPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('adminPassword');
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
        document.getElementById('adminLoginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Connexion administrateur réussie !');
            // Redirection vers l'espace administrateur après connexion
            // window.location.href = 'admin-dashboard.html';
        });
    </script>
</body>
</html>