<?php

require_once(dirname(__FILE__) . '/template/header.php');
require_once(dirname(__FILE__) . '/classes/tasks-classe.php');

$task = new Task();



// if ($task->isLoggedin()) {
//     $task->redirect("etudiants");
//     die();
// }


?>

<div class=" container  col-md-6 col-xs-12 col-md-offset-3">
    <div class="card ">
        <div class="card-header bg-primary spacer">
            Inscription 
        </div>
        <div class="card-body">
            <form action="saveUser.php" method="POST">
                <div class="form-group">
                    <label class="control-label" for="inputLogin">Login : </label>
                    <input type="text" name="login" id="inpuLogin" class="form-control" placeholder="Login" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPassword">Password : </label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                </div>
                <button type="submit"class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>
</div>

</form>
</div>