<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Gestion Scolarite </title>
  <style>
    .spacer {
      margin-top: 80px;
    }
    .marge {
      margin-top: 80px;
    }
     .padin{
      padding-left:5px;
      padding-right:5px;
      
    }
  </style>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-6 mb-md-6">

            <li class="nav-item active">
              <a class="nav-link"  href="etudiants.php">Etudiants</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="saisieEtudiant.php">Saisie</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link"  href="logout.php">Logout [<?php echo ((isset($_SESSION["profil"])) ? ($_SESSION["profil"]["login"]) : "") ?>]</a>
            </li>

          </ul>
      

        </div>
      </div>
      </div>
    </nav>
  </header>