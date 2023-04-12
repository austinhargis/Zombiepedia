<!--

	Author: Austin Hargis
	Creation Date: 8/25/20

-->

<html>
    <title>Zombiepedia - Feedback</title>
    <?php
        require_once "./navigation/navigation_bar.php";
        require_once "./connection.php";

        if (isset($_POST["submitFeedback"])){
            $currentUser = $_SESSION["user_data"]["firstName"] . " " . $_SESSION["user_data"]["lastName"];
            $currentDate = date("m/d/Y");
            $currentTime = date("H:i:s");
            $feedbackStatusDefault = "OPEN";

            $feedbackType = mysqli_escape_string($connection, $_POST["feedbackType"]);
            $feedbackDescription = mysqli_escape_string($connection, $_POST["feedbackDescription"]);
            $contactOnFeedback = mysqli_escape_string($connection, $_POST["contactOnFeedback"]);

            $query = $connection->prepare("INSERT INTO `user_feedback` (feedbackType, feedbackDescription, feedbackDate, feedbackTime, feedbackCreator, feedbackContact, feedbackCreatorEmail, feedbackStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $query->bind_param("ssssssss", $feedbackType, $feedbackDescription, $currentDate, $currentTime, $currentUser, $contactOnFeedback, $_SESSION["user_data"]["email"], $feedbackStatusDefault);
            $query->execute();

            $message = ("Your feedback has been submitted. If you opted into being contacted about your feedback, you should hear back soon. Thank you!");
            echo "<script type = 'text/javascript'>alert('$message');</script>";
        }
    ?>

    <body>

        <div class = "scrollArea">
            <?php

                // verify that the user is logged in before giving them the forum
                if (isset($_SESSION["user_data"])){
                    if ($_SESSION["user_data"]["type"] == "user"){
                        echo <<< _END
                            <h2>Feedback Reporter</h2>
                            <p>We appreciate you taking the time to leave feedback on our website. In order to log your feedback, we must first ask you a few questions.</p>
                            <form action = "https://zombiepedia.net/feedback.php" method = "post">
                                <table>
                                    <tr>
                                        <td>What type of feedback are you submitting?</td>
                                        <td><select name = "feedbackType">
                                            <option value = "n/a"></option>
                                            <option value = "bug">Bug</option>
                                            <option value = "suggestion">Suggestion</option>
                                            <option value = "other">Other</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>Feedback Description:</td>
                                        <td><textarea name = "feedbackDescription" rows = "15" cols = "50"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Can we contact you about your feedback?</td>
                                        <td><select name = "contactOnFeedback">
                                            <option value = "n/a"></option>
                                            <option value = "yes">Yes</option>
                                            <option value = "no">No</option>
                                        </select></td>
                                    </tr>
                                </table>
                                <br><input type = "submit" value = "Submit" name = "submitFeedback">
                            </form>
_END;

                    }
                    else if ($_SESSION["user_data"]["type"] == "admin") {
                        $result = $connection->query("SELECT * FROM `user_feedback` ORDER BY `feedbackID` DESC");
                        if (!$result) die ("Query failed" . $connection->error);
                        echo "<h2>User Feedback</h2>";
                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                            <hr>   
                            <p>Feedback Type: $row[feedbackType]<br><br>$row[feedbackDescription]</p>
                            <table>
                                <tr>
                                    <td>Feedback Creator:</td>
                                    <td>$row[feedbackCreator]</td>
                                </tr>
                                <tr>
                                    <td>Creator Email:</td>
                                    <td>$row[feedbackCreatorEmail]</td>
                                </tr>
                                <tr>
                                    <td>Can Contact Creator?:</td>
                                    <td>$row[feedbackContact]</td>
                                </tr>
                                <tr>
                                    <td>Date/Time:</td>
                                    <td>$row[feedbackDate] @ $row[feedbackTime]</td>
                                </tr>
                                <tr>
                                    <td>Feedback Status:</td>
                                    <td>$row[feedbackStatus]</td>
                                </tr>
                            </table>                                          
_END;
                        }
                    }
                }
                else {
                    echo "<h2>Please Register or Login</h2>";
                    echo "<p>Your feedback means a lot to us, but in order to leave any, you must create an account or log in to an existing account. If you don't wish to do this, you can always reach us by email.";
                }
            ?>
        </div>

    </body>

</html>
