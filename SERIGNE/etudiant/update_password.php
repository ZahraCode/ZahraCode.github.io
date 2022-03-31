<?php
session_start();
  require('../assets/actions/database.php');
  if (isset($_POST['validate'])){
    if(!empty($_POST["new-mdp"]) && !empty($_POST["mdp"]) && !empty($_POST["con-mdp"]) ){
        $_SESSION['mdp'];
        $_SESSION['matricule'];
        $user_mdp=htmlspecialchars($_POST['mdp']);
        $user_new_mdp=htmlspecialchars($_POST['new-mdp']);
        $user_con_mdp=htmlspecialchars($_POST['con-mdp']);

        //recuper mot de pass dans le site
        $checkIfPasswordExist = $bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
        $checkIfPasswordExist->execute(array($_SESSION['matricule']));
        $userInfo = $checkIfPasswordExist->fetch();

        if($user_mdp == $userInfo ['mdp'] ){
            if($user_mdp !== $user_new_mdp){
                if($user_new_mdp == $user_con_mdp ){
                    //Mis a jour password
                    $insertuser = $bdd->prepare("UPDATE  etudiant SET mdp=? WHERE matricule=?");
                    $insertuser->execute(array( $user_new_mdp,$_SESSION['matricule'] ));

                    $sucess="Felicitation password update....";
                }else{
                    $errorMsg="Veuillez entrer password confirm...";
                }

            }else{
                $errorMsg="Veuillez entrer le new password...";
            }

        }else{
            $errorMsg="Veuillez Entrez le password actuel...";
        }


    }else{
        $errorMsg="Veuillez completez tous les champs....";
    }
  }
 

?>

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

  
<form class="container" id="centre" method="POST">
<div class="card text-center ">
      <div class="card-header text-light bg-dark">
           <h1>Modification Password</h1>
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
          elseif (isset($sucess)) {
            ?>
                <div class="alert alert-success" role="alert"> 
                     <?=$sucess?>  
                </div> 
            <?php
          }
        ?>
          
         
    
<br>

     
  <div class="mb-1 w-100">
    <label for="exampleInputPassword1" class="form-label">Actuel Password</label>
    <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
  </div>
  <div class="mb-1 w-100">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" class="form-control" name="new-mdp" id="exampleInputPassword1">
  </div>
  <div class="mb-1 w-100">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="con-mdp" id="exampleInputPassword1">
  </div>
    <br>
  <button  type="submit" name="validate" class="btn btn-primary mb-3 w-25">Modifer</button>
    

</form>
</body>
</html>