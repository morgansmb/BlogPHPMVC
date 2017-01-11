<?php

class NewsGateway
{

    public static function insertNews(Connection $con, $titre, $auteur, $contenu)
    {
        try{
            $query = 'INSERT into tnews VALUES (NULL , :titre, :auteur, :contenu, now())';

            $con->executeQuery($query,array(
                    ':auteur' => array($auteur, PDO::PARAM_STR),
                    ':titre' => array($titre, PDO::PARAM_STR),
                    ':contenu' => array($contenu, PDO::PARAM_STR)
                )
            );
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    public static function deleteNews(Connection $con, $id)
    {
        try{
            $query = 'DELETE FROM tnews WHERE id=:id';

            $con->executeQuery($query, array(
                    ':id' => array($id, PDO::PARAM_INT)
                )
            );

            $query = 'DELETE FROM tcomments WHERE id_news=:idN';

            $con->executeQuery($query, array(
                    ':idN' => array($id, PDO::PARAM_INT)
                )
            );
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }

    }

    //methode pour afficher les articles en page d'accueil
    public static function get_articles(Connection $con, $current, $limit)
    {
        try{
            $query = "SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin\") AS date_creation_fr FROM tnews ORDER BY date_creation DESC LIMIT :current, :limit";
            $con->executeQuery($query, array(
                    ':current'=>array($current, PDO::PARAM_INT),
                    ':limit'=>array($limit, PDO::PARAM_INT)
                )
            );
            $news = $con->getResults();
            return $news;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }

    }

    //méthode pour afficher une news en entière grâce au bouton lire la suite
    public static function getSingleNews(Connection $con, $id)
    {
        try{
            $query = "SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin\") AS date_creation_fr FROM tnews WHERE id=:id";
            $con->executeQuery($query, array(
                ':id'=>array($id, PDO::PARAM_INT)
                )
            );
            $article = $con->getResults();
            return $article;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    public static function getNewsDate(Connection $con, $date)
    {
        $date= new DateTime($date);
        $date->modify('-1 day');
        $datePrevious = $date->format('Y-m-d');
        $date->modify('+2 day');
        $dateNext = $date->format('Y-m-d');

        try{
            $query = "SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin\") AS date_creation_fr FROM tnews WHERE date_creation>:datePrevious AND date_creation<:dateNext";
            $con->executeQuery($query, array(
                    ':datePrevious'=>array($datePrevious, PDO::PARAM_STR),
                    ':dateNext'=>array($dateNext, PDO::PARAM_STR)
                )
            );
            $news = $con->getResults();
            return $news;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    public static function getNews(Connection $con)
    {
        try{
            $query = "SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin\") AS date_creation_fr FROM tnews";
            $con->executeQuery($query, array()
            );
            $news = $con->getResults();
            return $news;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //méthode pour avoir le nombre total de news du site
    public static function getNbNews(Connection $con)
    {
        try{
            $query = 'SELECT COUNT(*) FROM tnews';
            $con->executeQuery($query, array());
            $nbNews = $con->getResults();
            return $nbNews[0][0];
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //méthode permettant d'avoir les informations nécessaires d'une news pour l'éditer
    public static function getNewsForEdit(Connection $con, $id)
    {
        try{
            $query = "SELECT id, titre, contenu FROM tnews WHERE id=:idNews";
            $con->executeQuery($query, array(
                ':idNews'=>array($id, PDO::PARAM_STR)
                )
            );
            $news = $con->getResults();
            return $news;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //méthode permettant de mettre a jour la news
    public static function editerNews(Connection $con, $idNews, $titre, $contenu)
    {
        try{
            $query = "UPDATE tnews SET contenu=:contenu, titre=:titre WHERE id=:idNews";
            $con->executeQuery($query, array(
                    ':contenu'=>array($contenu, PDO::PARAM_STR),
                    ':titre'=>array($titre, PDO::PARAM_STR),
                    ':idNews'=>array($idNews, PDO::PARAM_STR)
                )
            );
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }
}
