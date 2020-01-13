<?php


class SecurityVue extends Vue
{
    /**
     * affichage de l'accueil
     *
     * @param [array] $listNews
     * @return void
     */
    /**
     * affichage du formulaire de login
     *
     * @return void
     */
    public function displayForm()
    {
        $this->page .= "<h1 class='text-center'>Formulaire de login</h1>";
        $this->page .= file_get_contents("template/formlogin.html");
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
}
