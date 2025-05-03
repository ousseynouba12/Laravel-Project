@extends('layouts.Principale')

@section('title')
    Bienvenue
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<link rel="stylesheet" href="ressources/css/style.css">
<section class="container  Inscription">
    <div class="row p-5 ">
      <div class="col-12">
        <form>
          <h1 class="mb-3">Inscription Donateur </h1>
          <div class="mb-3">
            <label for="validationCustom01" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="validationCustom01"  required>
          </div>
          <div class="mb-3">
            <label for="validationCustom02" class="form-label">Last name</label>
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
            </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmer <br> Mot de Passe</label>
            <input type="password" class="form-control" id="repeatInputPassword1">
          </div>
         
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
       </div>
    
  </div>
  </section> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
 @endsection
 