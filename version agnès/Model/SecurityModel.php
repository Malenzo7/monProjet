<?php

class SecurityModel extends Model
{

    /**
     * Test les accès de login
     *
     * @return void
     */
    public function testLogin()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $requete = $this->connexion->prepare("SELECT * 
            FROM user	
	        WHERE username=:username AND password=:password");
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $result = $requete->execute();
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($_POST);
        // var_dump($requete);
        // var_dump($user);
        // var_dump($requete->errorInfo());
        if ($user != false) {
            $_SESSION['user'] = $user;
        }
        // var_dump($user);
        return $user;
    }

    /**
     * Test les accès de login
     *
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user']);
    }
}
