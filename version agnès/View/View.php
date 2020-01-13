<?php

abstract class View
{

    protected $page;

    /**
     * Ajout de l'entête de la page
     */
    public function __construct()
    {
        $this->page = file_get_contents('template/head.html');
        $this->page .= file_get_contents('template/nav.html');
        // var_dump($_SESSION);
        if (isset($_SESSION['user'])) {
            $optionConnect = "<a class='nav-link' href='index.php?controller=security&action=logout'>Se déconnecter</a>";
            $optionAuth = '<li class="nav-item">
				<a class="nav-link" href="index.php?controller=category">Categorie</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?controller=user">Utilisateur</a>
			</li>';
        } else {
            $optionConnect = "<a class='nav-link' href='index.php?controller=security&action=formLogin'>S'authentifier</a>";            
            $optionAuth = "";
        }

        
        $this->page = str_replace('{optionConnect}', $optionConnect, $this->page);        
        $this->page = str_replace('{optionAuth}', $optionAuth, $this->page);        
    }

    /**
     * Affichage de l'attribut page
     *
     * @return void
     */
    protected function displayPage()
    {
        $this->page .= file_get_contents('template/footer.html');
        echo $this->page;
    }
}
