<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sisselogimine</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<form method="post" action="index.php">

    <input type="hidden" name="action" value="login">

    <table border="1">
        <caption>Sisselogimise vorm</caption>

        <tr>
            <th>
                <label for="username-id">Kasutajanimi:</label>
            </th>
            <td>
                <input type="text" name="username" id="username-id" placeholder="Kasutajanimi" size="20">
            </td>
        </tr>

        <tr>
            <th>
                <label for="password-id">Parool:</label>
            </th>
            <td>
                <input type="password" name="password" id="password-id" placeholder="Parool" size="20">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <label>
                    <input type="checkbox" name="remember_me" value="test"> Pea mind meeles
                </label>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-default">Logi sisse</button>
            </td>
        </tr>

    </table>

</form>
<form id="tagasi" method="post" action="view_home.php">
    <button type="submit" class="btn btn-default">Tagasi</button>
</form>

</body>
</html>