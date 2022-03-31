<?php
session_start();
require ("database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["mdp"])  ){
        $admin_nom=htmlspecialchars($_POST['nom']);
        $admin_prenom=htmlspecialchars($_POST['prenom']);
        $admin_email=htmlspecialchars($_POST['email']);
        $admin_mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        //verifi si email exist deja dans le site
        $checkIfmailExist = $bdd->prepare('SELECT email FROM admin WHERE email=?');
        $checkIfmailExist->execute(array($admin_email));

        if($checkIfmailExist->rowCount() == 0){
            //insert admin dans bd
            $insertAdmin = $bdd->prepare("INSERT INTO admin(nom,prenom,email,mdp) VALUES (?,?,?,?) ");
            $insertAdmin->execute(array($admin_nom,$admin_prenom,$admin_email,$admin_mdp));
           
            //recuperer les infos de admin
            $getInfoAdmin = $bdd->prepare("SELECT id,nom,prenom,email FROM admin WHERE nom=? AND prenom=? AND email=?");
            $getInfoAdmin->execute(array($admin_nom,$admin_prenom,$admin_email));
           
            $adminInfo = $getInfoAdmin->fetch();
             //authentifier et recuperer les donnees 
            $_SESSION ['auth'] =true;
            $_SESSION['id'] = $adminInfo['id'];
            $_SESSION['nom'] = $adminInfo['nom'];
            $_SESSION['prenom'] = $adminInfo['prenom'];
            $_SESSION['email'] = $adminInfo['email'];

           //redirige vers page d 'accueil
            header("Location: admin.php");



        }else{
            $errorMsg="L'administrateur existe deja ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}