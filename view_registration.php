<!doctype html>
<html>

<head>
    <title>Registreerimise vorm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>


<div class="container table-registration">
    <h2>Registreerimise vorm</h2>

    <p></p>

    <div class="table-registration">
        <table class="table table-condensed table-hover">
            <form method="post" action="index.php" id="registration">

                <input type="hidden" name="action" value="registration">
                <thead>Täida kõik väljad</thead>
                <tr></tr>
                <tbody>
                <tr>
                    <th>
                        <label for="username-id">
                            Kasutajanimi:
                        </label>
                    </th>
                    <td>
                        <input type="text" name="username" id="username-id" placeholder="Kasutajanimi">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="code-id">
                            Isikukood:
                        </label>
                    </th>
                    <td>
                        <input type="text" name="code" id="code-id" placeholder="Isikukood" size="20">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password1-id">
                            Parool:
                        </label>
                    </th>
                    <td>
                        <input type="password" name="password1" id="password-id" placeholder="Parool" size="20">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password2-id">
                            Korda parooli:
                        </label>
                    </th>
                    <td>
                        <input type="password" name="password2" id="password2-id" placeholder="Parool" size="20">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td>
                        <button type="submit">Registreeri</button>
                    </td>
                </tr>
                </tbody>
            </form>
        </table>
    </div>
    <form id="tagasi" method="get" action="index.php">
        <button type="submit" class="btn btn-default back-button">Tagasi</button>
    </form>
</div>

<script src="alert.js"></script>
</body>

</html>
