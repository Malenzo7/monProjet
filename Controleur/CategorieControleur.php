<?php

include "Vue/CategorieVue.php";
include "Modele/CategorieModele.php";

class CategorieControleur extends Controleur
{
    public function __construct()
    {
        $this->vue = new CategorieVue();
        $this->modele = new CategorieModele();
    }

    /**
     * page Accueil liste item
     *
     * @return void
     */
    public function start()
    {

        // récupérer les News de la classe modele
        $listNews = $this->modele->getCategorie();
        // var_dump($listNews);

        $this->vue->displayHome($listNews);
    }
    /**
     * ajouter une info
     *
     * @return void
     */
    public function ajouter()
    {
        $this->modele->ajouter();
        header("location:index.php?controleur=categorie");
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprForm()
    {
        $this->modele->supprimer();
        header("location:index.php?controleur=categorie");
    }

    /**
     * formulaire de modification
     *
     * @return void
     */
    public function modifForm()
    {
        $infos = $this->modele->getInfos();
        $this->vue->modifForm($infos);
    }
    /**
     * modifier une infos
     *
     * @return void
     */
    public function modifier()
    {
        $this->modele->modifier();
        header("location:index.php?controleur=categorie");
    }
}
