<?php

abstract class Vue
{

    protected $page;

    public function __construct()
    {
        $this->page .= file_get_contents("template/head.html");
        $this->page .= file_get_contents("template/nav.html");
        // var_dump($_SESSION);
        if (empty($_SESSION)) {
        $_SESSION["user"]["pseudo"]="visiteur";
        }
    if (isset($_SESSION["user"])) {
       $connexion= "<a class='nav-link text-light' href='index.php?controleur=security&action=logout' title=''>Déconnexion</a>";
       $nav= "<a class='nav-link text-light' href='index.php?controleur=news' title=''>News</a>
        <li class='nav-item'><a class='nav-link text-light' href='index.php?controleur=categorie' title=''>Categorie</a>
        <li class='nav-item'><a class='nav-link text-light' href='index.php?controleur=user' title=''>User</a>";
    }
    else {
        $connexion= "<a class='nav-link text-light' href='index.php?controleur=security&action=FormLogin' title=''>Authentification</a>";
        $nav= "<a class='nav-link text-light' href='index.php?controleur=news' title=''>News</a></li>";
    }
    if (isset($_SESSION["user"]["pseudo"]) && ($_SESSION["user"]["pseudo"]!="admin")) {
        $connexion= "<a class='nav-link text-light' href='index.php?controleur=security&action=logout' title=''>Déconnexion</a>";
        $nav= "<a class='nav-link text-light' href='index.php?controleur=news' title=''>News</a>
        <li class='nav-item'><a class='nav-link text-light' href='index.php?controleur=categorie' title=''>Categorie</a>";
    }
    if (isset($_SESSION["user"]["pseudo"]) && $_SESSION["user"]["pseudo"] =="visiteur") {
        $connexion= "<a class='nav-link text-light' href='index.php?controleur=security&action=FormLogin' title=''>Authentification</a>";
        $nav= "<a class='nav-link text-light' href='index.php?controleur=news' title=''>News</a></li>";
    }
    $this->page = str_replace('{optionConnexion}', $connexion, $this->page);
    $this->page = str_replace('{optionNav}', $nav, $this->page);
    }
    /**
     * affichage du footer
     *
     * @return void
     */
    protected function displayPage()
    {
        $this->page .= file_get_contents("template/footer.html");
        echo $this->page;
    }   
}
