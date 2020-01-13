<?php

include 'View\UserView.php';
include 'Model\UserModel.php';

class UserController extends Controller
{

    public function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    /**
     * Construction de la page d'accueil
     * Liste des informations
     *
     * @return void
     */
    public function start()
    {        
        $listUsers = $this->model->getUsers();        
        $this->view->displayHome($listUsers);
    }


    /**
     * Ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB()
    {       
        $this->model->addDB();
        header('location:index.php?controller=User');
    }

    /**
     * Suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB() {
        $this->model->suppDB();
        header('location:index.php?controller=User');
    }

    /**
     * Affichage du formulaire contenant le détail de 
     * l'info sélectionnée dans la liste
     *
     * @return void
     */
    public function updateForm() {
       $user = $this->model->getUser();
       $this->view->updateForm($user);
    }

    /**
     * Mise à jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB() {
        $this->model->updateDB();
        header('location:index.php?controller=User');
    }
}
