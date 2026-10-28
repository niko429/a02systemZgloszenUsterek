<?php 
function table_add($wynik){
?>
    <table>
        <tr>
            <th>Id.</th>
            <th>Tytuł</th>
            <th>Opis</th>
            <th>Lokalizacja</th>
            <th>Status</th>
            <th>Data</th>
            <th>Autor</th>
        </tr>
    <?php while ($wynik1 = mysqli_fetch_row($wynik)){ ?>
        <tr>
            <td><?= htmlspecialchars($wynik1[0]) ?></td>
            <td><?= htmlspecialchars($wynik1[1]) ?></td>
            <td><textarea disabled class='powieksz'><?= htmlspecialchars($wynik1[2]) ?></textarea></td>
            <td><?= htmlspecialchars($wynik1[3]) ?></td>
            <td><?= htmlspecialchars($wynik1[4]) ?></td>
            <td><?= htmlspecialchars($wynik1[5]) ?></td>
            <td><?= htmlspecialchars($wynik1[6]) ?></td>
        </tr>
    <?php } ?>
    </table>
<?php
}

function tableEdit($wynik){
?>
    <div style='width: 25%; float: left;'>
        <table style='float: left;'>
            <tr>
                <th>Id.</th>
                <th>Tytuł</th>
                <th>Opis</th>
                <th>Lokalizacja</th>
                <th>Status</th>
                <th>Data</th>
                <th>Autor</th>
            </tr>
            <?php while ($wynik1 = mysqli_fetch_row($wynik)){ ?>
                <tr>

                    <td><?= htmlspecialchars($wynik1[0]) ?></td>
                    <td><?= htmlspecialchars($wynik1[1]) ?></td>
                    <td><textarea disabled class='powieksz'><?= htmlspecialchars($wynik1[2]) ?></textarea></td>
                    <td><?= htmlspecialchars($wynik1[3]) ?></td>
                    <td><?= htmlspecialchars($wynik1[4]) ?></td>
                    <td><?= htmlspecialchars($wynik1[5]) ?></td>
                    <td><?= htmlspecialchars($wynik1[6]) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php
}

function editVisuals($sql){
?>
    <div style='float: right; width: 30%;' class='logowanie'>
        <h1 class='logowanie' style='font-size: 250%; width: 200px; margin-bottom: 20px;'>Edycja</h1>
        <form action='editStatus.php' method='POST'>
            <label for='1'>Wprowadź id zgłoszenia: </label>
            <input type='number' name='id' id='1' placeholder='Wprowadź ID:'><br>
            <label for='2'>Status: </label>
            <select id='2' name='status'>
                <option value='1'>Nowe</option>
                <option value='2'>W trakcie</option>
                <option value='3'>Zakończone</option>
            </select><br>
            <input type='submit' value='Zmień' class='guzik_submit'>
        </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']): "";
            $status = isset($_POST['status']) ? htmlspecialchars($_POST['status']): "";
        
            $zapytanie = "UPDATE zglosenia set id_status=? where id=?";
            if ($stmt = mysqli_prepare($sql,$zapytanie)){
                mysqli_stmt_bind_param($stmt, 'si', $status, $id);
                if (mysqli_stmt_execute($stmt)){
                    echo "Edycja powiodła się";
                } else {
                    echo "Edycja nie powiodłą się";
                }
            }
        }
    ?>
    </div>
<?php
}

function tableMyReports($wynik){
?>
    <table>
        <tr>
            <th>Tytuł</th>
            <th>Opis</th>
            <th>Lokalizacja</th>
            <th>Data</th>
        </tr>
    <?php while ($wynik1 = mysqli_fetch_row($wynik)){ ?>
        <tr>
            <td><?= htmlspecialchars($wynik1[0]) ?></td>
            <td><textarea disabled class='powieksz'><?= htmlspecialchars($wynik1[1]) ?></textarea></td>
            <td><?= htmlspecialchars($wynik1[2]) ?></td>
            <td><?= htmlspecialchars($wynik1[3]) ?></td>
        </tr>
    <?php } ?>
    </table>
<?php
}
?>