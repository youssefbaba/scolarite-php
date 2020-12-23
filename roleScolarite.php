<?php
require_once(dirname(__FILE__) . '/securite.php');
//echo "<pre>". print_r($_SESSION["profil"],true) ."</pre>";
if (!($_SESSION["profil"]["role"] == "scolarite")) {

     header("location:$_SERVER[HTTP_REFERER]");
     die();

 }
?>
