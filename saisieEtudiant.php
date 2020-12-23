<?php
require_once(dirname(__FILE__) . '/template/header.php');
require_once(dirname(__FILE__) . '/roleScolarite.php');

?>


<div class=" container  col-md-6 col-xs-12 col-md-offset-3">
    <div class="card ">
        <div class="card-header bg-primary spacer">
            Saisir Un Etudiant
        </div>
        <div class="card-body">
            <form action="saveEtudiant.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label" for="inputNom">Nom : </label>
                    <input type="text" name="nom" id="inputNom" class="form-control" placeholder="Enter Votre Nom" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputEmail">Addresse Email : </label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter Votre Email" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputFile">Importer Votre Image :</label>
                    <input type="file" name="photo" class="form-control" id="inputFile">
                </div>
                <div>
                <button type="submit"  class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>