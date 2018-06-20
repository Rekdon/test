<?php
$j = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data.json');
$json_data = json_decode($j, true);

$id = $_POST['id'];
echo $id;

unset($json_data[$id]);
var_export($json_data);
file_put_contents(__DIR__ . '/data.json', json_encode($json_data));
