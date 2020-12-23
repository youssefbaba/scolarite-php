<?php
require_once(dirname(__FILE__) . '/classes/tasks-classe.php');


$task = new Task();
$login = (htmlspecialchars($_POST["login"]));
$password = md5((htmlspecialchars($_POST["password"])));
//echo $login ;
//echo $password;
//echo "<pre>" . print_r($task->searchEtudiant($login,$password), true) . "</pre>";

if ($task->searchEtudiant($login, $password)) {
     $task->redirect("etudiants");
      session_start();
      $_SESSION["profil"] = $task->searchEtudiant($login, $password); //  les variable session homa les variables li ymkane liya nkhdam bihom fi jami3 les pages

 } else {
     $task->redirect("login");
//      
//      echo "<pre>" . print_r($_SESSION["profil"], true) . "</pre>";
//      die();
//  }
 }

 ?>