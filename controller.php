<?php
/**
 * Created by IntelliJ IDEA.
 * User: Delia
 * Date: 31.05.2016
 * Time: 21:07
 */



function controller_registreeri($kasutajanimi, $parool1, $parool2, $isikukood)
{
    if ($kasutajanimi == '' || $parool1 == '' || $parool2 == '' || $isikukood == '' || $parool1 != $parool2) {
        return false;
    } else if (strlen((string)$isikukood) != 11) {
        return false;
    } else {
        model_add_user($kasutajanimi, $parool1, $isikukood);
    }
}
function controller_login($kasutajanimi, $parool)
    {
        if ($kasutajanimi == '' || $parool == '') {
            return false;
        }
        $id = model_user_get($kasutajanimi, $parool);
        if (!$id) {
            return false;
        }
        session_regenerate_id();
        $_SESSION['login'] = $kasutajanimi;
        return $id;
    }
//kirjutan siia niisama midagi juurde, et proovida sfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf


