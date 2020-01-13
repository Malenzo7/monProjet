<?php

session_start();

include "Controleur/Controleur.php";
include "Vue/Vue.php";
include "Modele/Modele.php";
include "Controleur/NewsControleur.php";
include "Controleur/CategorieControleur.php";
include "Controleur/UserControleur.php";
include "Controleur/SecurityControleur.php";


// if (isset($_GET["controleur"])) {
//     $controleurStart = ucfirst($_GET["controleur"])."controleur";
// } else {
//     $controleurStart = "NewsControleur";
//     if (!isset($_SESSION["user"]) && ($_GET["controleur"] != "security")) {
//         $controleurStart ="NewsControleur";
//         if ($_GET["controleur"] == "security") {
//             $controleurStart ="SecurityControleur";
//         }
//         // var_dump($controleurStart);
//     }
// }

// if (!isset($_SESSION["user"]) && ($controleurStart != "SecurityControleur")) {
//     $controleurStart ="NewsControleur";
//     if ($_GET["controleur"] == "security") {
//         $controleurStart ="SecurityControleur";
//     }
//     var_dump($controleurStart);
// }


// elseif ($controleurStart == "SecurityControleur") {
//     var_dump($controleurStart);
//     $controleurStart ="SecurityControleur";
// // }
// $controleur = new $controleurStart();


// if (isset($_GET["action"])) {
//     $action = $_GET["action"];
//     // if ($_GET["action"]!="start") {
//     //     $action="start";
//     //     }
// }
// else{
//     $action="start";
//         }

// if (!isset($_GET["action"])) {
//     $action = "start";
//     // var_dump($_GET);
// }
//     else if ($_GET["controleur"]=="security") {
//         $controleurStart="SecurityControleur";
//         if ($_GET["action"] == "login") {
//             $action =="login";
//         }
//         elseif ($_GET["action"]=="logout") {
//             $action="logout";
//         }
//         else {
//             $action = "Formlogin";
//             // var_dump($_GET);
// }
//     }
//     elseif ($_GET["controleur"] == "news") {
//         $action = "start";
//         // var_dump($_GET);
//     }
    // elseif ($_GET["action"]!="start") {
    // $action="start";
    // }
//  else {
//         
//         var_dump($_GET);
//     }


$paramGet = extractParameters();
$controleur = $paramGet['controleur'];
$action = $paramGet['action'];

$controleur = new $controleur();

$controleur->$action();

/**
 * Cette fonction permet d'extraire le contrôleur et l'action à lancer
 * à partir des informations reçues via l'URL et en tenant comptes des 
 * restrictions selon l'authentification de l'utilisateur
 *
 * @return array tableau contenant le contrôleur et l'action 
 */
function extractParameters()
{

    $controllerNotAuth = ['NewsControleur', 'SecurityControleur',"CategorieControleur"];
    $controllerNotAuthvisiteur = ['NewsControleur', 'SecurityControleur'];
    $actionNotAuth = ['start'/*,'show',*/ ,'Formlogin', 'login',"logout","ajouter","supprForm","modifForm","modifier","getInfos","getCategorie","id"];
    $actionNotAuthvisiteur = ['start'/*,'show',*/ ,'Formlogin', 'login',"logout"];
    /**
     * récupération des données de l'url
     */
    if (isset($_GET['controleur'])) {
        $controleur = ucfirst($_GET['controleur']) . "Controleur";
    } else {
        $controleur = 'NewsControleur';
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'start';
    }
    // var_dump($_GET);
    // var_dump($_SESSION);
    /**
     * validation selon les droits établis si l'utilisateur n'est pas authentifié
     */
    if (!isset($_SESSION['user']) || isset($_SESSION["user"]["pseudo"]) && ($_SESSION["user"]["pseudo"]!="admin")) {
        if (!in_array($controleur, $controllerNotAuth) || !in_array($action, $actionNotAuth)) {
            $controleur = 'SecurityControleur';
            $action = "Formlogin";
        }
        if (isset($_SESSION['user']) && $_SESSION["user"]["pseudo"]=="visiteur" && !in_array($controleur, $controllerNotAuthvisiteur) || !in_array($action, $actionNotAuthvisiteur)) {
            $controleur = 'SecurityControleur';
            $action = "Formlogin";
        }
    }
    return (['controleur' => $controleur, 'action' => $action]);
}

// var_dump($action);
