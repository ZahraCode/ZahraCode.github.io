<?php 
  //recupere un enregitrement de note
  require('../../assets/actions/database.php');
  if (isset($_GET['id_note']) and !empty($_GET['id_note'])) {
    $idOfEtudiant = $_GET['id_note'];
    //recuperer l' id 
    $checkIfuserExist = $bdd->prepare('SELECT * FROM notes WHERE id_note=?');
    $checkIfuserExist->execute(array($idOfEtudiant));

    if ($checkIfuserExist->rowCount() > 0) {
        $userInfo = $checkIfuserExist->fetch();
       // $matiere = $userInfo['matiere'];
        $controle = $userInfo['controle'];
        $examen = $userInfo['examen'];
        $tp = $userInfo['tp'];
        //$matricule = $userInfo['matricule'];
        
    }
} 
if(isset($_POST["validate"])){
    if(!empty($_POST["controle"]) && !empty($_POST["examen"]) && !empty($_POST["tp"])){
       
       // $user_matricule=htmlspecialchars($_POST['matricule']);
        //recuperation de la  matiere 
       // $user_choix=htmlspecialchars($_POST['choix']);
        $user_examen=htmlspecialchars($_POST['examen']);
        $user_controle=htmlspecialchars($_POST['controle']);
        $user_tp=htmlspecialchars($_POST['tp']);
       
        // Mis a jour donne
                            
          $insertuser = $bdd->prepare("UPDATE  notes SET  controle=?, examen=?, tp=? WHERE id_note=?");
          $insertuser->execute(array($user_controle,$user_examen,$user_tp,$idOfEtudiant));
          $sucess="Felicitation note mis a jour";
                                                    
            //redirige vers page d 'accueil
                  //header("Location: notes.php");      
                
    }else{
        $errorMsg="Veuillez completez tous les champs ...";
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
          <a class="nav-link "  href="notes.php">Ajouter notes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="voir_note.php"> Voir Notes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="modifier_notes.php"> Modifier notes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../../admin/admin.php"> Acceuil </a>
        </li>
        
        
        
      </ul>
    </div>
  </div>
</nav>
<br>
    <?php
          if($tp){
              ?>
                 <form class="container" id="centre" method="POST">
<div class="card text-center ">
      <div class="card-header bg-red">
           <h1>Modifier Note</h1>
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

     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Controle</label>
        <input type="text" class="form-control" value="<?=$controle?>" name="controle" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>
     
     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Examen</label>
        <input type="text" class="form-control" value="<?=$examen?>" name="examen" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>

     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">TP</label>
        <input type="text" class="form-control" value="<?=$tp?>" name="tp" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>



   <button type="submit" name="validate" class="btn btn-primary">Modifier</button>
    <br><br>
  
              <?php
          }

    ?>


</body>


</html>