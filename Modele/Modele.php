<?php

abstract class Modele{

protected $connexion;
    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "test";

    // const SERVER ="sqlprive-pc2372-001.privatesql.ha.ovh.net";
    // const USER ="cefiidev934";
    // const PASSWORD = "W66sc5xE";
    // const BASE ="cefiidev934";

    public function __construct()
    {
        try {
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            $this->connexion->exec("SET NAMES 'UTF8'");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        // var_dump($this->connexion);
    }


    public function getCategorie()
    {
        $requete = "SELECT * from categorie";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listNews;
    }
}