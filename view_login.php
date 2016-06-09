<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sisselogimine</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>


<div class="container table-registration">
    <h2>Sisselogimine</h2>

    <p></p>


    <div class="table-registration">
        <table class="table table-condensed table-hover">
            <form method="post" action="index.php" id="login">

                <input type="hidden" name="action" value="login">
                <thead></thead>
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
                        <label for="password1-id">
                            Parool:
                        </label>
                    </th>
                    <td>
                        <input type="password" name="password" id="password-id" placeholder="Parool" size="20">
                    </td>
                </tr>
                <tr>
                    <th></th>

                </tr>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td>
                        <button type="submit">Sisene</button>
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