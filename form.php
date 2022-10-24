<?php
mb_internal_encoding('UTF-8');
$pageTitle = 'Форма';
include 'functions.php';
include 'session.php';
include 'header.php';
include 'groups.php';


if ($_POST) {

    $sum = trim($_POST['sum']);
    $sum = floatval(str_replace(',', '.', $_POST['sum']));
    $selectedGroup = (int) $_POST['group'];
    $error = FALSE;


    if ($sum <= 0) {
        echo 'невалидна стойнос';
        $error = TRUE;
    }
    if (!array_key_exists($selectedGroup, $group)) {
        echo '<p>Невалидна група</p>';
        $error = TRUE;
    }
    if (!$error) {
        $result = $sum . '!' . $selectedGroup . PHP_EOL;
        if (file_put_contents('data.txt', $result, FILE_APPEND)) {
            echo 'Записа е успешен';
        }
    }
}
?>
<div class= "container-fluid">
    <div class="row">
        <div class="float-sm-left">
            <a href="results.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Списък</a>
            <form method="POST">
                <div id="head">Количество:<input type="text" name="sum"></div>
                <div>
                    <select name="group">
                        <?php
                        foreach ($group as $key => $value) {
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>      
        </div>
    </div>
    <button type="submit" class="btn btn-secondary">Добави</button>
    <a href="logOut.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Log out</a>
</form>
</div>
<?php
include 'footer.php';
