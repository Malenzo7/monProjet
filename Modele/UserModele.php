<?php

class UserModele extends Modele
{
    /**
     * cherche les infos
     *
     * @return void
     */
    public function getUser()
    {
        $requete = "Select * from users";
        // $requete = "SELECT * FROM `news`";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listNews;
    }
/**
     * formulaire ajout
     *
     * @return void
     */
    public function ajoutForm()
    {
        
        $this->vue->displayForm();
    }
    /**
     * ajouter une infos
     *
     * @return void
     */
    public function ajouter()
    {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $requete = $this->connexion->prepare("INSERT INTO users VALUES (null,:pseudo,:password,:prenom,:nom)");
        $requete->bindParam(":pseudo", $pseudo);
        $requete->bindParam(":password", $password);
        $requete->bindParam(":prenom", $prenom);
        $requete->bindParam(":nom", $nom);
        $result = $requete->execute();

        var_dump($result);
        var_dump($requete->errorInfo());
        var_dump($requete->errorCode());
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprimer()
    {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM `users` WHERE id = :id");
        $requete->bindParam(":id", $id);
        $result = $requete->execute();
        // var_dump($result);
    }
    public function getusers()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM `users` where id = :id");
        $requete->bindParam(":id", $id);
        $result = $requete->execute();
        $infos = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($requete->errorInfo());
        // var_dump($requete->errorCode());
        return $infos;
    }
    /**
     * modifier une infos
     *
     * @return void
     */
    public function modifier()
    {
        var_dump($_POST);
        $id = $_POST['id'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $requete = $this->connexion->prepare("UPDATE users set pseudo =:pseudo, password= :password,prenom= :prenom,nom=:nom where id = :id");
        $requete->bindParam(":id", $id);
        $requete->bindParam(":pseudo", $pseudo);
        $requete->bindParam(":password", $password);
        $requete->bindParam(":prenom", $prenom);
        $requete->bindParam(":nom", $nom);
        $result = $requete->execute();

        // var_dump($result);
        // var_dump($requete->errorInfo());
        // var_dump($requete);
    }
}
