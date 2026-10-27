<?php
    function baner_logowanie(string $tytul = "Logowanie"){
            include 'Do_funkcji/header_plus.php';
            html();
    ?> 
            <title><?php echo htmlspecialchars($tytul); ?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <body>
        <header class='logowanie' style='font-size: 300%;'>
            <h1>Zaloguj się</h1>
        </header>
    <?php
    }

    function baner_prac(string $tytul = "Menu"){
            include 'Do_funkcji/header_plus.php';
            html();
    ?>
            <title><?php echo htmlspecialchars($tytul)?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <body>
        <header>
        <div class='lewy_baner'>
        <?php
            if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
                echo "Twórca strony: ".$_SESSION['nick'];
            } else {
                echo "Użytkownik: ".$_SESSION['nick'];
            }
        ?>
        <a href='dodaZgloszen.php' class='guzik_banerowy'>Dodaj nowe zgłoszenie</a>
        <a href='mojeZgloszenia.php' class='guzik_banerowy'>Moje zgłoszenia</a>
        </div>
        <div class='prawy_baner'>
            <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
        </div>
        </header>
<?php
    }

    function menu_powrotu_prac(string $tytul = "Panel pracownika"){
            include 'Do_funkcji/header_plus.php';
            html();
    ?>
            <title><?php echo htmlspecialchars($tytul)?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <body>
        <header>
            <div class='lewy_baner'>
                <?php 
                if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
                    echo "Twórca strony: ".$_SESSION['nick'];
                } else {
                    echo "Użytkownik: ".$_SESSION['nick'];
                }
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            </div>
            <div class='prawy_baner'>
                <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
            </div>
        </header>
    <?php
    }
   function baner_tech(string $tytul = "Menu"){
            include 'Do_funkcji/header_plus.php';
            html();
    ?>
            <title><?php echo htmlspecialchars($tytul); ?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <header>
            <div class='lewy_baner'>
                <?php
                if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
                    echo "Twórca strony: ".$_SESSION['nick'];
                } else {
                    echo "Użytkownik: ".$_SESSION['nick'];
                }
                ?>
                <a href='listaZgloszen.php' class='guzik_banerowy'>Zgłoszenia</a>
                <a href='edycjaStatusu.php' class='guzik_banerowy'>Zmiana statusu zgłoszenia</a>
            </div>
            <div class='prawy_baner'>
                <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
            </div>
        </header>
    <?php
    }

    function menu_powrotu_tech(string $tytul = "Panel technika"){
            include 'Do_funkcji/header_plus.php';
            html();
        ?>
            <title><?php echo htmlspecialchars($tytul);?></title>
            <link rel="stylesheet" href="../CSS/styl.css">
        </head>
        <body>
        <header>
            <div class='lewy_baner' style='margin-bottom: 20px;'>
                <?php
                if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
                    echo "Twórca strony: ".$_SESSION['nick'];
                } else {
                    echo "Użytkownik: ".$_SESSION['nick'];
                }
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            </div>
            <div class='prawy_baner'>
                <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
            </div>
        </header>
    <?php
    }
?>