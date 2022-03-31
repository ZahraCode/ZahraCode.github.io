<?php require('notes_action.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include "../../assets/includes/head.php"  ?>
<style>
  #centre {
    margin: auto;
    width: 500px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Notes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link " href="notes.php">Ajouter notes </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="voir_note.php"> Voir Notes </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="modifier_notes.php"> Modifier notes </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../../admin/admin.php"> Acceuil </a>
          </li>



        </ul>
      </div>
    </div>
  </nav>
  <br>

  <form class="container" id="centre" method="POST">
    <div class="card text-center ">
      <div class="card-header bg-red">
        <h1>Ajouter Note</h1>
      </div>

    </div>
    </div>
    <br>
    <?php
    if (isset($errorMsg)) {
    ?>
      <div class="alert alert-danger" role="alert">
        <?= $errorMsg ?>
      </div>
    <?php
    } elseif(isset($succes)){
      ?>
          <div class="alert alert-success" role="alert">
             <?= $succes ?>
                 </div>
      <?php
    }

    ?>
    <br>
    <div class="mb-4">
      <label for="exampleInputEmail1" class="form-label">matricule</label>
      <input type="text" class="form-control" name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <select class="form-select mb-4" name="choix">
      <option selected>Choisi la matiere</option>

      <optgroup label="Approfondissement en informatique">
        <option value="Programmation objets">Programmation objets</option>
        <option value="Programmation web">Programmation web</option>
      </optgroup>
      <optgroup label="Mathematique applique">
        <option value="statistique">statistique</option>
        <option value="Gestion de projet">Gestion de projet</option>
      </optgroup>

      <optgroup label="manageriale">
        <option value="Anglais">Anglais</option>
        <option value="Gestion de l'entreprise">Gestion de l'entreprise</option>
      </optgroup>

    </select>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Controle</label>
          <input type="text" class="form-control" name="controle" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Examen</label>
          <input type="text" class="form-control" name="examen" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">TP</label>
          <input type="text" class="form-control" name="tp" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
    </div>



    <button type="submit" name="validate" class="btn btn-primary">Enregistrer</button>
    <br><br>

</body>


</html>