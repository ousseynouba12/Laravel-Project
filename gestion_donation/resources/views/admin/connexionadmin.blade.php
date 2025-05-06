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
    <section class="vh-100">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 text-black">
      
              <div class="px-5 ms-xl-4">
                <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                <span class="h1 fw-bold mb-0">Administrateur</span>
              </div>
      
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
      
                <form style="width: 23rem;">
      
                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connexion</h3>
      
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example18"> Addresse Email</label>
                    <input type="email" id="form2Example18" class="form-control form-control-lg" />
                   
                  </div>
      
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example28">Mot de Passe </label>
                    <input type="password" id="form2Example28" class="form-control form-control-lg" />

                  </div>
      
                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="button">Connecter</button>
                  </div>
      
                 
                 
      
                </form>
      
              </div>
      
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="{{ asset('images/WAHABOU.jpeg') }}"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>