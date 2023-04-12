<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Account</title>
    <?php
        require_once "./navigation/navigation_bar.php";
        require_once "./connection.php";

        // delete all user data if the user pushes the "Delete" button
        if (isset($_POST["deleteAccount"])){

            $email = mysqli_real_escape_string($connection, $_SESSION["user_data"]["email"]);

            $result = $connection->prepare("SELECT `password` FROM `users` WHERE `email` = '" . $email . "'");
            $result->execute();
            $result->store_result();
            $result->bind_result($databasePassword);
            $result->fetch();

            // delete the user's account if their password is correct
            if (password_verify($_POST["userPassword"], $databasePassword)){
                $query = "DELETE FROM `users` WHERE `email` = '" . $_SESSION["user_data"]["email"] . "'";
                $result = $connection->query($query);
                if (!$result) echo "DELETE failed: $query <br>";

                $query = "DELETE FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'";
                $result = $connection->query($query);
                if (!$result) echo "DELETE failed: $query <br>";

                $message = ("Your account has been deleted. You will now be redirected to the Home screen.");
                echo "<script type = 'text/javascript'>alert(\"$message\"); window.location.href = \"https://zombiepedia.net/navigation/logout.php\"</script>";
            }
            else {
                $message = ("Your password is incorrect. Your account has not been deleted. Please try again.");
                echo "<script type = 'text/javascript'>alert(\"$message\"); window.location.href = \"https://zombiepedia.net/navigation/logout.php\"</script>";
            }
        }

        // saves the user's settings
        if (isset($_POST["saveSettings"])){

            $displayTips = mysqli_real_escape_string($connection, $_POST["displayTips"]);
            $sendEmails = mysqli_real_escape_string($connection, $_POST["sendEmails"]);
            $darkMode = mysqli_real_escape_string($connection, $_POST["darkMode"]);

            // I know this is a really poor way of doing this
            // in my defense, it was 11:45pm and I had been up for about 16 hours or so at this point
            if (isset($_POST["displayTips"])){
                $query = "UPDATE `users` SET `displayTips` = '$displayTips' WHERE `email` = '" . $_SESSION["user_data"]["email"] . "'; ";
                $_SESSION["user_data"]["displayTips"] = $_POST["displayTips"];
                $connection->query($query);
                $_SESSION["user_data"]["displayTips"] = $_POST["displayTips"];
            }
            if (isset($_POST["sendEmails"])){
                $query = "UPDATE `users` SET `sendEmails` = '$sendEmails' WHERE `email` = '" . $_SESSION["user_data"]["email"] . "';";
                $_SESSION["user_data"]["sendEmails"] = $_POST["sendEmails"];
                $connection->query($query);
                $_SESSION["user_data"]["sendEmails"] = $_POST["sendEmails"];
            }
            if (isset($_POST["darkMode"])){
                $query = "UPDATE `users` SET `darkMode` = '$darkMode' WHERE `email` = '" . $_SESSION["user_data"]["email"] . "';";
                $_SESSION["user_data"]["darkMode"] = $_POST["darkMode"];
                $connection->query($query);

            }
            $message = ("Your settings have been updated and saved. You may have to log out and log back in to see any changes.");
            echo "<script type = 'text/javascript'>alert(\"$message\")</script>";
            header("Location: https://zombiepedia.net/user-account.php");
        }

        // changes the user's password if they fill out the change password form
        if (isset($_POST["userChangePassword"])){

            $email = mysqli_real_escape_string($connection, $_SESSION["user_data"]["email"]);

            $result = $connection->prepare("SELECT `password` FROM `users` WHERE `email` = '" . $email . "'");
            $result->execute();
            $result->store_result();
            $result->bind_result($databasePassword);
            $result->fetch();

            // verify that the user knows the old password
            if (password_verify($_POST["oldPassword"], $databasePassword)){

                // verify that the user's new passwords match
                if ($_POST["newPassword"] == $_POST["newPasswordConfirm"]){
                    $hashPass = password_hash($_POST["newPasswordConfirm"], PASSWORD_DEFAULT);
                    $query = "UPDATE `users` SET `password` = '" . $hashPass . "' WHERE `email` = '" . $_SESSION["user_data"]["email"] . "'";
                    $connection->query($query);

                    $message = ("Your password has been updated!");
                    echo "<script type = 'text/javascript'>alert(\"$message\")</script>";
                }
                // incorrect new passwords error message
                else {
                    $message = ("Your new passwords don't match. Please try again.");
                    echo "<script type = 'text/javascript'>alert(\"$message\")</script>";
                }
            }
            // incorrect old password error
            else {
                $message = ("Your old password is incorrect. Please try again.");
                echo "<script type = 'text/javascript'>alert(\"$message\")</script>";
            }
        }


    ?>

    <body>
        <div class = "scrollArea">
            <h2>Manage Account</h2>

            <div class = "accountTable">
                <hr><h3>Account Information</h3>
                <table>
                <?php
                    echo "<tr><td>First Name: </td><td>" . $_SESSION["user_data"]["firstName"] . "</td></tr>";
                    echo "<tr><td>Last Name: </td><td>" . $_SESSION["user_data"]["lastName"] . "</td></tr>";
                    echo "<tr title='The name that will be displayed on comments and posts in future features'><td>Display Name: </td><td>" . $_SESSION["user_data"]["displayName"] . "</td></tr>";
                    echo "<tr title='The email you use to log into your account'><td>Email: </td><td>" . $_SESSION["user_data"]["email"] . "</td></tr>";
                    echo "<tr><td>Account Type: </td><td>" . $_SESSION["user_data"]["type"] . "</td></tr>";
                ?>
                </table>

                <!--account settings-->
                <hr><h3>Account Settings</h3>
                <form action = "./user-account.php" method = "post">
                    <table>
                        <tr>
                            <td title="Toggles the theme from dark/light">Enable Dark Mode:</td>
                            <?php
                            if ($_SESSION["user_data"]["darkMode"] == "TRUE"){
                                echo "<td><input type = \"radio\" name = \"darkMode\" value = \"TRUE\" checked>Enabled</td> <td><input type = \"radio\" name = \"darkMode\" value = \"FALSE\">Disabled</td>";
                            }
                            else {
                                echo "<td><input type = \"radio\" name = \"darkMode\" value = \"TRUE\">Enabled</td> <td><input type = \"radio\" name = \"darkMode\" value = \"FALSE\" checked>Disabled</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td title="Toggles the banner on the home page">Display Tips:</td>
                            <?php
                                if ($_SESSION["user_data"]["displayTips"] == "TRUE"){
                                    echo "<td><input type = \"radio\" name = \"displayTips\" value = \"TRUE\" checked>Enabled</td> <td><input type = \"radio\" name = \"displayTips\" value = \"FALSE\">Disabled</td>";
                                }
                                else {
                                    echo "<td><input type = \"radio\" name = \"displayTips\" value = \"TRUE\">Enabled</td> <td><input type = \"radio\" name = \"displayTips\" value = \"FALSE\" checked>Disabled</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td title="Allows the sending of optional emails, such as when a blog post is released">Send Emails:</td>
                            <?php
                                if ($_SESSION["user_data"]["sendEmails"] == "TRUE"){
                                    echo "<td><input type = \"radio\" name = \"sendEmails\" value = \"TRUE\" checked>Enabled</td> <td><input type = \"radio\" name = \"sendEmails\" value = \"FALSE\">Disabled</td>";
                                }
                                else {
                                    echo "<td><input type = \"radio\" name = \"sendEmails\" value = \"TRUE\">Enabled</td> <td><input type = \"radio\" name = \"sendEmails\" value = \"FALSE\" checked>Disabled</td>";
                                }
                            ?>
                        </tr>
                    </table>
                    <br><input type = "submit" value = "SAVE SETTINGS" name = "saveSettings">
                </form>

                <!--change password form-->
                <hr><h3>Change Password</h3>
                <form action = "./user-account.php" method = "post">
                    <table>
                        <tr>
                            <td>Old Password: </td>
                            <td><input type = "password" name = "oldPassword" required></td>
                        </tr>
                        <tr>
                            <td>New Password: </td>
                            <td><input type = "password" name = "newPassword" minlength = "8" required></td>
                        </tr>
                        <tr>
                            <td>Confirm Password: </td>
                            <td><input type = "password" name = "newPasswordConfirm" minlength = "8" required></td>
                        </tr>
                    </table>
                    <br><input type = "submit" value = "CHANGE PASSWORD" name = "userChangePassword">
                </form>

                <!--delete account form-->
                <hr><h3>Delete Account</h3>
                <form action = "./user-account.php" method = "post">
                    <table>
                        <tr>
                            <td>Enter Password: </td>
                            <td><input type = "password" name = "userPassword" required></td>
                        </tr>
                    </table>
                    <br><input title="Account deletion CANNOT be undone" type = "submit" value = "CONFIRM ACCOUNT DELETION" name = "deleteAccount">
                </form>
            </div>
        </div>
    </body>
    <?php
        require_once "./navigation/footer.php";
    ?>
</html>