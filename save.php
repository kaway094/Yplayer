<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}
$data = json_decode(file_get_contents("data/channels.json"), true);
foreach ($_POST as $key => $value) {
    list($section, $name) = explode("||", $key);
    $data[$section][$name] = $value;
}
file_put_contents("data/channels.json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
header("Location: dashboard.php");
exit;
?>