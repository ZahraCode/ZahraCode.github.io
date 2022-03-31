<?php
 
 require('../../assets/actions/database.php');
 
 if(isset($_POST['validate'])){
     if (!empty($_POST['choix'])) {

         //recuperation de formation et matiere 
    
        $choix = $_POST['choix'];

     $list=$bdd->prepare('SELECT DISTINCT matricules,nom,prenom FROM formation WHERE formation = ? ');
     $list->execute(array($choix));
      $liste=$list->fetchAll();

    
       
      
      }
    
 }
 
?>
<!DOCTYPE html>
 <html lang="en">
 <?php include "../../assets/includes/head.php"  ?>
 <style>
    #valides {
        position:absolute;
        right:300px;
        top:166px;
    }
     
     #centre{
         margin:auto;
         width:500px;
     }
 
 </style>
  
     
 <body>
 <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Formations</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link "  href="formation.php">Ajouter une formation </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="liste_etudiant_formation.php">Voir etudiants d'une formation </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../../admin/admin.php">Acceuil </a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container w-75">
  <div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Listes des etudiants de meme formation</h1>
      </div>
      
      </div>
   </div>
</div>
<br>
<form class="container" id="centre" method="POST">



  <select class="form-select w-100" name="choix" >
     <option selected>Choisi une formation</option>

     <option value="Approfondissement en informatique">Approfondissement en informatique</option>

    <option value="Mathematique applique">Mathematique applique</option>

   <option value="manageriale">manageriale</option>
  
</select>

  <br>
  <button type="submit" id ="valide"  name="validate" class="btn btn-primary">Afficher</button>
  



<br>


</form>
<br> 

<table class="table  table-striped container w-50">
   
   <?php
        if (isset($_POST['validate']) AND !empty($_POST['choix']) AND isset($_POST['choix'])){
     ?>
          <thead class='table-dark' id="menu">
       <tr>
         <th scope="col"> Matricule </th>
         <th scope="col">Nom</th>
         <th scope="col">Prenom</th>
         
       </tr>
     </thead>
     <?php
      }
      ?>

   
      
   <?php
        foreach($liste ?? [] as $test ){
            ?>
            
     <tbody>
       <tr>
       <td> <?= $test['matricules'] ?> </td>
         <td><?= $test['nom'] ?></td>
         <td><?= $test['prenom'] ?></td>
         
       </tr>
       
     </tbody>
     <?php
       }
       ?>

   </table>
  
  

 </body>
 </html>