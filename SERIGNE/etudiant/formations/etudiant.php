<?php
 
 session_start();
 if (!isset($_SESSION['auth'])){
     header('Location: admin/login.php');
 }
require ('../signupEtudiant.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include "../../assets/includes/head.php"  ?>
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
          <a class="nav-link "  href="etudiant.php"> Inscrire un etudiant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="liste_etudiant_inscrit.php">  Etudiants inscrits </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="modifier_info_etudiant.php"> Modifier infos etudiant </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../../admin/admin.php">Acceuil </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>

  
<form class="container" id="centre" method="POST">
<div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Ajouter un etudiant</h1>
      </div>
      
      </div>
   </div>
<br>
  <?php
        if (isset($errorMsg)){
     ?>
          <div class="alert alert-danger" role="alert"> 
            <?=$errorMsg?>  
            </div> 
           <?php 
        } 
          elseif (isset($sucess)) {
            ?>
                <div class="alert alert-success" role="alert"> 
                     <?=$sucess?>  
                </div> 
            <?php
          }
        ?>
          
         
    
<br>
<div class="row">
     <div class="col">
     <div class="mb-1 w-100">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control"  name="prenom" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
     </div>
     <div class="col">
     <div class="mb-1 w-100">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control"  name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
     </div>
</div>
<div class="row">
  <div class="col">
    <div class="mb-1 w-100">
            <label for="exampleInputEmail1" class="form-label">matricule</label>
            <input type="text" class="form-control"  name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  </div>
  <div class="col">
  <div class="mb-1 w-100">
    <label for="exampleInputPassword1" class="form-label">Telephone</label>
    <input type="number" class="form-control" name="numero" id="exampleInputPassword1">
  </div>
  </div>
</div>

<div class="mb-1 w-100">
    <label for="exampleInputEmail1" class="form-label">Adresse </label>
    <input type="text" class="form-control"  name="adresse" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>

  <div class="mb-1 w-100">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
  </div>
    <br>
  <button  type="submit" name="validate" class="btn btn-primary mb-3 w-25">Ajouter</button>
    

</form>
</body>
</html>