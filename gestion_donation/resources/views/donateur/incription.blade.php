@extends('layouts.Principale')

@section('title')
    Inscription Donateur
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<body class="">
  

<section class="vh-100 bg-image h-auto   ">

<div class="mask d-flex align-items-center h-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card h-auto" style="border-radius: 15px;" >
          <div class="card-body h-75 p-5">
            <h2 class="text-uppercase text-center mb-5">Inscription Donateur</h2>

            <form>

              <div class="mb-3">
                <label for="validationCustom01" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="validationCustom01"  required>
              </div>
              <div class="mb-3">
                <label for="validationCustom02" class="form-label">Nom</label>
                <input type="text" class="form-control" id="validationCustom02"  required>
              </div>
              <div class="mb-3">
                <label for="validationDefaultUsername" class="form-label">Addresse Email</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                  <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                </div>
              </div>
                <div class="mb-3">
                  <label for="exampleInputddn" class="form-label">Date de Naissance</label>
                  <input type="date" class="form-control" id="exampleInputddn">
                </div>
                <div class="mb-3">
                  <label for="exampleInputsexe" class="form-label">Sexe</label>
                  <select class="form-select" aria-label="Default select example"> 
                    <option selected>Non precisé</option>
                    <option value="1">Masculin</option>
                    <option value="2">Feminin</option>
                  </select>
                </div>
                
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmer <br> Mot de Passe</label>
                <input type="password" class="form-control" id="repeatInputPassword1">
              </div>
             
             
        
      
              <div class="d-flex justify-content-center mb-3">
                <button  type="button" data-mdb-button-init
                  data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">S'incrire</button>
              </div>

              <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="connexion-donateur"
                  class="fw-bold text-body"><u>Connectez Vous ICI</u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
 @endsection
 