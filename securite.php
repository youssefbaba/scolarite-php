<?php

require_once(dirname(__FILE__) . '/classes/tasks-classe.php');
$task = new Task();
if (!$task->isLoggedin()) {
   $task->redirect("login");
    die();
}


?>