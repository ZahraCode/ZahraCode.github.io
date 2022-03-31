<?php
try {
 $bdd=new PDO ("mysql:host=localhost;dbname=action",'root','');

 
}catch(Exception $e){
  die ("Une erreur  a ete trouvee".$e->getMessage());
}