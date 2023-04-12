<!--

	Author: Austin Hargis
	Creation Date: 5/24/20

-->

<html>
    <title>Zombiepedia - Register</title>
    <?php
        require_once "./navigation/navigation_bar.php";
        require_once "./connection.php";

        $defaultTipsDisplay = "TRUE";
        $defaultSendEmails = "FALSE";
        $defaultUserAttribute = "user";
        $defaultDarkMode = "TRUE";

        // handles all code for creating a user account
        if (isset($_POST["accountRegister"])){

            $testGivenEmail = $connection->prepare("SELECT * FROM `users` WHERE `email` = '" . $_POST["userEmail"] . "'");
            $testGivenEmail->execute();
            $testGivenEmail->store_result();

            // alerts the user if their desired username is already taken
            if ($testGivenEmail->num_rows >= 1){
                $message = ("An account with that email already exists. Please login or create an account with a different email.");
                echo "<script type = 'text/javascript'>alert('$message');</script>";
            }

            // begins account creation if an account with that email does not exist
            else {

                $testGivenUsername = $connection->prepare("SELECT * FROM `users` WHERE `displayName` = '" . $_POST["userDisplayName"] . "'");
                $testGivenUsername->execute();
                $testGivenUsername->store_result();

                // test if the given username exists or not
                if ($testGivenUsername->num_rows >= 1){
                    $message = ("An account with that username already exists. Please login or create an account with a different username.");
                    echo "<script type = 'text/javascript'>alert('$message');</script>";
                }

                // if the given username does not exist, let the user create an account with that username
                else {

                    // verify that the user's password matches
                    if ($_POST["userPassword"] == $_POST["userPasswordVerify"]){
                        $hashPassword = password_hash($_POST["userPassword"], PASSWORD_DEFAULT); // salts and hashes the user's password

                        $query = $connection->prepare("INSERT into `users` (firstName, lastName, displayName, email, password, type, displayTips, sendEmails, darkMode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                        $firstName = mysqli_real_escape_string($connection, $_POST["userFirstName"]);
                        $lastName = mysqli_real_escape_string($connection, $_POST["userLastName"]);
                        $displayName = mysqli_real_escape_string($connection, $_POST["userDisplayName"]);
                        $email = mysqli_real_escape_string($connection, $_POST["userEmail"]);

                        $query->bind_param("ssssssss", $firstName, $lastName, $displayName, $email, $hashPassword, $defaultUserAttribute, $defaultTipsDisplay, $defaultSendEmails, $defaultDarkMode);
                        $query->execute();
                        // verify that the query was successful, if not, display the error
                        if ($query->affected_rows == 0){
                            echo "INSERT failed: $query<br>";
                            echo $query->error;
                        }
                        // if the query was successful, log the user into their account
                        else {
                            $_SESSION["user_data"] = array(
                                "firstName" => $_POST["userFirstName"],
                                "lastName" => $_POST["userLastName"],
                                "displayName" => $_POST["userDisplayName"],
                                "email" => $_POST["userEmail"],
                                "type" => $defaultUserAttribute,
                                "displayTips" => $defaultTipsDisplay,
                                "sendEmails" => $defaultTipsDisplay,
                                "darkMode" => $darkMode,
                            );

                            // send an email to myself about new user accounts
                            $from = "contact@zombiepedia.net";
                            $to = "contact@zombiepedia.net";
                            $subject = "New User";
                            $content = "A new user " . $_POST["userFirstName"] . " (" . $_POST["userDisplayName"] . ") was created!";
                            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n  From: Zombiepedia";
                            mail($to, $subject, $content, $headers);

                            // send an email to the user thanking them for creating an account
                            $to = $_POST["userEmail"];
                            $subject = "Welcome to Zombiepedia.net!";
                            $content = "<h1>Hello " . $_POST["userFirstName"] . "!</h1> 
                                        <p>Thank you for registering at Zombiepedia.net! Our website is still early in the stages of development and we appreciate you taking the time to register for an account. By registering, you're helping us improve our content.
                                        To keep up to date with the latest information regarding Zombiepedia.net, please join us in our <a href = \"https://discord.gg/bQakA7X\">Discord</a>. All feedback is welcome and will
                                        result in a much better user experience over all. <br><br>Thank you, <br>- Austin</p>";
                            mail($to, $subject, $content, $headers);

                            $message = ("Account creation was successful! You will now be logged in.");
                            echo "<script type = 'text/javascript'>alert('$message'); window.location.href = 'https://zombiepedia.net/create-data.php'</script>";
                        }
                    }
                    // inform the user that their passwords don't match
                    else {
                        $message = ("Your passwords do not match. Please try again.");
                        echo "<script type = 'text/javascript'>alert('$message');</script>";
                    }
                }
            }
        }
    ?>

    <body>
        <div class = "accountField">
            <form action = "./user-register.php" method = "post">
                <h2>Register</h2>

                <table>
                    <tr>
                        <td>First Name: </td>
                        <?php
                            if (isset($_POST["userFirstName"])){
                                echo "<td><input type = \"text\" name = \"userFirstName\" value = \"$_POST[userFirstName]\" required></td>";
                            }
                            else {
                                echo "<td><input type = \"text\" name = \"userFirstName\" required></td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <?php
                            if (isset($_POST["userLastName"])){
                                echo "<td><input type = \"text\" name = \"userLastName\" value = \"$_POST[userLastName]\" required></td>";
                            }
                            else {
                                echo "<td><input type = \"text\" name = \"userLastName\" required></td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <?php
                            if (isset($_POST["userDisplayName"])){
                                echo "<td><input type = \"text\" name = \"userDisplayName\" value = \"$_POST[userDisplayName]\" required></td>";
                            }
                            else {
                                echo "<td><input type = \"text\" name = \"userDisplayName\" required></td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <?php
                            if (isset($_POST["userEmail"])){
                                echo "<td><input type = \"text\" name = \"userEmail\" value = \"$_POST[userEmail]\" required></td>";
                            }
                            else {
                                echo "<td><input type = \"text\" name = \"userEmail\" required></td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type = "password" name = "userPassword" minlength = "8" required></td>
                    </tr>
                    <tr>
                        <td>Password (confirm):</td>
                        <td><input type = "password" name = "userPasswordVerify" minlength = "8" required></td>
                    </tr>
                </table>

                <br><input type = "submit" value = "Register" name = "accountRegister">
                <p align="center">Already have an account? <a href = "https://zombiepedia.net/user-login.php">Login Now</a></p>
            </form>
        </div>
    </body>
    <?php
        require_once "./navigation/footer.php";
    ?>
</html>