<?php


class UserVue extends Vue
{
    /**
     * affichage de l'accueil
     *
     * @param [array] $listNews
     * @return void
     */
    public function displayHome($listUser)
    {
        $this->page .= "<h1 class='text-center'>Bienvenue sur FictionNews le journal de FictionWorld le monde des personnages de fictions</h1>";
        if (isset($_SESSION["user"]) && $_SESSION["user"]["pseudo"]=="admin") {
        $this->page .= "<p class='text-center'><a href='index.php?controleur=user&action=ajoutForm'><button class='btn btn-success'><i class='fas fa-plus'></i></i></button></a></p>";
         }
        $this->page .= "<table class='table table-striped'>";
        $this->page .= "<th class='text-center table-primary'>Pseudo</th>";
        $this->page .= "<th class='text-center table-primary'>Password</th>";
        $this->page .= "<th class='text-center table-primary'>Prenom</th>";
        $this->page .= "<th class='text-center table-primary'>Nom</th>";
        if (isset($_SESSION["user"]) && $_SESSION["user"]["pseudo"]=="admin") {
            $this->page .= "<th class='text-center table-primary'>Modification</th>";
                $this->page .= "<th class='text-center table-primary'>Suppression</th>";
            foreach ($listUser as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['pseudo'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['password']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['prenom']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste["nom"]  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=user&action=modifForm&id=" . $liste["id"] . "'>" . "<button class='btn btn-warning btn-block'><i class='far fa-edit'></i></button>" . "</a>"  . "</td>";
                $this->page .= "<td class='text-center'>" . "<a href='index.php?controleur=user&action=supprForm&id=" . $liste["id"] . "'>" . "<button class='btn btn-danger btn-block'><i class='far fa-trash-alt'></i></button>" . "</a>" . "</td>";
    }
    $this->page .= "</table>";
        }
        else {
            foreach ($listUser as $liste) {
                // var_dump($liste);
                $this->page .= "<tr>";
                $this->page .= "<td class='text-center'>" . $liste['pseudo'] . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['password']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste['prenom']  . "</td>";
                $this->page .= "<td class='text-center'>" . $liste["nom"]  . "</td>";
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
        $this->page .= file_get_contents("template/formUser.html");
        $this->page = str_replace('{action}', "ajouter", $this->page);
        $this->page = str_replace('{id}', "", $this->page);
        $this->page = str_replace('{pseudo}', "", $this->page);
        $this->page = str_replace('{password}', "", $this->page);
        $this->page = str_replace('{prenom}', "", $this->page);
        $this->page = str_replace('{nom}', "", $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
    /**
     * Affichage du formulaire de modification
     *
     * @param [array] $infos
     * @return void
     */
    public function modifForm($user)
    {
        // var_dump($user);
        $this->page .= "<h1 class='text-center'>Formulaire de modification</h1>";
        $this->page .= file_get_contents("template/formUser.html");
        $this->page = str_replace('{action}', "modifier", $this->page);
        $this->page = str_replace('{id}', $user["id"], $this->page);
        $this->page = str_replace('{pseudo}', $user["pseudo"], $this->page);
        $this->page = str_replace('{password}', $user["password"], $this->page);
        $this->page = str_replace('{prenom}', $user["prenom"], $this->page);
        $this->page = str_replace('{nom}', $user["nom"], $this->page);
        $this->page .= "<p class='text-center'><a href='index.php?action=start'><button class='btn btn-danger'>Retour</button></a></p>";
        $this->displayPage();
    }
}
