<?php

include 'View\SecurityView.php';
include 'Model\SecurityModel.php';

class SecurityController extends Controller
{

    public function __construct()
    {
        $this->view = new SecurityView();
        $this->model = new SecurityModel();
    }

    /**
     * Afficher le formulaire de loggin
     *
     * @return void
     */
    public function formLogin()
    {
        $this->view->addForm();
    }

    /**
     * Afficher le formulaire de loggin
     *
     * @return void
     */
    public function login()
    {
        $user = $this->model->testlogin();
        if ($user != false) {
            header('location:index.php?controller=new');
        } else {
            header('location:index.php?controller=security&action=formLogin');
        }
    }

    /**
     * Afficher le formulaire de loggin
     *
     * @return void
     */
    public function logout()
    {
        $this->model->logout();
        header('location:index.php?controller=new');
    }
}
