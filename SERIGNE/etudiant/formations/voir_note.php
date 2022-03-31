<?php
 
 require('../../assets/actions/database.php');
 
 if(isset($_POST['validate'])){
     if (isset($_POST['matricule']) AND !empty($_POST['matricule'])) {

         //verifi si matricule exist deja dans le site
         
         $user_matricule=htmlspecialchars($_POST['matricule']);
         $checkIfmatriculeExist = $bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
         $checkIfmatriculeExist->execute(array($user_matricule));

         if($checkIfmatriculeExist->rowCount() > 0){
            $list=$bdd->prepare('SELECT matricule,matiere,controle,examen,tp FROM notes WHERE matricule = ?');
            $list->execute(array($user_matricule));
             $liste=$list->fetchAll();
            

         }else{
             $errorMsg="Matricule n'existe pas";
         }

     

    
       
      
      }
    
 }
 
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
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
        <li class="nav-item">
          <a class="nav-link "  href="notes.php"> Ajouter notes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="voir_note.php"> Voir notes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="modifier_notes.php"> Modifier notes </a>
        </li>

        <li class="nav-item">
          <a class="nav-link "  href="../../admin/admin.php">Acceuil</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
<br>

<form class="container" id="centre" method="POST">
<div class="card text-center ">
      <div class="card-header bg-red">
           <h1>Voir Note</h1>
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
  ?>
<br>
   

<div class="mb-4">
     <label for="exampleInputEmail1" class="form-label">Votre matricule</label>
     <input type="text" class="form-control"  name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>

 <button type="submit" name="validate" class="btn btn-primary ">Afficher</button>
<br><br>
<?php
    if(isset($_POST['validate']) && isset($_POST['matricule']) AND !empty($_POST['matricule'])){
        ?>
            <table class="table  table-striped container w-50">
   
   <thead class='table-dark'>
   
   
       <tr>
         <th scope="col"> Matricule </th>
         <th scope="col">Matiere</th>
         <th scope="col">Examen</th>
         <th scope="col">Controle</th>
         <th scope="col">TP</th>
         
       </tr>
     </thead>
   
      
   <?php
        foreach($liste ?? [] as $test ){
            ?>
            
     <tbody>
       <tr>
       <td> <?= $test['matricule'] ?> </td>
         <td><?= $test['matiere'] ?></td>
         <td><?= $test['controle'] ?></td>
         <td><?= $test['examen'] ?></td>
         <td><?= $test['tp'] ?></td>
         
       </tr>
       
     </tbody>
     <?php
       }
       ?>
         
   
   </table>

    <br><br>
  
</body>
        <?php
    }
?>
 


</html>