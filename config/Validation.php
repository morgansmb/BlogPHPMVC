<?php

class Validation
{
    public static function validationString($str)
    {
        if (!isset($str) || $str == '')
        {
            throw new Exception("chaine non valide");
        }
        else
        {
           $str = filter_var($str, FILTER_SANITIZE_STRING);
            return $str;
        }
    }

    public static function validationInt($num)
    {
        if (!isset($num) || $num == '')
        {
            throw new Exception("nombre non valide");
        }
        else
        {
            $num = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
            return $num;
        }
    }
}