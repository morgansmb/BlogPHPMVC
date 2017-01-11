<?php

class ModeleUser
{
    public static function commenter($commentaire, $pseudo, $idNews)
    {
        global $dsn, $dbusername, $dbpassword;
        $commentaire = Validation::validationString($commentaire);
        $pseudo = Validation::validationString($pseudo);
        $idNews = Validation::validationInt($idNews);
        CommentsGateway::insertComment(new Connection($dsn, $dbusername, $dbpassword), $pseudo, $commentaire, $idNews);
        ModeleCookie::incrementer();
        self::lire($idNews);
    }

    public static function connexion($username, $password)
    {
        global $dsn, $dbusername, $dbpassword;
        $username = Validation::validationString($username);
        $password = Validation::validationString($password);
        $hash = AdminGateway::findMdp(new Connection($dsn, $dbusername, $dbpassword), $username);
        if (!password_verify($password, $hash[0][0]))
        {
            throw new Exception("mot de passe incorrect");
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
        }
    }

    public static function lire($idNews)
    {
        global $dsn, $dbusername, $dbpassword,$admin;
        $con = new Connection($dsn, $dbusername, $dbpassword);
        $idNews = Validation::validationInt($idNews);
        $article = NewsGateway::getSingleNews($con, $idNews);
        $nbComm = CommentsGateway::getNbCommFromNews($con, $idNews);
        $commentaires = CommentsGateway::getCommentaires($con,$idNews);
        require_once ('vue/single-post.php');
    }

    public static function rechercherDate($recherche)
    {
        global $dsn, $dbusername, $dbpassword;
        $recherche = Validation::validationString($recherche);
        return NewsGateway::getNewsDate(new Connection($dsn, $dbusername, $dbpassword),$recherche);
    }

    public static function rechercherMots($recherche)
    {
        global $dsn, $dbusername, $dbpassword;
        $res = array();
        $recherche = Validation::validationString($recherche);
        $tabRecherche = explode(' ',$recherche);
        $news = NewsGateway::getNews(new Connection($dsn, $dbusername, $dbpassword));
        foreach ($news as $article)
        {
            $ok = false;
            $titre = $article['titre'];
            $tabTitre = explode(' ', $titre);
            foreach ($tabTitre as $mot)
            {
                if (in_array($mot, $tabRecherche))
                {
                    $res[] = $article;
                    $ok = true;
                    break;
                }
            }
            if(!$ok)
            {
                $cont = $article['contenu'];
                $tabCont = explode(' ', $cont);
                foreach ($tabCont as $mot)
                {
                    if (in_array($mot, $tabRecherche))
                    {
                        $res[] = $article;
                        break;
                    }
                }
            }
        }
        return $res;
    }

    public static function afficherNews($numPage)
    {
        global $dsn, $dbusername, $dbpassword,$admin;
        $newsParPage = 3;
        $nbNews = NewsGateway::getNbNews(new Connection($dsn, $dbusername, $dbpassword));
        $nbPages = ceil($nbNews / $newsParPage);
        if ($numPage > $nbPages)
            $numPage = $nbPages;
        $current = ($numPage - 1)*$newsParPage;

        $news = NewsGateway::get_articles(new Connection($dsn, $dbusername, $dbpassword),$current,$newsParPage);
        $userNbComm = ModeleCookie::getCookie();
        $res = CommentsGateway::getNbComm(new Connection($dsn, $dbusername, $dbpassword));
        $nbComm = $res[0][0];

        require('vue/blog.php');
    }
}