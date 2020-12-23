<?php

require_once(dirname(__FILE__) . '/classes/tasks-classe.php');


    $task = new Task();
    $login = htmlspecialchars($_POST["login"]);
    $password = md5(htmlspecialchars($_POST["password"]));
    $task->inscription($login , $password);
    $task->redirect("login");
   
?>