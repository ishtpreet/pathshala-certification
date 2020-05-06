<?php
require_once 'config.php';

if (isset($_POST["name"]) && isset($_POST["certnumber"])) {
    session_start();
    $name = $_POST["name"];
    $name = strtolower($name);
    $serial = $_POST["certnumber"];
    $event = $_POST["radio"];
    $_SESSION['certnumber'] = $serial;
    $_SESSION['event'] = $event;
    $result = mysql_query("SELECT * FROM $event WHERE `name`= '".$name."' and `cert number`='".$serial."'") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }
}
?>
