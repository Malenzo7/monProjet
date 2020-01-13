<?php

class CategorieModele extends Modele
{
    /**
     * cherche les infos
     *
     * @return void
     */
    public function getCategorie()
    {
        $requete = "SELECT * from categorie";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listNews;
    }

    /**
     * ajouter une infos
     *
     * @return void
     */
    public function ajouter()
    {
        $nom = $_POST['nom'];
        $description = $_POST['infoD'];
        // var_dump($_POST);
        $requete = $this->connexion->prepare("INSERT INTO categorie VALUES (null,:nom,:description)");
        $requete->bindParam(":nom", $nom);
        $requete->bindParam(":description", $description);
        $result = $requete->execute();

        // var_dump($result);
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprimer()
    {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM `categorie` WHERE id = :id");
        $requete->bindParam(":id", $id);
        $result = $requete->execute();
        // var_dump($result);
    }
    public function getInfos()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * from categorie where id = :id");
        $requete->bindParam(":id", $id);
        $result = $requete->execute();
        $infos = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($infos);
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
        $nom = $_POST['nom'];
        $description = $_POST['infoD'];

        $requete = $this->connexion->prepare("UPDATE categorie set nom =:nom, description= :description where id = :id");
        $requete->bindParam(":id", $id);
        $requete->bindParam(":nom", $nom);
        $requete->bindParam(":description", $description);
        $result = $requete->execute();

        // var_dump($result);
        // var_dump($requete->errorInfo());
        // var_dump($requete);
    }
}
