<?php
include "conexion.php";
include "funciones.php";
//Includes class
include('FKMySQLDump.php');

//Connects to mysql server
$connessione = @mysql_connect($db_host,$db_usuario,$db_password);

//Set encoding
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");




//Creates a new instance of FKMySQLDump: it exports without compress and base-16 file
$dumper = new FKMySQLDump($db_nombre,'backup/db-backup.sql',false,false);

$params = array(
   'skip_structure' => TRUE,
   //'skip_data' => TRUE,
);

//Make dump
$dumper->doFKDump($params);

echo"<script language='javascript'>window.location='logout.php'</script>"

?>