<?php

include "Vue/NewsVue.php";
include "Modele/NewsModele.php";

class NewsControleur extends Controleur
{
    public function __construct()
    {
        $this->vue = new NewsVue();
        $this->modele = new NewsModele();
    }

    /**
     * page Accueil liste item
     *
     * @return void
     */
    public function start()
    {

        // récupérer les News de la classe modele
        $listNews = $this->modele->getNews();
        // var_dump($listNews);

        $this->vue->displayHome($listNews);
    }
    /**
     * formulaire ajout
     *
     * @return void
     */
    public function ajoutForm()
    {
        $listCategorie=$this->modele->getCategorie();
        $this->vue->displayForm($listCategorie);
    }
    /**
     * ajouter une info
     *
     * @return void
     */
    public function ajouter()
    {
        $this->modele->ajouter();
        header("location:index.php?controleur=news");
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprForm()
    {
        $this->modele->supprimer();
        header("location:index.php?controleur=news");
    }

    public function modifForm()
    {
        $infos = $this->modele->getInfos();
        $listCategorie=$this->modele->getCategorie();
        $this->vue->modifForm($infos,$listCategorie);
    }
    /**
     * modifier une infos
     *
     * @return void
     */
    public function modifier()
    {
        $this->modele->modifier();
        header("location:index.php?controleur=news");
    }
}
