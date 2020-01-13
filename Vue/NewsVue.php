<?php


class NewsVue extends Vue
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
        if (isset($_SESSION["user"]) && $_SESSION["user"]["pseudo"]=="admin" || $_SESSION["user"]["pseudo"]=="Redacteur") {
            $this->page .= "<p class='text-center'><a href='index.php?controleur=news&action=ajoutForm'><button class='btn btn-success'><i class='fas fa-plus'></i></i></button></a></p>";
        }
        $this->page .= "<table class='table table-striped'>";
        $this->page .= "<th class='text-center table-primary'>Titre</th>";
        $this->page .= "<th class='text-center table-primary'>Description</th>";
        $this->page .= "<th class='text-center table-primary'>Catégorie</th>";
        // var_dump($_SESSION["user"]["pseudo"]);
        if (isset($_SESSION["user"]) && ($_SESSION["user"]["pseudo"]=="admin") || ($_SESSION["user"]["pseudo"] == "Redacteur")) {
            $this->page .= "<th class='text-center table-primary'>Modification</th>";
                $this->page .= "<th class='text-center table-primary'>Suppression</th>";
            foreach ($listNews as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['titre'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['Newsdescription']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['nom']  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=news&action=modifForm&id=" . $liste["newsid"] . "'>" . "<button class='btn btn-warning btn-block'><i class='far fa-edit'></i></button>" . "</a>"  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=news&action=supprForm&id=" . $liste["newsid"] . "'>" . "<button class='btn btn-danger btn-block'><i class='far fa-trash-alt'></i></button>" . "</a>" . "</td>";
    }
    $this->page .= "</table>";
        }
        else {
            foreach ($listNews as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['titre'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['Newsdescription']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['nom']  . "</td>";
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
    public function displayForm($listCategories)
    {
        $this->page .= "<h1 class='text-center'>Formulaire d'ajout</h1>";
        $this->page .= file_get_contents("template/formNews.html");
        $this->page = str_replace('{action}', "ajouter", $this->page);
        $this->page = str_replace('{id}', "", $this->page);
        $this->page = str_replace('{titre}', "", $this->page);
        $this->page = str_replace('{description}', "", $this->page);
        $categories="";
        foreach ($listCategories as $category) {
            // var_dump($liste);
            $categories .= "<option value='". $category["id"] ."'>". $category["nom"] ."</option>";
        }
        $this->page = str_replace('{categories}', $categories, $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
    /**
     * Affichage du formulaire de modification
     *
     * @param [array] $infos
     * @return void
     */
    public function modifForm($infos,$listCategories)
    {
        // var_dump($infos);
        // var_dump($listCategories);
        $this->page .= "<h1 class='text-center'>Formulaire de modification</h1>";
        $this->page .= file_get_contents("template/formNews.html");
        $this->page = str_replace('{action}', "modifier", $this->page);
        $this->page = str_replace('{id}', $infos["newsid"], $this->page);
        $this->page = str_replace('{titre}', $infos["titre"], $this->page);
        $this->page = str_replace('{description}', $infos["Newsdescription"], $this->page);
        $categories="";
        foreach ($listCategories as $category ) {
            if ($infos["categorie"] == $category["id"]) {
                $categories .= "<option value='". $category["id"] ."'selected>". $category["nom"] ."</option>";
            }
            else {
                $categories .= "<option value='". $category["id"] ."'>". $category["nom"] ."</option>";
            }
        }
        // var_dump($categories);
        $this->page = str_replace('{categories}', $categories, $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
}
