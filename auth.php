<?php 
	$tmp = explode('.', $_SERVER['HTTP_HOST']);
	$subdomain = current($tmp);

	$DB_ADDRESS = "";
    $DB_USER = "";
    $DB_PASS = "";
    $DB_SCHEMA = "";

	// Parsing connection string
	$MYSQL_CONN_STRING = "";
	if ($_SERVER["MYSQL_CONN_STRING"] !== 0) {
		$MYSQL_CONN_STRING = $_SERVER["MYSQL_CONN_STRING"];
	}
	else if ($_ENV["MYSQL_CONN_STRING"] !== 0) {
		$MYSQL_CONN_STRING = $_ENV["MYSQL_CONN_STRING"];
	}

	if ($MYSQL_CONN_STRING !==0 ) {
		$DB_ADDRESS = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
		$DB_SCHEMA = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
		$DB_USER = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
		$DB_PASS = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
	}

	$GLOBAL_DB_ADDRESS = $DB_ADDRESS;
	$GLOBAL_DB_USER = $DB_USER;
	$GLOBAL_DB_PASS = $DB_PASS;
	$GLOBAL_DB_SCHEMA = $DB_SCHEMA;

?>