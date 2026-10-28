<?php
    function printheader(string $title = "Logowanie"){
?>
    <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="Author" content="Niko">
            <title><?php echo htmlspecialchars($title); ?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <body>
<?php 
    }

    function user_if(){
        if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
            echo "Twórca strony: ".$_SESSION['nick'];
        } else {
            echo "Użytkownik: ".$_SESSION['nick'];
        }
    }

    function right_baner(){
?>
        </div>
            <div class='prawy_baner'>
                <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
            </div>
        </header>
<?php
    }
?>
