<!--

	Author: Austin Hargis
	Creation Date: 5/24/20

-->

<html>
    <title>Zombiepedia - Login</title>
	<?php
		require_once "./navigation/navigation_bar.php";
		require_once "./connection.php";

		if (isset($_POST["accountLogin"])){

		    $email = mysqli_real_escape_string($connection, $_POST["userEmail"]);

			$getUserAccount = $connection->prepare("SELECT * FROM `users` WHERE `email` = '" . $email . "'");
			$getUserAccount->execute();
			$getUserAccount->store_result();

			// verify that an account with that email address exists 
			if ($getUserAccount->num_rows == 0){
                $message = ("The provided email or password is incorrect. Please try again.");
                echo "<script type = 'text/javascript'>alert(\"$message\");</script>";
			}
			else {
				$getUserAccount->bind_result($firstName, $email, $hashPass, $type, $lastName, $displayName, $displayTips, $sendEmails, $lastDate, $darkMode);
				$getUserAccount->fetch();

				// executed if the database password matches the user-given password
				if (password_verify($_POST["userPassword"], $hashPass)){
					$_SESSION["user_data"] = array(
						"firstName" => $firstName,
						"lastName" => $lastName,
						"displayName" => $displayName,
						"email" => $email,
						"type" => $type,
                        "displayTips" => $displayTips,
                        "sendEmails" => $sendEmails,
                        "lastDate" => $lastDate,
                        "darkMode" => $darkMode,
					);
					header("Location: https://zombiepedia.net/");
				}
				// if the passwords do not match
				else {
					$message = ("The provided email or password is incorrect. Please try again.");
					echo "<script type = 'text/javascript'>alert(\"$message\");</script>";
				}
			}
		}
	?>

	<body>

		<div class = "accountField">
			<form action = "./user-login.php" method = "post">
				<h2>Login</h2>

				<table>
					<tr>
						<td>Email:</td>
                        <?php
                            if (isset($_POST["userEmail"])){
                                echo "<td><input type = \"email\" name = \"userEmail\" value = \"$_POST[userEmail]\"required></td>";
                            }
                            else {
                                echo "<td><input type = \"email\" name = \"userEmail\" required></td>";
                            }
                        ?>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type = "password" name = "userPassword" required></td>
					</tr>
				</table>

				<br><input type = "submit" value = "Login" name = "accountLogin">
                <p align="center">Don't have an account? <a href = "https://zombiepedia.net/user-register.php">Register Now</a></p>
			</form>
		</div>
	</body>
	<?php
		require_once "./navigation/footer.php";
	?>
</html>