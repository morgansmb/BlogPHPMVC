<?php

class FrontController
{
    private $dataVueErreur = array();

    public function __construct()
    {
        $listeAction_Admin = array('deconnexion', 'publier', 'supprimer', 'goToPublier', 'goToEditer', 'editer');
        global $admin;
        try
        {
            $action = $_REQUEST['action'];
            $admin = ModeleAdmin::isAdmin();

            if (in_array($action, $listeAction_Admin))
            {
                if ($admin == null)
                    require_once ('vue/signin.html');
                else
                    new AdminController();
            }
            else
                new UserController();
        }

        catch (Exception $e)
        {
            $this->dataVueErreur[] = "erreur front controller";
            require_once ('vue/erreur.php');
        }
    }
}
