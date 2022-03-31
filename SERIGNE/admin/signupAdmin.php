<?php 
     // s il n 'est pas authentifie diriger vers login.php

  require '../assets/actions/signupActionAdmin.php'

?>
<!DOCTYPE html>
<html lang="en">
 <?php include "../assets/includes/head.php"  ?>
<body>
  <br><br>
<form class="container w-50" method="POST">
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
  <div class="card text-center ">
      <div class="card-header  text-light bg-dark">
           <h1>INSCRIPTION</h1>
      </div>
      
      </div>
   </div>
<br>
  <br>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control"  name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control"  name="prenom" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
  </div>
    <div class="row w-50">
        <div class="col">
          <button type="submit" name="validate" class="btn btn-primary">S'inscrire</button>
        </div>
        <div class="col ">
           <p> <a href="login.php" class="btn btn-success">Se Connecter</a> </p>
        </div>
    </div>
  
    

 
</form>
</body>
</html>