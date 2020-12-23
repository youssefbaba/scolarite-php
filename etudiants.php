<?php
//etudiants.php
require_once(dirname(__FILE__) . '/template/header.php');
require_once(dirname(__FILE__) . '/classes/tasks-classe.php');
require_once(dirname(__FILE__) . '/securite.php');

$task = new Task();
$motCle ="";
$size=3;
$page =0 ;

if(isset($_GET["page"])){
  $page = $_GET["page"];
}


if (isset($_GET["search"])) {
  $motCle = $_GET["search"];
  $listEtudiant1 = $task->searchEtudiant1($motCle);
  $ligne = $task->nombreEtudiant1();

}else {
  $listEtudiant1 = $task->getEtudiant();
  $ligne = $task->nombreEtudiant();
 
}

$nombreEtudiant = $ligne['NB_ET'];
if (($nombreEtudiant % $size) == 0) {
  $nombrePage = floor($nombreEtudiant /  $size) ;
}else{
  $nombrePage = floor($nombreEtudiant / $size) + 1; 
}

//echo "<pre>". print_r($listEtudiant1,true) ."</pre>";

?>
<div class="col -md-6 col-xs-12 marge">
  <form class="form-inline" method="get" action="etudiants.php">

    <div class="form-group mx-sm-6 mb-2">
      <input type="text" value="<?php echo $motCle; ?>" name="search" class="form-control" placeholder="search ...">
    </div>
    <button type="submit" class="btn btn-primary mb-2">CHERCHER</button>
  </form>

</div>
    <?php //echo "<pre>". print_r($ligne,true) ."</pre>"; ?>
</div>

<div class="col -md-6 col-xs-12">
  <div class="card ">
    <div class="card-header bg-primary spacer">
      La Liste Des Etudiants Contient <?php echo  $nombreEtudiant ; ?> Etudiants .
    </div>
    <div class="card-body">
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">CodeEtudiant</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>

          </tr>
        </thead>

        <tbody>
          <?php foreach ($listEtudiant1 as $etudiant) {  ?>
            <tr>

              <td scope="row"><?php echo $etudiant["code"]; ?></td>
              <td><?php echo $etudiant["nom"]; ?></td>
              <td><?php echo $etudiant["email"]; ?></td>
              <td> <img src="images/<?php echo $etudiant["photo"]; ?>" width="100" height="100" /></td>
              <td><a href="editEtudiant.php?code=<?php echo $etudiant["code"]; ?>" class='btn btn-warning'>Edit</a></td>
              <td><a onclick=" return confirm('Are you sure to delete ?') " href="deleteEtudiant.php?code=<?php echo $etudiant["code"]; ?>" class='btn btn-danger' >Delete</a></td>
            <?php } ?>

            </tr>

        </tbody>

      </table>
    </div>
    <div>
      <ul class="nav nav-pills" >
        <?php for ($i = 0; $i < $nombrePage  ; $i++) { ?>
        <li  class="padin">
          <a class="nav-link <?php echo(($i == $page)?'active':''); ?>"  href="etudiants.php?page=<?php echo $i; ?>&search=<?php echo $motCle; ?>">Page <?php echo $i; ?></a>
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
<?php
require_once(dirname(__FILE__) . '/template/footer.php');
?>

</html>