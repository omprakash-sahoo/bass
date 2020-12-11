<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'bass');

$conn = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);
if (!$conn) {
	die('could not connect'.mysqli_error());
}
?>