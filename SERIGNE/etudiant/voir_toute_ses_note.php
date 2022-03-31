<?php
 session_start();
 require('../assets/actions/database.php');
 
 
        
        //recuperer Note selon matiere et matricule
        $list=$bdd->prepare('SELECT matiere,examen,controle,tp FROM notes WHERE matricule= ? ');
        $list->execute(array($_SESSION['matricule']));
         $liste=$list->fetchAll();
         
      
 
 
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
          <a class="nav-link "  href="update_password.php"> Modifier mot de passe </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../acceuil1.php">Deconnexion </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>

<div class="container w-50">
  <div class="card text-center ">
      <div class="card-header ">
           <h1>Notes de toutes les matieres</h1>
      </div>
      
      </div>
   </div>
</div>
<br>




<br> 

<table class="table  table-striped container w-50">
   
   
          <thead class='table-dark' id="menu">
       <tr>
         <th scope="col">Matiere </th>
         <th scope="col">Controle </th>
         <th scope="col">TP</th>
         <th scope="col">examen</th>
         
       </tr>
     </thead>


   
      
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