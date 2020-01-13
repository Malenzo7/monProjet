<?php

class NewsModele extends Modele
{
    /**
     * cherche les infos
     *
     * @return void
     */
    public function getNews()
    {
        $requete = "SELECT *,news.description AS Newsdescription ,news.id as newsid FROM `news` JOIN `categorie` ON news.categorie = categorie.id order by newsid";
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
        $titre = $_POST['infoT'];
        $description = $_POST['infoD'];
        $categorie = $_POST['infoC'];

        $requete = $this->connexion->prepare("INSERT INTO news VALUES (null,:titre,:description,:categorie)");
        $requete->bindParam(":titre", $titre);
        $requete->bindParam(":description", $description);
        $requete->bindParam(":categorie", $categorie);
        $result = $requete->execute();

        // var_dump($result);
        // var_dump($requete->errorInfo());
        // var_dump($requete->errorCode());
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprimer()
    {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM `news` WHERE id = :id");
        $requete->bindParam(":id", $id);
        $result = $requete->execute();
        // var_dump($result);
    }
    public function getInfos()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT *,news.description AS Newsdescription ,news.id as newsid FROM `news` JOIN `categorie` ON news.categorie = categorie.id where news.id = :id");
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
        $id = $_POST['id'];
        $titre = $_POST['infoT'];
        $description = $_POST['infoD'];
        $categorie = $_POST['infoC'];

        $requete = $this->connexion->prepare("UPDATE news set titre =:titre, description= :description,categorie= :categorie where id = :id");
        $requete->bindParam(":id", $id);
        $requete->bindParam(":titre", $titre);
        $requete->bindParam(":description", $description);
        $requete->bindParam(":categorie", $categorie);
        $result = $requete->execute();

        // var_dump($result);
        // var_dump($requete->errorInfo());
        // var_dump($requete);
    }
}
