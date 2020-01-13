<?php

class CategoryView extends View
{

    /**
     * Affichage de la page d'accueil
     * Liste des infos
     *
     * @param array $listCategories
     * @return void
     */
    public function displayHome($listCategories)
    {
        // var_dump($listCategories);
        $this->page .= "<h1 class='text-center'>Liste des catégories</h1>";
        $this->page .= "<p><a href='index.php?controller=category&action=addForm' class='btn btn-primary'>Ajouter</a></p>";
        $this->page .= "<table class='table'>";
        foreach ($listCategories as $new) {
            $this->page .= "<tr>"
                . "<td>" . $new['name'] . "</td>"
                . "<td>" . $new['description'] . "</td>"
                . "<td><a href='index.php?controller=category&action=updateForm&id="
                . $new['id']
                . "' class='btn btn-primary' title='Mise à jour'><i class='fas fa-pen'></i></a>"
                . "</td>"
                . "<td><a href='index.php?controller=category&action=suppDB&id="
                . $new['id']
                . "' class='btn btn-danger' title='supprimer'><i class='fas fa-trash'></i></a>"
                . "</td>"
                . "</tr>";
        }
        $this->page .= "</table>";
        $this->displayPage();
    }

    /**
     * Affichage du formulaire de saisie d'une nouvelle info
     *
     * @return void
     */
    public function addForm()
    {
        $this->page .= "<h1>Ajout d'une catégorie</h1>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}', 'addDB', $this->page);
        $this->page = str_replace('{id}', '', $this->page);
        $this->page = str_replace('{name}', '', $this->page);
        $this->page = str_replace('{description}', '', $this->page);

        $this->displayPage();
    }

    /**
     * Affichage du formalaire contenant l'info à modifier
     *
     * @param array $new
     * @return void
     */
    public function updateForm($new)
    {
        //var_dump($new);
        $this->page .= "<h1>Modification de l'information</h1>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $new['id'], $this->page);
        $this->page = str_replace('{name}', $new['name'], $this->page);
        $this->page = str_replace('{description}', $new['description'], $this->page);
        $this->displayPage();
    }

}
