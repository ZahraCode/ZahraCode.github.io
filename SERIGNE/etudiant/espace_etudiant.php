<?php
 
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<?php include "../assets/includes/head.php"  ?>
 <style>
     #centre{
         margin:auto;
         width:500px;
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
          <a class="nav-link "  href="../acceuil1.php">Deconnexion </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br><br><br><br>
<div class="card container text-center w-75">
      <div class="card-header text-light bg-dark">
           <h1>BIENVENU  DANS VOTRE ESPACE DE CONSULTATION DE NOTE: <?=$_SESSION['matricule']; ?></h1>
      </div>
      
      </div>
   </div>

  

</body>
</html>