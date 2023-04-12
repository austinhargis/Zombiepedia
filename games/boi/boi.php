<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Black Ops</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT ascension, call_of_the_dead, shangri_la, der_riese, moon FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($ascension, $call_of_the_dead, $shangri_la, $der_riese, $moon);
            $result->fetch();
        }
	?>

	<body>

		<div class = "scrollArea">
			<h2>Black Ops I</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>

                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>Easter Egg Completed?</th>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Kino der Toten">Kino der Toten</a></td>
                        <td>November 9th, 2010</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Five</td>
                        <td>November 9th, 2010</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Ascension</td>
                        <td>February 1st, 2011</td>
                        <td>
                            <form action = "./boi.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "ascension">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($ascension == "Complete"){
                                            echo "<option>Incomplete</option>
                                                                    <option selected>Complete</option>";
                                        }
                                        else {
                                            echo "<option selected>Incomplete</option>
                                                                    <option>Complete</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Call of the Dead</td>
                        <td>May 3rd, 2011</td>
                        <td>
                            <form action = "./boi.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "call_of_the_dead">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($call_of_the_dead == "Complete"){
                                            echo "<option>Incomplete</option>
                                                                    <option selected>Complete</option>";
                                        }
                                        else {
                                            echo "<option selected>Incomplete</option>
                                                                    <option>Complete</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Shangri-La</td>
                        <td>June 28th, 2011</td>
                        <td>
                            <form action = "./boi.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "shangri_la">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($shangri_la == "Complete"){
                                            echo "<option>Incomplete</option>
                                                                    <option selected>Complete</option>";
                                        }
                                        else {
                                            echo "<option selected>Incomplete</option>
                                                                    <option>Complete</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Moon</td>
                        <td>August 23rd, 2011</td>
                        <td>
                            <form action = "./boi.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "moon">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($moon == "Complete"){
                                            echo "<option>Incomplete</option>
                                                                    <option selected>Complete</option>";
                                        }
                                        else {
                                            echo "<option selected>Incomplete</option>
                                                                    <option>Complete</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                </table>

                <h3>Other Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Nacht der Untoten</td>
                        <td>August 23rd, 2011</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Verrückt</td>
                        <td>August 23rd, 2011</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Shi No Numa</td>
                        <td>August 23rd, 2011</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Der Riese">Der Riese</a></td>
                        <td>August 23rd, 2011</td>
                        <td>
                            <form action = "./boi.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "der_riese">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($der_riese == "Complete"){
                                            echo "<option>Incomplete</option>
                                                                    <option selected>Complete</option>";
                                        }
                                        else {
                                            echo "<option selected>Incomplete</option>
                                                                    <option>Complete</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
		</div>
	</body>
	<?php
		require_once "../../navigation/footer.php";
	?>
</html>