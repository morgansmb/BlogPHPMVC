<?php

class ModeleCookie
{
    public static function incrementer()
    {
        if (isset($_COOKIE['nbCom']))
        {
            $nbCom = Validation::validationInt($_COOKIE['nbCom']);
            setcookie('nbCom',$nbCom+1,time()+365*24*3600);
        }
        else
        {
            setcookie('nbCom', 1, time()+365*24*3600);
        }
    }

    public static function getCookie()
    {
        if (isset($_COOKIE['nbCom']))
        {
            $nbCom = Validation::validationInt($_COOKIE['nbCom']);
            return $nbCom;
        }
        else
            return 0;
    }
}