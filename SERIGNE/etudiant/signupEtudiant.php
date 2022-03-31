<?php
//session_start();

try {
 $bdd=new PDO ("mysql:host=localhost;dbname=action",'root','');
 
}catch(Exception $e){
  die ("Une erreur  a ete trouvee".$e->getMessage());
}

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
            $insertuser = $bdd->prepare("INSERT INTO etudiant(matricule,nom,prenom,adresse,numero,mdp) VALUES (?,?,?,?,?,?) ");
            $insertuser->execute(array($user_matricule,$user_nom,$user_prenom,$user_adresse,$user_numero, $user_mdp));
           
            //recuperer les infos de user
            $getInfouser = $bdd->prepare("SELECT * FROM etudiant WHERE matricule=? AND nom=? AND prenom=? AND adresse=? AND numero=?");
            $getInfouser->execute(array($user_matricule,$user_nom,$user_prenom,$user_adresse,$user_numero));
           
            $userInfo = $getInfouser->fetch();
             //authentifier et recuperer les donnees 
            $_SESSION ['au'] =true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['nom'] = $userInfo['nom'];
            $_SESSION['prenom'] = $userInfo['prenom'];
            $_SESSION['adresse'] = $userInfo['adresse'];
            $_SESSION['numero'] = $userInfo['numero'];
            $_SESSION['matricule'] = $userInfo['matricule'];
             
             $sucess="Felicitation etudiant inscrit..";
           //redirige vers page d 'accueil
            //header("Location: etudiant.php");
            

        }else{
            $errorMsg="L'etudiant existe deja sur le site ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}