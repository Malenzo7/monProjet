<?php

class SecurityModele extends Modele
{
    /**
     * cherche les infos
     *
     * @return void
     */
    public function getlogin()
    {
        // var_dump($_POST);
        $pseudo=$_POST["pseudo"];
        $password=$_POST["password"];

        $requete = $this->connexion->prepare("SELECT * from `users` where pseudo =:pseudo AND password =:password");
        $requete->bindParam(":pseudo", $pseudo);
        $requete->bindParam(":password", $password);
        $result = $requete->execute();
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($user);
        // var_dump($requete->errorInfo());
        // var_dump($requete->errorCode());
        // var_dump($user);
        if ($user != false) {
            // var_dump($user);
            $_SESSION["user"]=$user;
        }

        return $user;
    }
    public function logout(){
        unset($_SESSION["user"]);
    }  
}
