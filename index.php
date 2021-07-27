<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once(realpath("library/SafeViwe.php"));
include_once(realpath("library/Safe.php"));
include_once(realpath("library/Connector.php"));
include_once(realpath("library/Timer.php"));
include_once("library/Data.php");
include_once("library/Processor.php");
include_once("library/Variant.php");
include_once("library/Password.php");

$connector = new ConnectDB("test", "test", "test", "mysql");
$password = new Password(11);
$safe = new Safe($connector, $password);

$variant = new Variant();
$processor = new Processor($safe, $variant);
print_r("Перебрали: ".$processor->attempts());


?>
