<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia</title>
	<?php
		require_once "./navigation/navigation_bar.php";
		require_once "./connection.php";
	?>

	<body>
			<?php
				$currentDate = date("F d, Y");
				$defaultVisibility = intval(false);
				$defaultNotification = intval(false);

				if (isset($_POST["hidePost"])){
				    // perform query to obtain the value from the visibility column
                    $query = ("SELECT `PostTitle`, `PostContent`, `PostVisibility`, `PostNotificationSent` FROM `BlogPosts` WHERE `PostID` = '" . $_POST["postID"] . "'");
                    $result = $connection->query($query);

                    // assign the query result to a variable
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $visibility = $row["PostVisibility"];
                            $title = $row["PostTitle"];
                            $content = $row["PostContent"];
                            $notificationSent = $row["PostNotificationSent"];
                        }
                    }

                    // take the result from the visibility query and change what value it holds
                    if (boolval($visibility) == true){
                        $visibility = intval(false);
                    }
                    else {
                        $visibility = intval(true);

                        if ($notificationSent == 0){
                            $grabEmailList = ("SELECT `email` FROM `users` WHERE `sendEmails` = 'TRUE'");
                            $result = $connection->query($grabEmailList);

                            $from = "contact@zombiepedia.net";
                            $subject = "Zombiepedia.net Update: " . $title;
                            $content = $content;
                            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n From: Zombiepedia";

                            while ($row = $result->fetch_row()){
                                // send an email to myself about new user accounts
                                $to = $row[0];
                                mail($to, $subject, $content, $headers);
                            }

                            // update the visibility column to hold the new value
                            $query = ("UPDATE `BlogPosts` SET `PostNotificationSent` = 1 WHERE `PostID` = '" . $_POST["postID"] . "'");
                            $connection->query($query);
                        }
                    }

                    // update the visibility column to hold the new value
                    $query = ("UPDATE `BlogPosts` SET `PostVisibility` = '$visibility' WHERE `PostID` = '" . $_POST["postID"] . "'");
                    $connection->query($query);
                }

				if (isset($_POST["deletePost"])){
					$query = "DELETE FROM `BlogPosts` WHERE `PostID` = '" . $_POST["postID"] . "'"; // query
					$result = $connection->query($query); // perform query for deletion of post
				}
				if (isset($_POST["createPost"])){
				    // prepare the database for an insert query
					$query = $connection->prepare("INSERT into `BlogPosts` (PostTitle, PostDate, PostContent, PostAuthor, PostVisibility, PostNotificationSent) VALUES (?, ?, ?, ?, ?, ?)");
					// assign values to query
					$query->bind_param("ssssii", $_POST["title"], $currentDate, $_POST["content"], $_SESSION["user_data"]["firstName"], $defaultVisibility, $defaultNotification);
					// perform query
					$query->execute();
					// error handling
					if ($query->affected_rows == 0) echo "INSERT failed: $query<br>";
				}

				if (isset($_SESSION["user_data"])){

				    // display post creation tab to all users with the admin tag
					if ($_SESSION["user_data"]["type"] == "admin"){	
						echo "<div class = \"scrollArea\">";
						echo "	<form action = \"\" method = \"post\">";
						echo "	<h2>Create a Post</h2>";
						echo "	<p>Please Note: Your post will be available to anyone who visits this site and will be posted under the name specified on your account. Please try to make your post as professional as possible. <br><br>Please Also Note: <ul><li>All post bodies <i>MUST</i> use markdown. Markdown is <i>NOT</i> optional for post bodies</li><li>Post titles do not need any formatting</li></ul></p>";
						echo "	<h3>Title</h3><input type = \"text\" name = \"title\" size = \"50\"><br>";
						echo "	<h3>Content:</h3><textarea name = \"content\" rows = \"10\" cols = \"50\"></textarea><br><br>";
						echo "	<input type = \"submit\" value = \"SUBMIT POST\" name = \"createPost\">";
						echo "	</form>";
						echo "</div>";
					}

					// display the welcome back tab to anyone without the admin tag
					else {
					    if ($_SESSION["user_data"]["displayTips"] == "TRUE"){
                            echo "<div class = \"scrollArea\">";
                            echo "<h2>Welcome!</h2>";
                            echo "<p>Thank you for registering and logging into Zombiepedia. Now that you have an account, you can begin using all of the features that our website has to offer. The features on our website are constantly expanding. If you have a feature that you would like to suggest to us, please join our <a href = \"https://discord.gg/bQakA7X\">Discord</a> and leave us some feedback! If you're tired of seeing this message, it can be disabled on the <a href = \"https://zombiepedia.net/user-account.php\">Settings</a> page.</p>";
                            echo "</div>";
                        }
					}
				}

				echo "<div class = \"blogPosts\">";

				$result = $connection->query("SELECT `PostTitle`, `PostDate`, `PostContent`, `PostAuthor`, `PostID`, `PostVisibility`, `PostNotificationSent` FROM `BlogPosts` ORDER BY `PostID` DESC");
				if (!$result) die ("Query failed" . $connection->error);

				$adminAccess = "FALSE";

				while ($row = $result->fetch_assoc()){

                    if (isset($_SESSION["user_data"])){
                        if ($_SESSION["user_data"]["type"] == "admin"){
                            $adminAccess = "TRUE";

                            $postVisibility = boolval($row["PostVisibility"]) ? "true" : "false";
                            $postNotificationSent = boolval($row["PostNotificationSent"]) ? "true" : "false";

                            echo "<p>Post Visibility: $postVisibility  /  Notification Sent: $postNotificationSent</p>";
                            echo "<form action = \"\" method = \"post\">";
                            echo "	<input type = \"hidden\" name = \"postID\" value = \"$row[PostID]\">";
                            echo "  <input type = \"submit\" value = \"TOGGLE POST VISIBILITY\" name = \"hidePost\">";
                            echo "	<input type = \"submit\" value = \"DELETE POST\" name = \"deletePost\">";
                            echo "</form>";
                        }
                    }

                    if ($row["PostVisibility"] == 1 or $adminAccess == "TRUE") {
                        echo "<article>";
                        echo "	<h2>$row[PostTitle]<h2>";
                        echo "	<h3>Author: $row[PostAuthor] | Date: $row[PostDate]</h3>";
                        echo "	$row[PostContent]<br><br>";

                        if ($row["PostID"] >= 1){
                            echo "<hr><br>";
                        }
                        echo "</article>";
                    }
				}

			?>

			</div>
			<div class = "popularLinks">
				<h2>Popular Links</h2>

				<ul>
					<li><a href = "https://discord.com/invite/CallofDuty">Call of Duty Discord</a></li>
					<li><a href = "https://www.reddit.com/r/CODZombies/">COD Zombies Subreddit</a></li>
                    <li><a href = "https://discord.gg/bQakA7X">Zombiepedia Discord</a></li>
				</ul>
			</div>
	</body>
    <?php
        require_once "./navigation/footer.php";
    ?>
</html>