<?php

include "Vue/UserVue.php";
include "Modele/UserModele.php";

class UserControleur extends Controleur
{
    public function __construct()
    {
        $this->vue = new UserVue();
        $this->modele = new UserModele();
    }

    /**
     * page Accueil liste item
     *
     * @return void
     */
    public function start()
    {

        // récupérer les News de la classe modele
        $listUser = $this->modele->getUser();
        // var_dump($listNews);

        $this->vue->displayHome($listUser);
    }
    /**
     * formulaire ajout
     *
     * @return void
     */
    public function ajoutForm()
    {
        // $listUser=$this->modele->getUser();
        $this->vue->displayForm();
    }
    /**
     * ajouter une info
     *
     * @return void
     */
    public function ajouter()
    {
        $this->modele->ajouter();
        header("location:index.php?controleur=user");
    }

    /**
     * supprimer une infos
     *
     * @return void
     */
    public function supprForm()
    {
        $this->modele->supprimer();
        header("location:index.php?controleur=user");
    }

    public function modifForm()
    {
        $user = $this->modele->getusers();
        // $listCategorie=$this->modele->getCategorie();
        $this->vue->modifForm($user);
    }
    /**
     * modifier une infos
     *
     * @return void
     */
    public function modifier()
    {
        $this->modele->modifier();
        header("location:index.php?controleur=user");
    }
}
