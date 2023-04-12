<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<footer>
	<div class = "footer">
		<p>Questions, comments, concerns? Please <a href = "mailto:contact@zombiepedia.net?Subject=Zombiepedia.net%20Comments">email</a> and let us know!</p>

        <?php

            // verify that a database connection has been made
            if (isset($connection)){

                // verifies that the date has been set
                if (!isset($footerCurrentDate)){
                    $footerCurrentDate = date("m/d/Y");
                }

                // check to see if the user has already "visited" the site in their current session
                // if the user has visited in this session, no "hit" should be registered
                if (!isset($_SESSION["visited"])) {
                    $grabQuery = "SELECT `hits` FROM `site_data` WHERE `cdate` = '$footerCurrentDate'";
                    $grabResult = $connection->query($grabQuery);

                    // check to see if the current date already exists within the SQL table
                    if ($grabResult->num_rows <= 0){
                        $defaultHits = 0;

                        // add a new date to the table if the current one does not exist (updates in UTC time)
                        $insertQuery = $connection->prepare("INSERT into `site_data` (hits, cdate) VALUES (?, ?)");
                        $insertQuery->bind_param("is", $defaultHits, $footerCurrentDate);
                        $insertQuery->execute();
                    }

                    // add +1 to the current day's view count
                    $updateQuery = ("UPDATE `site_data` SET `hits` = `hits` + 1 WHERE `cdate` = '$footerCurrentDate'");
                    $connection->query($updateQuery);

                    // set the session "visit" variable to true, ensuring that no more hits can be registered
                    $_SESSION["visited"] = TRUE;
                }

                // grab the current amount of hits from the table for display
                $getHits = "SELECT `hits`, `cdate` FROM `site_data` WHERE `cdate` = '$footerCurrentDate'";
                $hitsResult = $connection->query($getHits);

                $hours = date("H");

                // checks to see if the query was successful
                if ($hitsResult->num_rows > 0) {
                    while ($row = $hitsResult->fetch_assoc()) {
                        $hits = $row["hits"];
                        $tdate = $row["cdate"];
                    }
                    echo "<p class = \"footer\">This website has been visited $hits time(s) on $tdate after $hours hour(s)!</p>";
                }
                // if the query was not successful, let the user know that the hits couldn't be retrieved
                else {
                    echo "<p class = \"footer\">ERROR: Today's view count could not be retrieved at this time.</p>";
                }
            }
        ?>
    </div>
</footer>