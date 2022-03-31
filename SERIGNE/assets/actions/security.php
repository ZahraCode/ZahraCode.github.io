<?php
// s il n 'est pas authentifie diriger vers login.php
session_start();
if (!isset($_SESSION['auth'])){
    header('Location: login.php');
}

?>