<?php
    session_start();
    if($nome!="")
        $_SESSION['nome'] = "perudo";
?>

<!DOCTYPE HTML>
<html xmlns=”http://www.w3.org/1999/xhtml”>
    <head>
        <title>Lobby - Perudo Online</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
            <h1 style="color: white">Lobby</h1>
            <?php

                if (isset($_POST['play-button'])) 
                    if ((isset($_POST['username']))) {
                        require "mysql.php";
                        $conn = connect();
                        if (!$conn)
                            echo "
                            <div class=\"alert alert-danger\" role=\"alert\">
                            Impossibile connettersi al database!
                            </div>
                            ";
                        else {
                            if (!matchExists()) {
                                if (!createMatch()) {
                                    echo "
                                    <div class=\"alert alert-danger\" role=\"alert\">
                                    Impossibile creare una partita!
                                    </div>
                                    ";
                                    header("location: /perudo/index.php");
                                } 
                            }
                            if (joinMatch($_POST['username'])) {
                                $players= getPlayers();
                                while($row = $players->fetch_assoc()) 
                                    echo "<div class=\"alert alert-primary\" role=\"alert\">".$row['username']." si è unito alla partita</div>";
                            } else header("location: /perudo/index.php");
                        }
                    } else header("location: /perudo/index.php");
                else header("location: /perudo/index.php");
            ?>
            
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #0bbbe7;">Gioca</h5>
                            <p class="card-text">Avvia la partita a Perudo</p>
                            <form action="play.php" method="POST">
                                <input type="submit" name="play" class="btn btn-primary" value="GIOCA">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: red;">Elimina la partita</h5>
                            <p class="card-text">Eliminando la partita tutti i dati verranno persi</p>
                            <form action="deleteMatch.php" method="POST">
                                <input type="submit" name="deleteMatch" class="btn btn-primary" value="ELIMINA">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>

</html>