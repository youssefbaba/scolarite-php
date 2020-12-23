<?php
//connection-db-classe.php

require_once(dirname(__FILE__) . '/../config/index.php');

class TestConnection {

    protected function connect() {

        try {
            
            return new PDO(CONFIG['db'], CONFIG['db_user'], CONFIG['db_password']);

        } catch (PDOException $e) {
            
            $msg  = "ERREUR PDO dans " . $e -> getMessage();
            return $msg ;
        }

    }

}

?>