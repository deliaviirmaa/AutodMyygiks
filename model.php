<?php
$username = "test";
$password = "t3st3r123";
$database = "test";
$server = "localhost";
$link = mysqli_connect($server, $username, $password, $database);

function model_add_user($username, $password, $code)
{
    global $link;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO dviirmaa__kasutajad (kasutajanimi, parool, isikukood) VALUES (?,?,?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $hash, $code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function model_get_password($kasutajanimi)
{
    global $link;
    $query = 'SELECT parool FROM dviirmaa__kasutajad WHERE kasutajanimi=? LIMIT 1';
    $stmt = mysqli_prepare($link, $query);


    mysqli_stmt_bind_param($stmt, 's', $kasutajanimi);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hash);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return $hash;
}

function model_add_car($mark, $mudel, $aasta, $hind, $kasutaja)
{
    global $link;
    $query = "INSERT INTO dviirmaa__autod (mark, mudel, aasta, hind, kasutaja) VALUES (?,?,?,?,?)";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssiis", $mark, $mudel, $aasta, $hind, $kasutaja);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function model_get_cars()
{
    global $link;
    $query = 'SELECT id, mark, mudel, aasta, hind, kasutaja FROM dviirmaa__autod ORDER BY id DESC';
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $mark, $mudel, $aasta, $hind, $kasutaja);
    $rows = array();
    while (mysqli_stmt_fetch($stmt)) {
        $rows[] = array(
            'id' => $id,
            'mark' => $mark,
            'mudel' => $mudel,
            'aasta' => $aasta,
            'hind' => $hind,
            'kasutaja' => $kasutaja,
        );
    }
    mysqli_stmt_close($stmt);
    return $rows;
}

function model_erase($id)
{
    global $link;
    $query = 'DELETE FROM dviirmaa__autod WHERE id=? LIMIT 1';
    $stmt = mysqli_prepare($link, $query);
    global $tester;
    $tester = $id;
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function model_change_car($id, $mark, $mudel, $aasta, $hind)
{
    global $link;
    $query = 'UPDATE dviirmaa__autod SET mark=?, mudel=?, aasta=?, hind=? WHERE id=?';
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssiii", $mark, $mudel, $aasta, $hind, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}