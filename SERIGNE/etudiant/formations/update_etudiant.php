<?php
//recupere un seul enregitrement
require('../../assets/actions/database.php');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $idOfEtudiant = $_GET['id'];
    //recuperer l' id 
    $checkIfuserExist = $bdd->prepare('SELECT * FROM etudiant WHERE id=?');
    $checkIfuserExist->execute(array($idOfEtudiant));

    if ($checkIfuserExist->rowCount() > 0) {
        $userInfo = $checkIfuserExist->fetch();
        $nom = $userInfo['nom'];
        $prenom = $userInfo['prenom'];
        $adresse = $userInfo['adresse'];
        $numero = $userInfo['numero'];
        $matricule = $userInfo['matricule'];
        $password = $userInfo['mdp'];
    }
} 
//Mis a jour l'enregistrement en 
if(isset($_POST["validate"])){
    if(!empty($_POST["matricule"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["adresse"]) && !empty($_POST["numero"]) &&!empty($_POST["mdp"]) ){
        $user_matricule=htmlspecialchars($_POST['matricule']);
        $user_nom=htmlspecialchars($_POST['nom']);
        $user_prenom=htmlspecialchars($_POST['prenom']);
        $user_adresse=htmlspecialchars($_POST['adresse']);
        $user_numero=htmlspecialchars($_POST['numero']);
        $user_mdp=htmlspecialchars($_POST['mdp']);
        
        //verifi si matricule exist deja dans le site
        $checkIfmatriculeExist = $bdd->prepare('SELECT matricule FROM etudiant WHERE matricule=?');
        $checkIfmatriculeExist->execute(array($user_matricule));

        if($checkIfmatriculeExist->rowCount() == 0){
            //insert user dans bd
            $insertuser = $bdd->prepare("UPDATE etudiant set matricule =?,nom=?,prenom=?,adresse=?,numero=?,mdp=? WHERE id=? ");
            $insertuser->execute(array($user_matricule,$user_nom,$user_prenom,$user_adresse,$user_numero, $user_mdp,$idOfEtudiant));
           
            $sucess =" Felicitation info mis a jour";
            
           //redirige vers page d 'accueil
           // header("Location: liste_etudiant_inscrit.php");
            

        }else{
            $errorMsg="Un etudiant a deja cette matricule ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "../../assets/includes/head.php"  ?>
<style>
    #centre {
        margin: auto;
        width: 500px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Etudiants</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="etudiant.php"> Inscrire un etudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="liste_etudiant_inscrit.php"> Etudiants inscrits </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="modifier_info_etudiant.php"> Modifier infos etudiant </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../../admin/admin.php">Acceuil </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container w-50">
        <div class="card text-center ">
            <div class="card-header text-light bg-dark">
                <h1>Modifier un etudiant</h1>
            </div>

        </div>
    </div>
    <br>

    <?php
    if ($password) {
    ?>
        <form class="container" id="centre" method="POST">

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
            <div class="row">
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputEmail1" class="form-label">Prenom</label>
                        <input type="text" class="form-control" value=<?= $prenom ?> name="prenom" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                        <input type="text" class="form-control" value=<?= $nom ?> name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputEmail1" class="form-label">matricule</label>
                        <input type="text" class="form-control" value=<?= $matricule ?> name="matricule" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputPassword1" class="form-label">Telephone</label>
                        <input type="number" class="form-control" value=<?= $numero ?> name="numero" id="exampleInputPassword1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputEmail1" class="form-label">Adresse </label>
                        <input type="text" class="form-control" value=<?= $adresse ?> name="adresse" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-1 w-100">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" value=<?= $password ?> name="mdp" id="exampleInputPassword1">
                    </div>
                </div>
            </div>



            <br>
            <button type="submit" name="validate" class="btn btn-primary mb-3 w-25">Modifier</button>


        </form>
    <?php
    }
    ?>


</body>

</html>