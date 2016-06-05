<?php
/**
 * Created by IntelliJ IDEA.
 * User: Delia
 * Date: 26.05.2016
 * Time: 21:38
 */
session_start();
require('controller.php');
require('model.php');
require('view_home.php');

    // kuva ekraanil POST päringu sisu
// $ - märk tähendab muutujat

/*$_POST = {
    "nimetus" => "kana",
    "kogus" => "46",
    "action" => "add"
}
$_POST = {
    "username" => "delia",
    "password" => "deliakene18",
    "action" => "login
}

*/



if($_SERVER['REQUEST_METHOD'] == "POST") {

    switch($_POST['action']) {
        case "add":
            $nimetus = $_POST['nimetus'];
            $kogus = $_POST['kogus'];
            controller_lisa_lattu($nimetus, $kogus);
            break;
        case "login":
            $kasutajanimi = $_POST['username']; // "delia"
            $parool = $_POST['password'];
            controller_login($kasutajanimi,$parool);
            break;
        case "registration":
            $kasutajanimi = $_POST['username']; // roheline on name
            $parool1 = $_POST['password1'];
            $parool2 = $_POST['password2'];
            $isikukood = $_POST['code'];
            controller_registreeri($kasutajanimi, $parool1, $parool2, $isikukood);

        }


}

