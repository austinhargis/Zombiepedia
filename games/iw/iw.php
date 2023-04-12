<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Infinite Warfare</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT zombies_in_spaceland, rave_in_the_redwoods, shaolin_shuffle, attack_of_the_radioactive_thing, the_beast_from_beyond FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($zombies_in_spaceland, $rave_in_the_redwoods, $shaolin_shuffle, $attack_of_the_radioactive_thing, $the_beast_from_beyond);
            $result->fetch();
        }
	?>

	<body>
		<div class = "scrollArea">
			<h2>Infinite Warfare</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Zombies in Spaceland</td>
                        <td></td>
                        <td>
                            <form action = "./iw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "zombies_in_spaceland">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($zombies_in_spaceland == "Complete"){
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
                        <td>Rave in the Redwoods</td>
                        <td></td>
                        <td>
                            <form action = "./iw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "rave_in_the_redwoods">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($rave_in_the_redwoods == "Complete"){
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
                        <td>Shaolin Shuffle</td>
                        <td></td>
                        <td>
                            <form action = "./iw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "shaolin_shuffle">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($shaolin_shuffle == "Complete"){
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
                        <td>Attack of the Radioactive Thing</td>
                        <td></td>
                        <td>
                            <form action = "./iw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "attack_of_the_radioactive_thing">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($attack_of_the_radioactive_thing == "Complete"){
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
                        <td>The Beast from Beyond</td>
                        <td></td>
                        <td>
                            <form action = "./iw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_beast_from_beyond">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_beast_from_beyond == "Complete"){
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