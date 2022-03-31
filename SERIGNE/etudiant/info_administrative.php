<?php
    session_start();
    require ("../assets/actions/database.php");
    $_SESSION['nom'] ;
    $_SESSION['prenom'] ;
    $_SESSION['adresse']  ;
    $_SESSION['numero'] ;
    $_SESSION['matricule'] ;
    

   ?>

<!DOCTYPE html>
<html lang="en">
<?php include "../assets/includes/head.php"  ?>
<style>
  #centre {
    margin: auto;
    width: 500px;
  }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Etudiants</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link "  href="info_administrative.php">Infos administrative</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="note_dans_uneMatiere.php"> Voir note dans une matiere</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="voir_toute_ses_note.php"> Voir toutes ses notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="update_password.php"> Modifier mot de passe </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../acceuil1.php">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <br><br><br><br>
  <div class="container w-50">
    <div class="card text-center ">
      <div class="card-header ">
        <h1>Informations administratives</h1>
      </div>

    </div>
  </div>
  </div>

  <br>
  <table class="table  table-striped container w-50">
    <thead class="table-dark">
      <tr>
        <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Numero</th>
        <th scope="col">Mot de passe</th>

      </tr>
    </thead>
    
      <tbody>
        <tr>

          <td><?= $_SESSION['matricule'] ?> </td>
          <td><?= $_SESSION['nom'] ?></td>
          <td><?= $_SESSION['prenom'] ?></td>
          <td><?= $_SESSION['adresse'] ?></td>
          <td><?= $_SESSION['numero'] ?></td>
          <td><?= $_SESSION['mdp'] ?></td>
          

        </tr>

      </tbody>
    


  </table>


</body>

</html>