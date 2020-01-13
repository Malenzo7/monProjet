<?php

class NewView extends View
{

    /**
     * Affichage de la page d'accueil
     * Liste des infos
     *
     * @param array $listNews
     * @return void
     */
    public function displayHome($listNews)
    {
        // var_dump($listNews);
        $this->page .= "<h1 class='text-center'>Les dernières news</h1>";
        if (isset($_SESSION['user'])) {
            $this->page .= "<p><a href='index.php?controller=new&action=addForm' class='btn btn-primary'>Ajouter</a></p>";
        }
        $this->page .= "<table class='table'>";
        $this->page .= "<tr>";
        $this->page .= "<th>Info</td>";
        $this->page .= "<th>Categorie</td>";
        $this->page .= "<th>Voir</td>";
        $this->page .= "<th></td>";
        $this->page .= "<th></td>";
        $this->page .= "</tr>";
        foreach ($listNews as $new) {
            $lienUpdate = "";
            $lienDelete = "";
            if (isset($_SESSION['user'])) {
                $lienUpdate = "<a href='index.php?controller=new&action=updateForm&id="
                    . $new['id']
                    . "' class='btn btn-primary' title='Mise à jour'><i class='fas fa-pen'></i></a>";
                $lienDelete = "<a href='index.php?controller=new&action=suppDB&id="
                    . $new['id']
                    . "' class='btn btn-danger' title='supprimer'><i class='fas fa-trash'></i></a>";
            }
            $description = (strlen($new['description'])>50)?substr($new['description'],0,150)."[...]":$new['description'];
            $this->page .= "<tr>"
                . "<td><strong>" . $new['title'] . "</strong>"
                . "<br>" . $description . "</td>"
                . "<td>" . $new['name_category'] . "</td>"
                . "<td>"
                . "<a href='index.php?controller=new&action=show&id="
                . $new['id']
                . "' class='btn btn-success' title='supprimer'><i class='fas fa-eye'></i></a>"
                . "</a>"
                . "<td>" . $lienUpdate
                . "</td>"
                . "<td>" . $lienDelete
                . "</td>"
                . "</tr>";
        }
        $this->page .= "</table>";
        $this->displayPage();
    }

    /**
     * Affichage de l'info
     *
     * @param array $new
     * @return void
     */
    public function show($new)
    {
         $this->page .= '<div class="card text-center mt-5">
                            <div class="card-header">Détail de l\'info</div>
                            <div class="card-body">
                            <h5 class="card-title">'.$new['title'].'</h5>
                            <p class="card-text text-justify">'.nl2br($new['description']).'</p>
                            <a href="index.php" class="btn btn-primary">Retour à la liste</a>
                            </div>
                            <div class="card-footer text-muted">
                            </div>
                        </div>';

        $this->displayPage();
    }

    /**
     * Affichage du formulaire de saisie d'une nouvelle info
     *
     * @return void
     */
    public function addForm($listCategories)
    {
        // var_dump($listCategories);
        $this->page .= "J'ajoute une info via un formulaire";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}', 'addDB', $this->page);
        $this->page = str_replace('{id}', '', $this->page);
        $this->page = str_replace('{title}', '', $this->page);
        $this->page = str_replace('{description}', '', $this->page);
        $categories = "";
        foreach ($listCategories as $category) {
            $categories .= "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
        }
        $this->page = str_replace('{categories}', $categories, $this->page);

        $this->displayPage();
    }

    /**
     * Affichage du formalaire contenant l'info à modifier
     *
     * @param array $new
     * @return void
     */
    public function updateForm($new, $listCategories)
    {
        //var_dump($new);
        $this->page .= "<h1>Modification de l'information</h1>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $new['id'], $this->page);
        $this->page = str_replace('{title}', $new['title'], $this->page);
        $this->page = str_replace('{description}', $new['description'], $this->page);
        $categories = "";
        foreach ($listCategories as $category) {
            $selected = "";
            if ($new['category'] == $category['id']) {
                $selected = "selected";
            }
            $categories .= "<option $selected value='" . $category['id'] . "'>" . $category['name'] . "</option>";
        }
        $this->page = str_replace('{categories}', $categories, $this->page);
        $this->displayPage();
    }
}
