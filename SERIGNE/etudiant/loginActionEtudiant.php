<?php
session_start();
require ("../assets/actions/database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["matricule"]) && !empty($_POST["mdp"])  ){
       
        $user_matricule=htmlspecialchars($_POST['matricule']);
        $user_mdp=htmlspecialchars($_POST['mdp']);

        //verifi si matricule exist deja dans le site
        $checkIfmatriculeExist = $bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
        $checkIfmatriculeExist->execute(array($user_matricule));

        if($checkIfmatriculeExist->rowCount() > 0){
            $userInfo = $checkIfmatriculeExist->fetch();
             //verifi si les 2 mot pass sont identik
            if (( $user_mdp === $userInfo['mdp'])) {
                  //authentifier et recuperer les donnees 
                  $_SESSION ['authe'] =true;
                  $_SESSION['id'] = $userInfo['id'];
                  $_SESSION['nom'] = $userInfo['nom'];
                  $_SESSION['prenom'] = $userInfo['prenom'];
                  $_SESSION['adresse'] = $userInfo['adresse'];
                  $_SESSION['numero'] = $userInfo['numero'];
                  $_SESSION['matricule'] = $userInfo['matricule'];
                  $_SESSION['mdp'] = $userInfo['mdp'];
                  
                    //redirige vers page d 'accueil
                      header("Location: espace_etudiant.php");
            }else{
                $errorMsg="Votre mot de passe est incorect ...";
            }

        }else{
            $errorMsg="Votre matricule est incorect ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}