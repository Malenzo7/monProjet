<?php

abstract class Controller
{

    protected $view;
    protected $model;

    /**
     * Gestion de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function addForm()
    {       
        $this->view->addForm();
    }

}
