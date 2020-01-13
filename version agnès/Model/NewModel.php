<?php

class NewModel extends Model
{

    /**
     * Extraction des items de la table news
     *
     * @return array $listNews
     */
    public function getNews()
    {
        $requete = "SELECT news.*, 
        category.id as id_category, 
        category.name as name_category, 
        category.description as description_category 
        FROM news 
        LEFT JOIN category
        ON news.category = category.id
        ORDER BY news.title";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);

        // $tableau = ['cle1'=>'valeur1', 'cle1'=>'valeur2'];
        // var_dump($tableau);
        return $listNews;
    }

    /**
     * Ajout d'un item dans la table news
     *
     * @return void
     */
    public function addDB()
    {
        // var_dump($_POST);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)) {
            $category=NULL;
        }


        $requete = $this->connexion->prepare("INSERT INTO news	
	        VALUES (NULL, :title, :description, :category)");
        $requete->bindParam(':title', $title);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }

    /**
     * Suppression d'un item dans la table news
     *
     * @return void
     */
    public function suppDB() {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM news	
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
    public function getNew() {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT news.*, 
        category.id as id_category, 
        category.name as name_category, 
        category.description as description_category 
        FROM news 
        LEFT JOIN category
        ON news.category = category.id
	    WHERE news.id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $new = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($new);
        // var_dump($requete->errorInfo());
        return $new;
    }

    /**
     * Mise à jour de l'info dans la table
     *
     * @return void
     */
    public function updateDB() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)) {
            $category=NULL;
        }

        $requete = $this->connexion->prepare("UPDATE news	
	        SET title = :title, description = :description, category = :category
            WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':title', $title);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();
        var_dump($_POST);
        var_dump($result);
        var_dump($requete->errorInfo());
    }
}
