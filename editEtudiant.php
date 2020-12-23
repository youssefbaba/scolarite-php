<?php

require_once(dirname(__FILE__) . '/template/header.php');
require_once(dirname(__FILE__) . '/classes/tasks-classe.php');
require_once(dirname(__FILE__) . '/roleScolarite.php');

$task = new Task();
$code = $_GET["code"];
$etudiant = $task->getEtudiantByCode($code);
//echo "<pre>". print_r($etudiant,true) ."</pre>";

?>

<div class=" container  col-md-6 col-xs-12 col-md-offset-3">
    <div class="card ">
        <div class="card-header bg-primary spacer">
            Edit Un Etudiant
        </div>
        <div class="card-body">
            <form action="updateEtudiant.php?code=<?php echo $etudiant["code"]; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label" for="inputCode">Code :</label>
                    <input type="text" name="code" value="<?php echo $etudiant["code"]; ?>" id="inputCode" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputNom">Nom : </label>
                    <input type="text" name="nom" value="<?php echo $etudiant["nom"]; ?>" id="inputNom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputEmail">Email : </label>
                    <input type="email" name="email" value="<?php echo $etudiant["email"]   ?>" class="form-control" id="inputEmail" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputFile">Photo :</label>
                    <input type="file" name="photo" class="form-control-file" id="inputFile">
                    <img src="images/<?php echo $etudiant["photo"]; ?>" width="100" height="100" />
                </div>
                <button type="submit"  class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

<?php
require_once("./template/footer.php");
?>