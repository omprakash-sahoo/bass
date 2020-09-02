<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'dump');

$conn = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);
if (!$conn) {
	die('could not connect'.mysqli_error());
}
?>