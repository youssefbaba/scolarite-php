<?php

require_once(dirname(__FILE__) . '/classes/tasks-classe.php');


$task = new Task();
$code = $_GET["code"];
$nom = htmlspecialchars($_POST["nom"]);
$email = htmlspecialchars($_POST["email"]);
$nomPhoto = htmlspecialchars($_FILES["photo"]["name"]);
//echo $nomPhoto;

if ($nomPhoto == "") {

    $task->updateEtudiant2($code, $nom, $email);
} else {
    $source = $_FILES["photo"]["tmp_name"];
    $destination = "./images/" . $nomPhoto;
    move_uploaded_file($source, $destination);
    $task->updateEtudiant1($code, $nom, $email, $nomPhoto);
    //echo "HIIIIIIIIHHHHHHHOOOOOO" ;
}
$task->redirect("etudiants");

