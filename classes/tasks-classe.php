<?php
//tasks-classe.php

require_once(dirname(__FILE__) . '/connection-db-classe.php');


class Task extends TestConnection
{

    public function inscription($login, $password)
    {
        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }
            $requeteSql = "INSERT INTO users (login,password) VALUES (:login,:password)";

            $statement = $connectionDb->prepare($requeteSql);

            $statement->execute([
                ":login" => $login,
                ":password" => $password
            ]);

            $statement = null;
            $connectionDb = null;
        } 


    public function getEtudiant()
    {
        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $limit = 3; // size de la liste d'etudiant 
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 0;
        }
        $offset = $page * $limit;
        $stmt = $connectionDb->prepare("SELECT * FROM etudiant LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt = null;
        $connectionDb = null;
        return $data;
    }
    public function nombreEtudiant()
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }
        $requeteSql = "SELECT COUNT(*) AS NB_ET FROM etudiant ";
        $statement = $connectionDb->prepare($requeteSql);
        $statement->execute();
        $ligne = $statement->fetch(PDO::FETCH_ASSOC);
        $statement = null;
        $connectionDb = null;
        return $ligne;
    }
    public function nombreEtudiant1()
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $search = '%' . ($_GET['search']) . '%';
        //Query DB
        $sql = 'SELECT COUNT(*) AS NB_ET FROM etudiant  WHERE nom  LIKE :search ';

        //run query
        $query = $connectionDb->prepare($sql);
        $query->bindValue('search', $search, PDO::PARAM_STR);
        $query->execute();
        //loop through results
        $data = $query->fetch(PDO::FETCH_ASSOC);
        //fermer la  connection     
        $query = null;
        $connectionDb = null;

        return $data;
    }

    public function addEtudiant($nom, $email, $nomPhoto)
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql = "INSERT INTO etudiant (nom,email,photo) VALUES (:nom,:email,:photo)";

        $statement = $connectionDb->prepare($requeteSql);

        $statement->execute([
            ":nom" => $nom,
            ":email" => $email,
            ":photo" => $nomPhoto
        ]);

        $statement = null;
        $connectionDb = null;
    }

    public function deleteEtudiant($code)
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql4 = "DELETE FROM etudiant WHERE code =:code";

        $statement4 = $connectionDb->prepare($requeteSql4);

        $statement4->execute([
            ":code" => $code
        ]);
        //echo " <div  style='padding:20px ;background-color:yellow;' > Data Deleted Successfully </div> ";
        $statement4 = null;
        $connectionDb = null;
    }

    public function getEtudiantByCode($code)
    {
        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql1 = "SELECT * FROM etudiant where code =:code ";

        $statement1 = $connectionDb->prepare($requeteSql1);

        $statement1->execute([
            ":code" => $code
        ]);

        $infoEtudiant = $statement1->fetch(PDO::FETCH_ASSOC);
        $statement1 = null;
        $connectionDb = null;
        if (!$infoEtudiant) {
            echo "data not Found 404 ";
        }
        return $infoEtudiant;
    }

    public function updateEtudiant1($code, $nom, $email, $photo)
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql3 = "UPDATE etudiant SET  nom= :nom, email = :email , photo= :photo  WHERE code = :code";

        $statement3 = $connectionDb->prepare($requeteSql3);

        $statement3->execute([
            ":code" => $code,
            ":nom" => $nom,
            ":email" => $email,
            ":photo" => $photo

        ]);
        //echo " <div  style='padding:20px ;background-color:yellow;' > Data Updated Successfully </div> ";
        $statement3 = null;
        $connectionDb = null;
    }
    public function updateEtudiant2($code, $nom, $email)
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql4 = "UPDATE etudiant SET  nom= :nom, email = :email   WHERE code = :code";

        $statement4 = $connectionDb->prepare($requeteSql4);

        $statement4->execute([
            ":code" => $code,
            ":nom" => $nom,
            ":email" => $email
        ]);
        //echo " <div  style='padding:20px ;background-color:yellow;' > Data Updated Successfully </div> ";
        $statement4 = null;
        $connectionDb = null;
    }
    public function redirect($page) // cette fonction pour la rederection entre les pages 
    {
        header("Location: $page.php ");
    }

    public function searchEtudiant($login, $password)
    {
        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        $requeteSql5 = "SELECT * FROM users where login =:login AND password =:password ";

        $statement5 = $connectionDb->prepare($requeteSql5);

        $statement5->execute([
            ":login" => $login,
            ":password" => $password
        ]);

        $data = $statement5->fetch(PDO::FETCH_ASSOC);
        $statement5 = null;
        $connectionDb = null;
        return $data;
    }

    public function isLoggedin()
    {

        if (isset($_SESSION["profil"])) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {   session_start();
        session_unset();
        session_destroy();
        $this->redirect("login");
        die();
    }
    public function searchEtudiant1($search)
    {

        $connectionDb = $this->connect();

        if ($connectionDb == null) {
            return;
        }

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 0;
        }
        $limit = 3;
        $debut = $page *  $limit;
        $search = '%' . ($_GET['search']) . '%';
        // //Query DB
        $sql = 'SELECT * FROM etudiant WHERE nom LIKE :search  LIMIT :limit OFFSET :debut';

        //run query
        $query = $connectionDb->prepare($sql);
        $query->bindValue('debut', $debut, PDO::PARAM_INT);
        $query->bindValue('limit', $limit, PDO::PARAM_INT);
        $query->bindValue('search', $search, PDO::PARAM_STR);
        $query->execute();
        //loop through results
        $data = $query->fetchall(PDO::FETCH_ASSOC);
        //fermer connection     
        $query = null;
        $connectionDb = null;

        return $data;
    }
}
