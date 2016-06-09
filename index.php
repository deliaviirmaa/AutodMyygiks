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



$tester;


if($_SERVER['REQUEST_METHOD'] == "POST") {

    switch($_POST['action']) {
        case "add":
            $mark = $_POST['brand'];
            $mudel = $_POST['model'];
            $aasta = $_POST['year'];
            $hind = $_POST['price'];
            $kasutajanimi = $_POST['username'];
            controller_lisa($mark, $mudel, $aasta, $hind, $kasutajanimi);
            break;
        case "login":
            $kasutajanimi = $_POST['username']; // "delia"
            $parool = $_POST['password'];
            controller_login($kasutajanimi,$parool);
            break;
        case "registration":
            $kasutaja = $_POST['username']; // roheline on name
            $parool1 = $_POST['password1'];
            $parool2 = $_POST['password2'];
            $isikukood = $_POST['code'];
            controller_registreeri($kasutaja, $parool1, $parool2, $isikukood);
            break;
        case "logout":
            session_destroy();
            header('Location: index.php');
            break;
        case "erase":
            $id = $_POST['id'];
            model_erase($id);
            break;
        case "edit":
            $id = $_POST['id'];
            $_SESSION['edit'] = $id;
            break;
        case "back":
            unset($_SESSION['edit']);
            break;
        case "update":
            unset($_SESSION['edit']);
            $id = $_POST['id'];
            $mark = $_POST['brand'];
            $mudel = $_POST['model'];
            $aasta = $_POST['year'];
            $hind = $_POST['price'];
            controller_uuenda($id,$mark,$mudel, $aasta, $hind );
            break;

        }


}

require('view_home.php');
//var_dump($tester);