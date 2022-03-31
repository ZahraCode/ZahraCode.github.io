<?php
session_start();
require ("../../assets/actions/database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["matricule"]) && !empty($_POST["choix"])  ){
       
        $user_matricule=htmlspecialchars($_POST['matricule']);
        //$user_choix=htmlspecialchars($_POST['choix']);

       //recuperation de formation et matiere 
        $choix= explode('-' , $_POST['choix']);
        $formation=$choix[1];
        $matiere=$choix[0];

        //verifi si matricule exist deja dans le site
        $checkIfmatriculeExist = $bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
        $checkIfmatriculeExist->execute(array( $user_matricule));

        

        //verifi si formation et matiere exist deja dans le site
        $checkIfformationExist = $bdd->prepare('SELECT formation,matiere,matricules FROM formation WHERE formation=? AND matiere=? AND matricules=?');
        $checkIfformationExist->execute(array($formation,$matiere,$user_matricule ));

        if($checkIfmatriculeExist->rowCount() > 0){
            $userInfo = $checkIfmatriculeExist->fetch();
             //verifi si les 2 matricules sont identik
            if (( $user_matricule === $userInfo['matricule'])) {

                   if( $checkIfformationExist->rowCount() == 0 ){
                        $userTest = $checkIfformationExist->fetch() ;
                        if (($formation !== $userTest['formation']) AND ($matiere !== $userTest['matiere']) )  {
                            $nom=$userInfo['nom']  ;
                            $prenom=$userInfo['prenom'] ;
                            $insertuser = $bdd->prepare("INSERT INTO formation (formation,matricules,matiere,nom,prenom) VALUES (?,?,?,?,?) ");
                            $insertuser->execute(array($formation,$user_matricule, $matiere,$nom,$prenom));
                             //redirige vers page d 'accueil
                                 header("Location: formation.php");
                            //recuperer les infos de user
                        /*   $getInfouser = $bdd->prepare("SELECT * FROM formation WHERE formation=? AND matricules=? AND matiere=? ");
                            $getInfouser->execute(array($formation,$user_matricule, $matiere));
            
                            $userInfo = $getInfouser->fetch();
                              //authentifier et recuperer les donnees 
                              $_SESSION ['authe'] =true; */
                                
                    
                             
                               
                        }else{
                            $errorMsg="Etudiant deja inscrit a cette  formation  ...";
                        }
                   }else{
                        $errorMsg="Etudiant deja inscrit a cette  formation ...";
                   }
               
             }else{
                $errorMsg="votre matricule est incorect ...";
            }

          }else{
            $errorMsg="Votre matricule est incorect ...";
        }

    }else{
        $errorMsg="Veuillez completez tous les champs ...";
    }
}