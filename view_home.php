<!doctype HTML>
<html>

<head>
    <title>AutodMyygiks</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>

<form id="lisa-vorm" method="post" action="index.php">


    <input type="hidden" name="action" value="add">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Autod müügiks</a>
            </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['login'])): ?>
                <li><a href="view_registration.php"><span class="glyphicon glyphicon-user"></span> Registreeri</a></li>
                <li><a href="view_login.php"><span class="glyphicon glyphicon-log-in"></span> Logi sisse</a></li>
                    <?php endif; ?>
            </ul>
        </div>
    </nav>
    <br>
    <br>




    <div class="container">
        <h2>Autod</h2>
        <p></p>
        <div class="table-responsive">
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Mark</th>
                    <th>Mudel</th>
                    <th>Aasta</th>
                    <th>Hind € </th>
                    <th>Kasutaja</th>
                    <th>Muuda</th>
                    <th>Kustuta</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Audi</td>
                    <td>A4</td>
                    <td>2003</td>
                    <td>2000</td>
                    <td>Kalle</td>
                    <td>
                        <div>
                            <button class="glyphicon glyphicon-pencil"></button>
                        </div>
                    </td>
                    <td>
                        <div>
                            <button class="glyphicon glyphicon-trash"></button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <p>
        <button type="submit">Lisa kirje</button>
    </p>

</form>

<table id="ladu" border="1">
    <thead>
    <tr>
        <th>Nimetus</th>
        <th>Kogus</th>
        <th>Tegevused</th>
    </tr>
    </thead>

    <tbody>

    <?php
    // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
    foreach ($model_data as $index => $rida): ?>

        <tr>
            <td>
                <?=
                // vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige
                // info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid
                htmlspecialchars($rida['nimetus']);
                ?>
            </td>
            <td>
                <?= $rida['kogus']; ?>
            </td>
            <td>

                <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="kustuta" value="<?= $index; ?>">
                    <button type="submit">Kustuta rida</button>
                </form>

            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>

<script src="ladu.js"></script>
</body>

</html>
