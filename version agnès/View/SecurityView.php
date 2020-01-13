<?php

class SecurityView extends View
{

    /**
     * Affichage du formulaire d'authentification
     *
     * @return void
     */
    public function addForm()
    {
        $this->page .= file_get_contents('template/formLogin.html');  
        $this->displayPage();
    }

    

}
