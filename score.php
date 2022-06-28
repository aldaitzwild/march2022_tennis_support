<?php

    session_start();

    if(isset($_GET['destroy']))
        session_destroy();

    require_once('Player.php');

    $p1 = new Player();
    $p2 = new Player();

    if(isset($_SESSION['p1']) && isset($_SESSION['p2'])) {
        $p1 = unserialize($_SESSION['p1']);
        $p2 = unserialize($_SESSION['p2']);
    }
    

    if(isset($_GET['point'])) {
        if($_GET['point'] == 'p1') $p1->addPoint($p2);
        if($_GET['point'] == 'p2') $p2->addPoint($p1);
    }


    $_SESSION['p1'] = serialize($p1);
    $_SESSION['p2'] = serialize($p2);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score de tennis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-evenly mt-5">
            <div class="col-3 text-center border border-5 rounded p-3">
                <h2 class="">Joueur 1</h2>
                <img src="https://i.pravatar.cc/200?img=3">
                <ul class="fs-3 text-start mt-3">
                    <li>Point : <?= $p1->points ?><span class="text-danger"><?= $p1->advantage ?></span></li>
                    <li>Jeu : <?= $p1->games ?></li>
                    <li>Set : <?= $p1->sets ?></li>
                </ul>

                <p>
                    <a href="score.php?point=p1">
                        <button>Point !</button>
                    </a>
                </p>

            </div>

            <div class="col-3 text-center border border-5 rounded p-3">
                <h2 class="">Joueur 2</h2>
                <img src="https://i.pravatar.cc/200?img=8">
                <ul class="fs-3 text-start mt-3">
                    <li>Point : <?= $p2->points ?><span class="text-danger"><?= $p2->advantage ?></span></li>
                    <li>Jeu : <?= $p2->games ?></li>
                    <li>Set : <?= $p2->sets ?></li>
                </ul>

                <p>
                    <a href="score.php?point=p2">
                        <button>Point !</button>
                    </a>
                </p>
            </div>
        </div>

    </div>

</body>

</html>