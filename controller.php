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
    $hash = model_get_password($kasutajanimi);

    if (password_verify($parool, $hash)) {
        $_SESSION['login'] = $kasutajanimi;
    }

}

function controller_lisa($mark, $mudel, $aasta, $hind, $kasutaja)
{
    if ($kasutaja == '' || $mark == '' || $mudel == '' || $aasta == '' || $hind == '') {
        return false;
    } else {
        model_add_car($mark, $mudel, $aasta, $hind, $kasutaja);
    }
}

function controller_uuenda($id,$mark, $mudel, $aasta, $hind)
{
    if ($mark == '' || $mudel == '' || $aasta == '' || $hind == '') {
        return false;
    } else {
        model_change_car($id, $mark, $mudel, $aasta, $hind);

    }
}
//kirjutan siia niisama midagi juurde, et proovida sfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf


