<!DOCTYPE HTML>
<html xmlns=”http://www.w3.org/1999/xhtml”>
    <head>
        <title>Play - Perudo Online</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/dice.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <?php
                    if (isset($_POST['play'])) {
                        require 'mysql.php';
                        $ris= getPlayers();
                    }
                ?>
                <div id="tools">
                    <span>Opzioni:</span>
                    <button id="remove-die">Rimuovi un dato</button>
                    <button id="add-die">Aggiungi un dado</button>
                    <span>(Clicca in qualunque punto per tirare i dadi)</span>
                </div><br><br><br>

                <div id="dice-container">
                    <div class="dice-row">
                        <div class="die-container">
                            <div class="die-spacer"></div>
                            <div class="spin die">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 80 80" >
                                    <rect x="2" y="2" width="76" height="76" rx="18" fill="none" stroke-width="4"/>
                                    <g stroke-width="0" data-die-face>
                                        <circle cx="20" cy="20" r="9" class="die-pip four five six" /> 
                                        <circle cx="20" cy="40" r="9" class="die-pip six" /> 
                                        <circle cx="20" cy="60" r="9" class="die-pip two three four five six" /> 
                                        <circle cx="40" cy="40" r="9" class="die-pip one three five" /> 
                                        <circle cx="60" cy="20" r="9" class="die-pip two three four five six" /> 
                                        <circle cx="60" cy="40" r="9" class="die-pip six" /> 
                                        <circle cx="60" cy="60" r="9" class="die-pip four five six" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>     
            </div><br><br><br>
            <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="./js/dice.js"></script>
    </body>
</html>