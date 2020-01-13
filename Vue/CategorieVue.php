<?php


class CategorieVue extends Vue
{

    /**
     * affichage de l'accueil
     *
     * @param [array] $listNews
     * @return void
     */
    public function displayHome($listNews)
    {
        $this->page .= "<h1 class='text-center'>Bienvenue sur FictionNews le journal de FictionWorld le monde des personnages de fictions</h1>";
        if (isset($_SESSION["user"]) && $_SESSION["user"]["pseudo"]=="admin") {
            $this->page .= "<p class='text-center'><a href='index.php?controleur=categorie&action=ajoutForm'><button class='btn btn-success'><i class='fas fa-plus'></i></i></button></a></p>";
        }

        $this->page .= "<table class='table table-striped'>";
        $this->page .= "<th class='text-center table-primary'>id</th>";
        $this->page .= "<th class='text-center table-primary'>nom</th>";
        $this->page .= "<th class='text-center table-primary'>description</th>";
        if (isset($_SESSION["user"]) && $_SESSION["user"]["pseudo"]=="admin") {
            $this->page .= "<th class='text-center table-primary'>Modification</th>";
                $this->page .= "<th class='text-center table-primary'>Suppression</th>";
            foreach ($listNews as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['id'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['nom']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['description']  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=categorie&action=modifForm&id=" . $liste["id"] . "'>" . "<button class='btn btn-warning btn-block'><i class='far fa-edit'></i></button>" . "</a>"  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=categorie&action=supprForm&id=" . $liste["id"] . "'>" . "<button class='btn btn-danger btn-block'><i class='far fa-trash-alt'></i></button>" . "</a>" . "</td>";
    }
    $this->page .= "</table>";
        }
        else {
            foreach ($listNews as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['id'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['nom']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['description']  . "</td>";
    }
    $this->page .= "</table>";
        }        
        $this->displayPage();
    }
    /**
     * affichage du formulaire d'Ajout
     *
     * @return void
     */
    public function displayForm()
    {
        $this->page .= "<h1 class='text-center'>Formulaire d'ajout</h1>";
        $this->page .= file_get_contents("template/formCategorie.html");
        $this->page = str_replace('{action}', "ajouter", $this->page);
        $this->page = str_replace('{id}', "", $this->page);
        $this->page = str_replace('{nom}', "", $this->page);
        $this->page = str_replace('{description}', "", $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
    /**
     * Affichage du formulaire de modification
     *
     * @param [array] $infos
     * @return void
     */
    public function modifForm($infos)
    {
        // var_dump($infos);
        $this->page .= "<h1 class='text-center'>Formulaire de modification</h1>";
        $this->page .= file_get_contents("template/formCategorie.html");
        $this->page = str_replace('{action}', "modifier", $this->page);
        $this->page = str_replace('{id}', $infos["id"], $this->page);
        $this->page = str_replace('{nom}', $infos["nom"], $this->page);
        $this->page = str_replace('{description}', $infos["description"], $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
    /**
     * affichage du footer
     *
     * @return void
     */
}
