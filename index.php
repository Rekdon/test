<?php
$j = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data.json');
$json_data = json_decode($j, true);

if (isset($_POST['addsTask'])) {
    $value = $_POST['value'];
    $json_data[] = $value;
    file_put_contents(__DIR__ . '/data.json', json_encode($json_data));
    header('Location: ' . '/test/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="data.json"></script>
<body>
<div class="centered">
    <h1>Task List</h1>
    <?php
    foreach ($json_data as $key => $value) {
        ?>
        <div class="checkbox">
            <label class="checkBox" id="check<?= $key ?>">
                <input type="checkbox" onclick="enableCheckBox('check<?= $key ?>')">
                <?= $value ?>
            </label>
        </div>
        <?php
    }
    ?>

    <div class="addTask">
        <h4>Add new task</h4>
        <br>
        Task name:
        <form method="POST">
            <input type="text" name="value"><br><br>
            <button name="addsTask"> Add</button>
        </form>
    </div>
</div>

<script>
    function enableCheckBox(id) {
        document.getElementById(id).style.display = 'none';
        var num = parseInt(id.replace(/\D+/g, ""));
        $.post("script.php", {id: num});
    }

</script>

</body>

</html>