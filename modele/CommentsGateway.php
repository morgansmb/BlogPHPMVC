<?php

class CommentsGateway
{

    //méthode permettant l'insertion dans la BDD d'un commentaire
    public static function insertComment(Connection $con, $auteur, $contenu, $id_news)
    {
        try{
            $query = 'INSERT into tcomments VALUES (NULL ,:id_n, :auteur, :contenu, now())';

            $con->executeQuery($query,array(
                    ':auteur' => array($auteur, PDO::PARAM_STR),
                    ':id_n' => array($id_news, PDO::PARAM_INT),
                    ':contenu' => array($contenu, PDO::PARAM_STR)
                )
            );
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //méthode permettant d'avoir le nombre total de commentaires sur le site
    public static function getNbComm (Connection $con)
    {
        try{
            $query = 'SELECT COUNT(*) FROM tcomments';
            $con->executeQuery($query, array());
            $res = $con->getResults();
            return $res;
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //méthode qui sert à avoir le nombre de commentaire d'une news donnée
    public static function getNbCommFromNews(Connection $con, $id)
    {
        try{
            $query = 'SELECT COUNT(*) FROM tcomments WHERE id_news = :id';
            $con->executeQuery($query, array(
                ':id' => array($id, PDO::PARAM_INT)
                                            )
                              );
            return $con->getResults();
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }

    //methode qui sert a l'affichage des commentaires
    public static function getCommentaires(Connection $con, $idNews)
    {
        try{
            $query = "SELECT auteur, contenu, DATE_FORMAT(date, \"%d/%m/%Y à %Hh%imin\") AS date_creation_fr FROM tcomments WHERE id_news = :idNews ORDER BY date DESC";
            $con->executeQuery($query, array(
                ':idNews' => array($idNews, PDO::PARAM_INT)
                )
            );
            return $con->getResults();
        }
        catch (PDOException $e)
        {
            throw new Exception('erreur Gateway');
        }
    }
}