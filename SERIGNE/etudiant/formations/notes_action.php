<?php
session_start();
require ("../../assets/actions/database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["matricule"]) && !empty($_POST["choix"]) && !empty($_POST["controle"]) && !empty($_POST["examen"]) && !empty($_POST["tp"])){
       
        $user_matricule=htmlspecialchars($_POST['matricule']);
        //recuperation de la  matiere 
        $user_choix=htmlspecialchars($_POST['choix']);
        $user_examen=htmlspecialchars($_POST['examen']);
        $user_controle=htmlspecialchars($_POST['controle']);
        $user_tp=htmlspecialchars($_POST['tp']);

      

        //verifi si matricule exist deja dans le site
        $checkIfmatriculeExist = $bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
        $checkIfmatriculeExist->execute(array( $user_matricule));
        $userInfo = $checkIfmatriculeExist->fetch();

        //verifi si  * exist deja dans le tabele note
        $checkIfformationExist = $bdd->prepare('SELECT matiere,matricule FROM notes WHERE matiere=?  AND matricule=?');
        $checkIfformationExist->execute(array($user_choix,$user_matricule));
        $userTest = $checkIfformationExist->fetch();


        if($checkIfmatriculeExist->rowCount() > 0){
           
             //verifi si les 2 matricules sont identik
            if (( $user_matricule === $userInfo['matricule'])) {

                   if( $checkIfformationExist->rowCount() == 0 ){
                        
                        if (($user_choix ?? []!== $userTest['matiere']   )  )  {
                            if(($user_matricule ?? [] !== $userTest['matricule'] )){
                                $insertuser = $bdd->prepare("INSERT INTO notes (matricule,matiere,controle,examen,tp) VALUES (?,?,?,?,?)");
                                $insertuser->execute(array( $user_matricule,$user_choix,$user_controle,$user_examen,$user_tp));
                
                                                                //recuperer les infos de user
                               $getInfouser = $bdd->prepare("SELECT * FROM notes WHERE matricule=? AND matiere=? AND controle=? AND examen=? AND tp=?");
                                $getInfouser->execute(array($user_matricule,$user_choix,$user_controle,$user_examen,$user_tp) );
                
                                $userInfo = $getInfouser->fetch();
                                  //authentifier et recuperer les donnees 
                                  $_SESSION ['authes'] =true;
                                  
                                  $_SESSION['note_tp'] = $userInfo['tp']; 
                                  $_SESSION['matiere'] = $userInfo['matiere']; 
                                  $_SESSION['examen'] = $userInfo['examen']; 
                                  $_SESSION['id_note'] = $userInfo['id_note']; 
                                  $succes="Felicitations....";
                                     // header("Location: notes.php");
                            }
                           
                           
                        }else{
                            $errorMsg="Cette etudiant a deja une note dans cette matiere ...";
                        }
                   }else{
                        $errorMsg="Cette etudiant a deja une note dans cette matiere ...";
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
