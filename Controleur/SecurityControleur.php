<?php

include "Vue/SecurityVue.php";
include "Modele/SecurityModele.php";

class SecurityControleur extends Controleur
{
    public function __construct()
    {
        $this->vue = new SecurityVue();
        $this->modele = new SecurityModele();
    }

    /**
     * Affichage formulaire de login
     *
     * @return void
     */
    /**
     * formulaire ajout
     *
     * @return void
     */
    public function Formlogin()
    {
        // $listUser=$this->modele->getUser();
        $this->vue->displayForm();
    }
    /**
     * traitement login
     *
     * @return void
     */
    public function login()
    {
        // $listUser=$this->modele->getUser();
        $user=$this->modele->getLogin();
        // var_dump($user);
        if ($user != false) {
            header("location:index.php?controleur=news");
        }
        else {
            header("location:index.php?controleur=security&action=Formlogin");
        }
    }
    public function logout(){
        $this->modele->logout();
        header("location:index.php?controleur=news");
    }
}
