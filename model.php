<?php
$username = "test";
$password = "t3st3r123";
$database = "test";
$server = "localhost";
$link = mysqli_connect($server, $username, $password, $database);

function model_add_user ($username, $password, $code){
    global $link;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO dviirmaa__kasutajad (kasutajanimi, parool, isikukood) VALUES (?,?,?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sss",$username,$hash,$code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function model_user_get($kasutajanimi, $parool)
{
    global $link;
    $query = 'SELECT Id, Parool FROM dviirmaa__kasutajad WHERE Kasutajanimi=? LIMIT 1';
    $stmt = mysqli_prepare($link, $query);
    if (mysqli_error($link)) {
        echo mysqli_error($link);
        exit;
    }

    mysqli_stmt_bind_param($stmt, 's', $kasutajanimi);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $hash);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    // kontrollime, kas vabateksti $parool klapib baasis olnud räsiga $hash
    if (password_verify($parool, $hash)) {
        return $id;
    }
    return false;
}