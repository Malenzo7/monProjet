<?php

class UserModel extends Model
{
    
    /**
     * Extraction des utilisateurs
     *
     * @return void
     */
    public function getUsers() {
        $requete = $this->connexion->prepare("SELECT * FROM user");
        $result = $requete->execute();
        $users = $requete->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($new);
        return $users;
    }

    /**
     * Ajout d'un item dans la table User
     *
     * @return void
     */
    public function addDB()
    {        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $requete = $this->connexion->prepare("INSERT INTO user	
	        VALUES (NULL, :username, :password, :firstname, :lastname)");
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':firstname', $firstname);
        $requete->bindParam(':lastname', $lastname);
        $result = $requete->execute();
        // var_dump($result);
    }

    /**
     * Suppression d'un item dans la table User
     *
     * @return void
     */
    public function suppDB() {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM user	
	        WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        //var_dump($result);
    }

    /**
     * Extraction d'une information de la table
     *
     * @return void
     */
    public function getUser() {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * 
            FROM user	
	        WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        //var_dump($new);
        return $user;
    }

    /**
     * Mise à jour de l'info dans la table
     *
     * @return void
     */
    public function updateDB() {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $requete = $this->connexion->prepare("UPDATE user	
	        SET username = :username, password = :password,
            firstname = :firstname, lastname = :lastname
            WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':firstname', $firstname);
        $requete->bindParam(':lastname', $lastname);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }
}
