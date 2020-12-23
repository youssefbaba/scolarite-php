<?php

require_once(dirname(__FILE__) . '/classes/tasks-classe.php');
require_once(dirname(__FILE__) . '/roleScolarite.php');


$task = new Task();
$code = $_GET["code"];
$task ->deleteEtudiant($code);
$task ->redirect("etudiants");
