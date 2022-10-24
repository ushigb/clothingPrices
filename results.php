<?php
$pageTitle = 'Списък';
include 'functions.php';
include 'session.php';
include 'header.php';

include 'groups.php';
?>

<div class= "conteiner-fluid">
    <div class="row">

        <div class= "col-4 col-12">
            <a href="form.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Добави разход</a>
        </div>
        <div class= "col-4 col-12">
            <form method="get">
                <a href="logOut.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Log out</a>
        </div>	
        <div>
            <select name="group">
                <option value="0">Всички</option>
                <?php
                foreach ($group as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="btn btn-secondary">Филтрирай</button>
        </div>

        </form>

    </div>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>

            <th scope="col">Цена</th>
            <th scope="col">Продукт</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (file_exists('data.txt')) {
                $result = file('data.txt');
                $totalSum = 0;
                foreach ($result as $value) {
                    $columns = explode('!', $value);
                    if (isset($_GET['group']) && $_GET['group'] > 0 && (int) $_GET['group'] != (int) $columns[1]) {
                        continue;
                    }
                    $totalSum += $columns[0];

                    echo '<tr>
        <td>' . number_format($columns[0], 2, '.', '') . '</td>
        <td>' . $group[trim($columns[1])] . '</td>
        </tr>';
                }
                echo '<tr><td>' . number_format($totalSum, 2, '.', '') . '</td><td>ВСИЧКО</td></tr>';
            }
            ?>
        </tr>
    </tbody>
</table>
<?php
include 'footer.php';







