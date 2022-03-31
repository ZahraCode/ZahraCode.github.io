<?php
session_start();
require ("database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["email"]) && !empty($_POST["mdp"])  ){
       
        $admin_email=htmlspecialchars($_POST['email']);
        $admin_mdp=htmlspecialchars($_POST['mdp']);

        //verifi si email exist deja dans le site
        $checkIfmailExist = $bdd->prepare('SELECT * FROM admin WHERE email=?');
        $checkIfmailExist->execute(array($admin_email));

        if($checkIfmailExist->rowCount() > 0){
            $adminInfo = $checkIfmailExist->fetch();
             //verifi si les 2 mot pass sont identik
            if (password_verify( $admin_mdp ,  $adminInfo['mdp'])) {
                  //authentifier et recuperer les donnees 
            $_SESSION ['auth'] =true;
            $_SESSION['id'] = $adminInfo['id'];
            $_SESSION['nom'] = $adminInfo['nom'];
            $_SESSION['prenom'] = $adminInfo['prenom'];
            $_SESSION['email'] = $adminInfo['email'];
            header('Location: admin.php');

            }else{
                $errorMsg="Votre mot de passe est incorect ...";
            }

        }else{
            $errorMsg="Votre email est incorect ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}