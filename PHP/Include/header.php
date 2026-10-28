<?php
    function baner_logowanie(){
            include 'Do_funkcji/header_plus.php';
            printheader();
    ?>  
        <header class='logowanie' style='font-size: 300%;'>
            <h1>Zaloguj się</h1>
        </header>
    <?php
    }

    function baner_prac(string $title = "Menu"){
            include 'Do_funkcji/header_plus.php';
            printheader();
    ?>
        <header>
            <div class='lewy_baner'>
                <?php
                    user_if();
                ?>
            <a href='dodaZgloszen.php' class='guzik_banerowy'>Dodaj nowe zgłoszenie</a>
            <a href='mojeZgloszenia.php' class='guzik_banerowy'>Moje zgłoszenia</a>
        <?php 
            right_baner();
        ?>
<?php
    }

    function menu_powrotu_prac(string $title = "Panel pracownika"){
            include 'Do_funkcji/header_plus.php';
            printheader();
    ?>
        <header>
            <div class='lewy_baner'>
                <?php 
                    user_if();
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            <?php 
                right_baner();
            ?>
    <?php
    }

   function baner_tech(string $title = "Menu"){
            include 'Do_funkcji/header_plus.php';
            printheader();
    ?>
        <header>
            <div class='lewy_baner'>
                <?php
                    user_if();
                ?>
                <a href='listaZgloszen.php' class='guzik_banerowy'>Zgłoszenia</a>
                <a href='edycjaStatusu.php' class='guzik_banerowy'>Zmiana statusu zgłoszenia</a>
            <?php 
                right_baner();
            ?>
    <?php
    }

    function menu_powrotu_tech(string $title = "Panel technika"){
            include 'Do_funkcji/header_plus.php';
            printheader();
        ?>
        <header>
            <div class='lewy_baner' style='margin-bottom: 20px;'>
                <?php
                    user_if();
                ?>
                <a href='../PHP/menuZgloszen.php' class='guzik_banerowy'>Menu</a>
            <?php 
                right_baner();
            ?>
    <?php
    }
?>