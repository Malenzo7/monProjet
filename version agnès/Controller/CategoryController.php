<?php

include 'View\CategoryView.php';
include 'Model\CategoryModel.php';

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }

    /**
     * Construction de la page d'accueil
     * Liste des informations
     *
     * @return void
     */
    public function start()
    {        
        $listNews = $this->model->getCategories();        
        $this->view->displayHome($listNews);
    }


    /**
     * Ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB()
    {       
        $this->model->addDB();
        header('location:index.php?controller=category');
    }

    /**
     * Suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB() {
        $this->model->suppDB();
        header('location:index.php?controller=category');
    }

    /**
     * Affichage du formulaire contenant le détail de 
     * l'info sélectionnée dans la liste
     *
     * @return void
     */
    public function updateForm() {
       $new = $this->model->getCategory();
       $this->view->updateForm($new);
    }

    /**
     * Mise à jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB() {
        $this->model->updateDB();
        header('location:index.php?controller=category');
    }
}
