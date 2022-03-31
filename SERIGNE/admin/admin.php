<?php
 
 // s il n 'est pas authentifie diriger vers login.php
 session_start();
 if (!isset($_SESSION['auth'])){
     header('Location: login.php');
 }
 
 
 require ('../etudiant/signupEtudiant.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include "../assets/includes/head.php"  ?>
<body>
<?php include "../assets/includes/navbar.php"  ?>
<br><br><br><br><br><br><br>
<div class="card container text-center w-75">
      <div class="card-header text-light bg-dark">
           <h1>BIENVENU  DANS VOTRE ESPACE DE TRAVAIL <?=$_SESSION['nom']; ?></h1>
      </div>
      
      </div>
   </div>
</body>
</html>





  