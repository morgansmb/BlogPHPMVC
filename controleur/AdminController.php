<?php

class AdminController
{
    private $dataVueErreur = array();

    function __construct()
    {
        try
        {
            $action = $_REQUEST['action'];
            switch ($action)
            {
                case 'publier' :
                    $this->publier();
                    break;
                case 'supprimer' :
                    $this->supprimer();
                    break;
                case 'deconnexion' :
                    $this->deconnexion();
                    break;
                case 'goToPublier' :
                    $this->goToPublier();
                    break;
                case 'goToEditer' :
                    $this->goToEditer();
                    break;
                case 'editer' :
                    $this->editer();
                    break;
                default :
                    $this->dataVueErreur[] = "Erreur action Admin inconnue";
                    require ('vue/erreur.php');
            }
        }
        catch(Exception $e)
        {
            $this->dataVueErreur[] = "Erreur action Admin inconnue";
            require ('vue/erreur.php');
        }
        exit(0);
    }


    public function publier()
    {
        $titre = $_POST['txtTitre'];
        $contenu = $_POST['txtContenu'];
        ModeleAdmin::publier($contenu, $titre);
        ModeleUser::afficherNews(1);
    }

    public function supprimer()
    {
        $idNews = $_POST['idNews'];
        ModeleAdmin::supprimer($idNews);
        ModeleUser::afficherNews(1);
    }

    public function deconnexion()
    {
        global $admin;
        ModeleAdmin::deconnexion();
        $admin = null;
        ModeleUser::afficherNews(1);
    }

    public function goToPublier()
    {
        ModeleAdmin::goToPublier();
    }

    public function goToEditer()
    {
        $idNews = $_POST['idNews'];
        ModeleAdmin::goToEditer($idNews);
    }

    public function editer()
    {
        $titre = $_POST['txtTitre'];
        $contenu = $_POST['txtContenu'];
        $idNews = $_POST['idNews'];
        ModeleAdmin::editer($titre,$contenu,$idNews);
        ModeleUser::afficherNews(1);
    }
}