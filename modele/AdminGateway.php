<?php

class AdminGateway
{
    //methode pour connexion avec chiffrage du mdp
    public static function findMdp(Connection $con, $username)
    {
        try{
            $query = "SELECT password FROM tadmin WHERE username =:username";

            $con->executeQuery($query,array(
                    ':username' => array($username, PDO::PARAM_STR)
                )
            );
            $mdp = $con->getResults();
            return $mdp;
        }
        catch (PDOException $e)
        {
            throw new Exception('probleme Gateway');
        }
    }
}