<?php require ('loginActionEtudiant.php')  ?>
<!DOCTYPE html>
<html lang="en">
 <?php include "../assets/includes/head.php"  ?>
 <style>
  
   #valide{
     width:500px;
     margin:auto;
   }
 </style>
<body>
  <br><br>
<form class="container" id="valide" method="POST">
<div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Connexion</h1>
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
  

  
<div class="mb-3 w-100">
    <label for="exampleInputEmail1" class="form-label">matricule</label>
    <input type="text" class="form-control"  name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
  <div class="mb-3 w-100">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
  </div>
  <br>
  <button type="submit" name="validate" class="btn btn-primary">Se connecter</button>
   <br><br>
   
  
  
</form>
</body>
</html>