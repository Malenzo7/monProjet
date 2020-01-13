<?php

abstract class Model
{
    // déclaration en local
    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "test";

    protected $connexion;

    /**
     * Mise en place de la connexion vers la BDD
     * à partir des constantes de la classe Model
     */
    public function __construct()
    {
        // connexion
        try {
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname="
                . self::BASE, self::USER, self::PASSWORD);
            $this->connexion->exec("SET NAMES 'UTF8'");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Extraction des items de la table Category
     *
     * @return array $listCategory
     */
    public function getCategories()
    {
        $requete = "SELECT * FROM category";
        $result = $this->connexion->query($requete);
        $listCategory = $result->fetchAll(PDO::FETCH_ASSOC);

        return $listCategory;
    }

}
