<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Donateur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="inscription-container">
            <div class="header">
                <img src="/api/placeholder/200/100" alt="Logo Organisation" class="img-fluid">
                <h1>Inscription Donateur</h1>
                <p class="text-muted">Rejoignez notre communauté de donateurs et contribuez à nos actions</p>
            </div>

            <form id="inscriptionForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="telephone">
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse">
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="codePostal" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="codePostal">
                    </div>
                    <div class="col-md-8">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="motDePasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="motDePasse" required>
                    <div class="form-text">Votre mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.</div>
                </div>
                
                <div class="mb-3">
                    <label for="confirmMotDePasse" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmMotDePasse" required>
                </div>

                <div class="mb-4">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>

                <div class="mt-4 text-center">
                    <p>Vous avez déjà un compte ? <a href="{{ route('donateur.connexion') }}">Connectez-vous ici</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('inscriptionForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Validation du mot de passe
            const password = document.getElementById('motDePasse').value;
            const confirmPassword = document.getElementById('confirmMotDePasse').value;
            
            if (password !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas !');
                return false;
            }
            
            // Simuler l'envoi du formulaire avec succès
            alert('Inscription réussie ! Vous allez être redirigé vers la page de connexion.');
           window.location.href = '{{ route('donateur.connexion') }}';
        });
    </script>
</body>
</html>