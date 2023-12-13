<?php
ini_set('display_errors',1);

$host = 'mysql-belgrand.alwaysdata.net';
$user = 'belgrand_expcond';
$passwd = '^6grHbhp#wDe_vzK';
$bd = 'belgrand_experiencecond';

$link = mysqli_connect($host, $user, $passwd, $bd);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $link = mysqli_connect($host, $user, $passwd, $bd);
} catch (mysqli_sql_exception $e) {
    echo "MySQLi Error Code: " . $e->getCode()  ."<br />";
    echo "Exception Msg: " . $e->getMessage();
}
/*
if(!$link){
    echo "Erreur: ".mysqli_connect_errno()."<br>";
    echo "MSG: ".mysqli_connect_error()."<br>";
}*/
