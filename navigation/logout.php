<!--

	Author: Austin Hargis
	Creation Date: 6/5/20

-->

<?php

	session_start();

	// if a session already exists, delete all session information in order to log the user out
	if (isset($_SESSION)){
	    $_SESSION["visited"] = FALSE;
		session_unset();
		session_destroy();
	}

	// redirect the user to the account page in order to perform login/logout/register
	header("Location: https://zombiepedia.net/");

?>