<?php require ('../assets/actions/loginActionAdmin.php')  ?>
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

  <br><br>
<form class="container w-50" id="centre" method="POST">
    <div class="card text-center ">
      <div class="card-header  text-light bg-dark">
           <h1>Connexion</h1>
      </div>
      
      </div>
   </div>
<br>

  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

  <div class="mb-3 ">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
  </div>
  
  <br>
  <div class="row w-50">
        <div class="col">
          <button type="submit" name="validate" class="btn btn-success">Se Connecter</button>
        </div>
        <div class="col ">
           <p> <a href="signupAdmin.php" class="btn btn-primary ">S'inscrire</a> </p>
        </div>
    </div>
  
</form>
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
</body>
</html>