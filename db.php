<?php #db.php

date_default_timezone_set("ASIA/KOLKATA");

$rec_initial_start = 1;
$rec_final_end = 500;

 $serverName = "Your-server-name"; //serverName\instanceName
 $serverUser = "your-server-user";
 $serverPass = "your-password";
 $serverDatabase = "your-database";



 $host = "localhost";
 $user = "root";
 $pass = "";
 $database = "your-other-database";



function mssql_db_connect($passed_serverName,$passed_userName,$passed_password, $passed_database)
{
	global $con_ms;

	$serverName = $passed_serverName; //serverName\instanceName

	$connectionInfo = array( "Database"=>"$passed_database", "UID"=>"$passed_userName", "PWD"=>"$passed_password");
	//$connectionInfo = array( "Database"=>"test");
	$con_ms = sqlsrv_connect( $serverName, $connectionInfo);

	if( $con_ms ) 
	{
	     echo "MSSQL-SERVER Connection established.<br />";
	}
	else
	{
	     echo "MSSQL-SERVER  Connection could not be established.<br />";
	     die( print_r( sqlsrv_errors(), true));
	}
}


function mssql_db_close()
{
	global $con_ms;

	sqlsrv_close($con_ms);
}
//-------------------------------------------------------------------------------


function mysql_db_connect($passed_host,$passed_user,$passed_pass, $passed_dbname)
{
	global $con_mysql;

	$con_mysql = mysqli_connect("$passed_host", "$passed_user", "$passed_pass", "$passed_dbname");
	if( $con_mysql ) 
	{
	     echo "MySQL Connection established.<br />";
	}
	else
	{
	     echo "MySQL  Connection could not be established.<br />";
	     die( print_r( mysqli_errors(), true));
	}
}



function mysql_db_close()
{
	global  $con_mysql;

	mysqli_close($con_mysql);

}


?>
