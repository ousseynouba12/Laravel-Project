@extends('layouts.Principale') 

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/connect.css') }}">

    <section class="vh-100 h-auto">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <!-- Ajout de la gestion des erreurs -->
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <!-- Modification du formulaire pour pointer vers la route de connexion -->
              <form method="POST" action="{{ route('donateur.login') }}">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  <p class="lead fw-normal mb-0 me-3">S'inscrire Avec</p>
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
      
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                  </button>
      
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-linkedin-in"></i>
                  </button>
                </div>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Ou</p>
                </div>
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" 
                         class="form-control form-control-lg @error('email') is-invalid @enderror"
                         value="{{ old('email') }}" 
                         placeholder="Entrez votre adresse email" required />
                  <label class="form-label" for="email">Adresse Email</label>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" name="password" id="password" 
                         class="form-control form-control-lg @error('password') is-invalid @enderror"
                         placeholder="Entrez votre mot de passe" required />
                  <label class="form-label" for="password">Mot de passe</label>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" name="remember" 
                           id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember">
                      Se souvenir de moi 
                    </label>
                  </div>
                 </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Connecter</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">
                    Vous n'avez pas de compte? 
                    <a href="{{ route('donateur.inscription') }}" class="link-danger">S'inscrire</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
@endsection