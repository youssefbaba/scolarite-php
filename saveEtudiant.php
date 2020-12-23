<?php

require_once(dirname(__FILE__) . '/classes/tasks-classe.php');


    $task = new Task();
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    //echo "<pre>". print_r($_FILES,true) ."</pre>";
    $nomPhoto = htmlspecialchars($_FILES["photo"]["name"]);
    //echo $nomPhoto ;
    $source = $_FILES["photo"]["tmp_name"];
    //echo $source ;
    $destination = "./images/".$nomPhoto;
    //echo $destination;
    move_uploaded_file($source, $destination);
    $task->addEtudiant($nom,$email,$nomPhoto);
    $task->redirect("etudiants");
   
?>