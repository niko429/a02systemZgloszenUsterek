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
                    uzytkownik_if();
                ?>
            <a href='dodaZgloszen.php' class='guzik_banerowy'>Dodaj nowe zgłoszenie</a>
            <a href='mojeZgloszenia.php' class='guzik_banerowy'>Moje zgłoszenia</a>
            <?php 
                prawy_baner();
            ?>
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
                    uzytkownik_if();
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            <?php 
                prawy_baner();
            ?>
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
                    uzytkownik_if();
                ?>
                <a href='listaZgloszen.php' class='guzik_banerowy'>Zgłoszenia</a>
                <a href='edycjaStatusu.php' class='guzik_banerowy'>Zmiana statusu zgłoszenia</a>
            <?php 
                prawy_baner();
            ?>
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
                    uzytkownik_if();
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            <?php 
                prawy_baner();
            ?>
    <?php
    }
?>