<?php

class ModeleAdmin
{
    public static function deconnexion()
    {
        unset($_SESSION['role']);
        unset($_SESSION['username']);
    }

    public static function isAdmin()
    {
        if(isset($_SESSION['role']) && isset($_SESSION['username']))
        {
            $role = Validation::validationString($_SESSION['role']);
            $username = Validation::validationString($_SESSION['username']);
            return new Admin($role, $username);
        }
        else
            return null;
    }

    public static function publier($contenu, $titre)
    {
        global $dsn, $dbusername, $dbpassword;
        $contenu = Validation::validationString($contenu);
        $titre = Validation::validationString($titre);
        $auteur = Validation::validationString($_SESSION['username']);
        NewsGateway::insertNews(new Connection($dsn, $dbusername, $dbpassword), $titre, $auteur, $contenu);
    }

    public static function supprimer($idNews)
    {
        global $dsn, $dbusername, $dbpassword;
        $idNews = Validation::validationInt($idNews);
        NewsGateway::deleteNews(new Connection($dsn, $dbusername, $dbpassword), $idNews);
    }

    public static function goToPublier()
    {
        global $admin;
        require_once ('vue/publish.php');
    }

    public static function goToEditer($idNews)
    {
        global $dsn, $dbusername, $dbpassword, $admin;
        $idNews = Validation::validationInt($idNews);
        $article = NewsGateway::getNewsForEdit(new Connection($dsn, $dbusername, $dbpassword),$idNews);

        require_once ('vue/edit.php');
    }

    public static function editer($titre, $contenu, $idNews)
    {
        global $dsn, $dbusername, $dbpassword, $admin;
        $titre = Validation::validationString($titre);
        $contenu = Validation::validationString($contenu);
        $idNews = Validation::validationInt($idNews);
        NewsGateway::editerNews(new Connection($dsn, $dbusername, $dbpassword),$idNews,$titre,$contenu);
    }
}