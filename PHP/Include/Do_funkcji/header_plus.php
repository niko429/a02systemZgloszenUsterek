<?php
    function html(){
?>
    <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="Author" content="Niko">
<?php 
    }
?>
<!-- Spowodować to żeby działało i żeby jakoś się nie psuło z funkcją html, ponieważ gdyż jest ta i ta funkcj to coś powoduje to że ta się psuje i takie tam, idę spać -->
<?php
    function uzytkownik_if(){ 
        if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
            echo "Twórca strony: ".$_SESSION['nick'];
        } else {
            echo "Użytkownik: ".$_SESSION['nick'];
        }
    }
?>