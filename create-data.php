<!--

	Author: Austin Hargis
	Creation Date: 6/5/20

-->

<?php
	require_once "./navigation/navigation_bar.php";
	require_once "./connection.php";

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	$query = $connection->prepare("INSERT into `easter_eggs` (user_id) VALUES (?)");
	$query->bind_param("s", $_SESSION["user_data"]["email"]);
	$query->execute();

	header("Location: https://zombiepedia.net/");
?>