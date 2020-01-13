<?php

abstract class Controleur{


    protected $vue;
    protected $modele;
    
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
     * formulaire de modification
     *
     * @return void
     */
    public function modifForm()
    {
        $infos = $this->modele->getInfos();
        $this->vue->modifForm($infos);
    }
}