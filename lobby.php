<html>
    <head>
        <title>Lobby</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
            <?php
                if (isset($_POST['play-button']))
                    if (isset($_POST['username']))
                     echo $_POST['username'];
                else header("location: /index.php");
            ?>
        </div>
    </body>

</html>