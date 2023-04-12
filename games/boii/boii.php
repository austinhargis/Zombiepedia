<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Black Ops II</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT tranzit, die_rise, mob_of_the_dead, buried, origins FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($tranzit, $die_rise, $mob_of_the_dead, $buried, $origins);
            $result->fetch();
        }
	?>

	<body>
		<div class = "scrollArea">
			<h2>Black Ops II</h2>
            <p>Black Ops II (as declared on the box art for the game), or Black Ops 2, is the second release in the Black Ops franchise and the third release in the Call of Duty zombies series. Throughout this title's cycle, the playerbase came to know three different groups for their stories about their struggles against the endless waves of the damned.</p>
            <hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Tranzit">Tranzit</a></td>
                        <td>November 12th, 2012</td>
                        <td>
                            <form action = "./boii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "tranzit">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($tranzit == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Nuketown">Nuketown</a></td>
                        <td>December 12th, 2012</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Die Rise">Die Rise</a></td>
                        <td>January 29th, 2013</td>
                        <td>
                            <form action = "./boii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "die_rise">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($die_rise == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Mob of the Dead">Mob of the Dead</a></td>
                        <td>April 16th, 2013</td>
                        <td>
                            <form action = "./boii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "mob_of_the_dead">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($mob_of_the_dead == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Buried">Buried</a></td>
                        <td>July 2nd, 2013</td>
                        <td>
                            <form action = "./boii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "buried">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($buried == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Origins">Origins</a></td>
                        <td>August 27th, 2013</td>
                        <td>
                            <form action = "./boii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "origins">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($origins == "Complete"){
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