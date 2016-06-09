<!doctype HTML>
<html>

<head>
    <title>AutodMyygiks</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Autod müügiks</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($_SESSION['login'])): ?>
                <li><a href="view_registration.php"><span class="glyphicon glyphicon-user"></span> Registreeri</a></li>
                <li><a href="view_login.php"><span class="glyphicon glyphicon-log-in"></span> Logi sisse</a></li>
            <?php else: ?>
                <li>
                    <form id="logiValja" method="post" action="index.php">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit"><span class="glyphicon glyphicon-log-out">Logi välja</span></button>
                    </form>
                </li>
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
                <th>Hind €</th>
                <th>Kasutaja</th>
                <?php if (isset($_SESSION['login'])): ?>
                    <th>Muuda</th>
                    <th>Kustuta</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach (model_get_cars() as $index => $row):
                ?>
                <tr>
                    <form method="post" action="index.php">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                    <td><?= $index + 1 ?></td>
                    <td>
                        <?php
                        if (isset($_SESSION['edit']) && $row['id'] == $_SESSION['edit']): ?>

                                <input type="text" name="brand" placeholder="<?=$row['mark']?>">

                    <?php
                        else: ?>
                        <?= $row['mark'];
                        endif;?>

                    </td>


                    <td>
                        <?php
                        if (isset($_SESSION['edit']) && $row['id'] == $_SESSION['edit']): ?>

                            <input type="text" name="model" placeholder="<?=$row['mudel']?>">

                            <?php
                        else: ?>
                            <?= $row['mudel'];
                        endif;?>

                    </td>

                    <td>
                        <?php
                        if (isset($_SESSION['edit']) && $row['id'] == $_SESSION['edit']): ?>

                            <input type="text" name="year" placeholder="<?=$row['aasta']?>">

                            <?php
                        else: ?>
                            <?= $row['aasta'];
                        endif;?>

                    </td>

                    <td>
                        <?php
                        if (isset($_SESSION['edit']) && $row['id'] == $_SESSION['edit']): ?>

                            <input type="text" name="price" placeholder="<?=$row['hind']?>">

                            <?php
                        else: ?>
                            <?= $row['hind'];
                        endif;?>

                    </td>
                    <td><?= $row['kasutaja'] ?></td>
                    <?php if (isset($_SESSION['login']) && !isset($_SESSION['edit'])): ?>
                    <td>

                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">


                            <div>
                                <button type="submit" class="glyphicon glyphicon-pencil"></button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <div>
                            <form method="post" action="index.php">
                                <input type="hidden" name="action" value="erase">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button class="glyphicon glyphicon-trash" type="submit"></button>
                            </form>
                        </div>

                    </td>
                        <?php
                    endif;
                    if(isset($_SESSION['login']) && isset($_SESSION['edit'])):
                        ?>
                        <td>

                                <input type="hidden" name="action" value="update">
                                <button type="submit" class="btn btn-default back-button">Uuenda</button>
                            </form>
                        </td>
                        <td>
                            <form id="tagasi" method="post" action="index.php">
                                <input type="hidden" name="action" value="back">
                                <button type="submit" class="btn btn-default back-button">Tagasi</button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (isset($_SESSION['login'])): ?>
    <form method="post" action="index.php">

        <input type="hidden" name="action" value="add">
        <input type="hidden" name="username" value="<?= $_SESSION['login']; ?>">

        <div class="container">
            <h2>Lisa auto</h2>

            <p></p>

            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Mark</th>
                        <th>Mudel</th>
                        <th>Aasta</th>
                        <th>Hind €</th>
                    </tr>
                    </thead>
                    <tr></tr>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" name="brand" placeholder="Mark">
                        </td>

                        <td>
                            <input type="text" name="model" placeholder="Mudel">
                        </td>
                        <td>
                            <input type="text" name="year" placeholder="Aasta">
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Aasta">
                        </td>
                    </tbody>
                </table>
            </div>
            <form id="tagasi" method="get" action="view_home.php">
                <button type="submit" class="btn btn-default back-button">Lisa</button>
            </form>
        </div>
    </form>
<?php endif; ?>

</body>

</html>
