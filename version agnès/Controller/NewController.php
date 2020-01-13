<?php

include 'View\NewView.php';
include 'Model\NewModel.php';

class NewController extends Controller
{

    public function __construct()
    {
        $this->view = new NewView();
        $this->model = new NewModel();
    }

    /**
     * Construction de la page d'accueil
     * Liste des informations
     *
     * @return void
     */
    public function start()
    {
        $listNews = $this->model->getNews();
        $this->view->displayHome($listNews);
    }

    /**
     * Gestion de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function addForm()
    {
        $listCategories = $this->model->getCategories();
        $this->view->addForm($listCategories);
    }

    /**
     * Ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB()
    {
        $this->model->addDB();
        header('location:index.php?controller=new');
    }

    /**
     * Suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB()
    {
        $this->model->suppDB();
        header('location:index.php?controller=new');
    }

    /**
     * Affichage de l'info 
     *
     * @return void
     */
    public function show()
    {
        $new = $this->model->getNew();
        $this->view->show($new);
    }

    /**
     * Affichage du formulaire contenant le détail de 
     * l'info sélectionnée dans la liste
     *
     * @return void
     */
    public function updateForm()
    {
        $listCategories = $this->model->getCategories();
        $new = $this->model->getNew();
        $this->view->updateForm($new, $listCategories);
    }

    /**
     * Mise à jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB()
    {
        $this->model->updateDB();
        header('location:index.php?controller=new');
    }
}
