<?php

class UserView extends View
{

    /**
     * Affichage de la page d'accueil
     * Liste des infos
     *
     * @param array $listUsers
     * @return void
     */
    public function displayHome($listUsers)
    {
        // var_dump($listUsers);
        $this->page .= "<h1 class='text-center'>Liste des utilisateurs</h1>";
        $this->page .= "<p><a href='index.php?controller=User&action=addForm' class='btn btn-primary'>Ajouter</a></p>";
        $this->page .= "<table class='table'>";
        foreach ($listUsers as $user) {
            $this->page .= "<tr>"
                . "<td>" . $user['id'] . "</td>"
                . "<td>" . $user['username'] . "</td>"
                . "<td>" . $user['firstname'] . "</td>"
                . "<td>" . $user['lastname'] . "</td>"
                . "<td><a href='index.php?controller=User&action=updateForm&id="
                . $user['id']
                . "' class='btn btn-primary' title='Mise à jour'><i class='fas fa-pen'></i></a>"
                . "</td>"
                . "<td><a href='index.php?controller=User&action=suppDB&id="
                . $user['id']
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
        $this->page .= "<h1>Ajout d'un utilisateur</h1>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}', 'addDB', $this->page);
        $this->page = str_replace('{id}', '', $this->page);
        $this->page = str_replace('{username}', '', $this->page);
        $this->page = str_replace('{password}', '', $this->page);
        $this->page = str_replace('{firstname}', '', $this->page);
        $this->page = str_replace('{lastname}', '', $this->page);        

        $this->displayPage();
    }

    /**
     * Affichage du formalaire contenant l'info à modifier
     *
     * @param array $user
     * @return void
     */
    public function updateForm($user)
    {
        //var_dump($user);
        $this->page .= "<h1>Modification de l'information</h1>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $user['id'], $this->page);
        $this->page = str_replace('{username}', $user['username'], $this->page);
        $this->page = str_replace('{password}', $user['password'], $this->page);
        $this->page = str_replace('{firstname}', $user['firstname'], $this->page);
        $this->page = str_replace('{lastname}', $user['lastname'], $this->page);  $this->displayPage();
    }

}
