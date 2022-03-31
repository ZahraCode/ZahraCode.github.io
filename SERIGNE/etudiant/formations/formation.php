<?php require ('formation_action.php')?>
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
 <nav class="navbar navbar-expand-lg  sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Formations</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link "  href="formation.php">Ajouter une Formation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="liste_etudiant_formation.php"> Voir etudiants d'une formation </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../../admin/admin.php">Acceuil </a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container w-50">
  <div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Ajouter formation et matiere</h1>
      </div>
      
      </div>
   </div>
</div>
<br>
     <form class="container" id="centre" method="POST">

     <?php
        if (isset($errorMsg)){
     ?>
          <div class="alert alert-danger" role="alert"> 
            <?=$errorMsg?>  
            </div> 
           <?php 
        } 
          
        ?>
<br>
 

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">matricule</label>
    <input type="text" class="form-control w-100"  name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>

<select class="form-select w-100" name="choix" >
  <option selected>Choisi une formation</option>
  
  <optgroup  label="Approfondissement en informatique" >
          <option value="Programmation objets-Approfondissement en informatique">Programmation objets</option>
          <option value="Programmation web-Approfondissement en informatique">Programmation web</option>
  </optgroup>
  <optgroup label="Mathematique applique" >
         <option value="statistique-Mathematique applique">statistique</option>
         <option value="Gestion de projet-Mathematique applique">Gestion de projet</option>
  </optgroup  >

  <optgroup label="manageriale">
       <option value="Anglais-manageriale" >Anglais</option>
       <option value="Gestion de l'entreprise-manageriale">Gestion de l'entreprise</option>
  </optgroup>
  
</select>

  <br>
  <button type="submit" id ="valide" name="validate" class="btn btn-primary">Ajouter </button>

 
  
</form>
 </body>
 </html>