<?php

class UserController
{
    private $dataVueErreur = array();

    public function __construct()
    {
        try
        {
            $action = $_REQUEST['action'];

            switch ($action)
            {
                case NULL :
                    $this->afficherNews();
                    break;
                case "afficherNews":
                    $this->afficherNews();
                    break;
                case "commenter":
                    $this->commenter();
                    break;
                case 'connexion' :
                    $this->connexion();
                    break;
                case 'lire' :
                    $this->lire();
                    break;
                case 'rechercherDate':
                    $this->rechercherDate();
                    break;
                case 'rechercherMots':
                    $this->rechercherMots();
                    break;
                default:
                    $this->dataVueErreur[] = "Erreur d'appel PHP";
                    require_once ('vue/erreur.php');
                    break;
            }
        }
        catch (Exception $e)
        {
            $this->dataVueErreur[] = "Erreur inattendue";
            $this->dataVueErreur[] = $e->getMessage();
            require_once ('vue/erreur.php');
        }
        exit(0);
    }

    public function afficherNews()
    {
        if (isset($_GET['numPage']))
        {
            $numPage = $_GET['numPage'];
            ModeleUser::afficherNews($numPage);
        }
        else{
            ModeleUser::afficherNews(1);
        }
    }

    public function commenter()
    {
        $pseudo = $_POST['txtUsername'];
        $commentaire = $_POST['txtContenu'];
        $idNews = $_POST['idNews'];
        ModeleUser::commenter($commentaire, $pseudo, $idNews);
    }

    public function connexion()
    {
        global $admin;
        $username = $_POST['txtPseudo'];
        $password = $_POST['txtPasswd'];
        ModeleUser::connexion($username, $password);
        $admin = ModeleAdmin::isAdmin();
        $this->afficherNews();
    }

    public function lire()
    {
        $idNews = $_POST['idNews'];
        ModeleUser::lire($idNews);
    }

    public function rechercherDate()
    {
        global $dsn, $dbusername, $dbpassword, $admin;
        $recherche = $_POST['rechercheDate'];
        $news = ModeleUser::rechercherDate($recherche);
        $userNbComm = ModeleCookie::getCookie();
        $res = CommentsGateway::getNbComm(new Connection($dsn, $dbusername, $dbpassword));
        $nbComm = $res[0][0];
        require('vue/blog.php');
    }

    private function rechercherMots()
    {
        global $dsn, $dbusername, $dbpassword, $admin;
        $recherche = $_POST['rechercheMots'];
        $news = ModeleUser::rechercherMots($recherche);
        $userNbComm = ModeleCookie::getCookie();
        $res = CommentsGateway::getNbComm(new Connection($dsn, $dbusername, $dbpassword));
        $nbComm = $res[0][0];
        require('vue/blog.php');
    }
}
