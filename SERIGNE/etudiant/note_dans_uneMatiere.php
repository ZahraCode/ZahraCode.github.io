<?php
 session_start();
 require('../assets/actions/database.php');
 
 if(isset($_POST['validate'])){
     if (!empty($_POST['choix'])) {

         //recuperation de formation et matiere 
    
        $choix = $_POST['choix'];
        
        //recuperer Note selon matiere et matricule
        $list=$bdd->prepare('SELECT matiere,examen,controle,tp FROM notes WHERE matricule= ? AND matiere=?');
        $list->execute(array($_SESSION['matricule'],$choix));
         $liste=$list->fetchAll();
         
      }
      else{
          $errorMsg="choisi une matiere......";
      }
    
 }
 
?>
<!DOCTYPE html>
 <html lang="en">
 <?php include "../assets/includes/head.php"  ?>
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
          <a class="nav-link "  href="#"> Modifier mot de passe </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../acceuil1.php">Deconnexion </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container w-50">
  <div class="card text-center ">
      <div class="card-header text-light bg-dark ">
           <h1>NOTE DANS UNE MATIERE</h1>
      </div>
      
      </div>
   </div>
</div>
<br>
<form class="container" id="centre" method="POST">

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

  
  <button type="submit" id ="valide"  name="validate" class="btn btn-primary">Afficher Note</button>
  



<br>


</form>
<br> 

<table class="table  table-striped container w-50">
   
   <?php
        if (isset($_POST['validate']) AND !empty($_POST['choix']) AND isset($_POST['choix'])){
     ?>
          <thead class='table-dark' id="menu">
       <tr>
         <th scope="col">Matiere</th>
         <th scope="col">Controle </th>
         <th scope="col">TP</th>
         <th scope="col">examen</th>
         
         
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
       <td> <?= $test['matiere'] ?> </td>
       <td> <?= $test['controle'] ?> </td>
         <td><?= $test['tp'] ?></td>
         <td><?= $test['examen'] ?></td>
         
       </tr>
       
     </tbody>
     <?php
       }
       ?>

   </table>
  
  

 </body>
 </html>