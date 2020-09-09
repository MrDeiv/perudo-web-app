<?php

    if (isset($_POST['deleteMatch'])) {
        require 'mysql.php';
        deleteMatch();
        header("location: /perudo/index.php");
    }

?>