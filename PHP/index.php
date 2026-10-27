<?php
    session_start();
    require_once './config.php';
    require_once './Include/header.php';
    naglowek_html();
    $_SESSION['konto_istnieje'] = false;
?>
    <main class="logowanie">
        <div>
            <form method='POST' action='menuZgloszen.php'>
                <label for='1'>Wprowadź nick: </label>
                <input type='text' name='nick' id='1'><br>
                <label for='2'>Wprowadź login: </label>
                <input type='text' name='login' id='2' required><br>
                <label for='3'>Wprowadź hasło: </label>
                <input type='password' name='pass' id='3' required><br>
                <input type='submit' value='Zaloguj' class='guzik_submit'>
           </form>
        </div>
    </main>
<?php 
    require_once './Include/footer.php';
?>
