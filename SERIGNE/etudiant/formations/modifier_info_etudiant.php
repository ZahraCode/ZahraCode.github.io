<?php
 
 require('../../assets/actions/database.php');
 $list=$bdd->prepare('SELECT id,matricule,nom,prenom,adresse,numero,mdp FROM etudiant ORDER BY id DESC');
 $list->execute();
 $liste=$list->fetchAll();
 //var_dump($test);
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
<div class="stycky-top">
    
</div>
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
<div class="container  w-50">
  <div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Listes des etudiants inscrits</h1>
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
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php
     foreach($liste as $test ){
         ?>
         
  <tbody>
    <tr>
      
      <td><?= $test['matricule'] ?> </td>
      <td><?= $test['nom'] ?></td>
      <td><?= $test['prenom'] ?></td>
      <td><?= $test['adresse'] ?></td>
      <td><?= $test['numero'] ?></td>
      <td><?= $test['mdp'] ?></td>
      <td><a href="update_etudiant.php?id=<?= $test['id'] ?>" class="btn btn-success">Modifier</a></td>

    </tr>
    
  </tbody>
  <?php
    }
    ?>
      

</table>
    
 
</body>
</html>