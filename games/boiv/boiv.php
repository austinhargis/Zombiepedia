<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Black Ops IIII</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
		require_once "../map_verify.php";

		if (isset($_SESSION["user_data"])){
            $query = ("SELECT voyage_of_despair, ix, blood_of_the_dead, classified, dead_of_the_night, ancient_evil, alpha_omega, tag_der_toten FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($voyage_of_despair, $ix, $blood_of_the_dead, $classified, $dead_of_the_night, $ancient_evil, $alpha_omega, $tag_der_toten);
            $result->fetch();
        }
	?>

	<body>
		<div class = "scrollArea">
			<h2>Black Ops IIII</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Voyage of Despair</td>
                        <td>October 12th, 2018</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "voyage_of_despair">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($voyage_of_despair == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=IX">IX</a></td>
                        <td>October 12th, 2018</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "ix">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($ix == "Complete"){
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
                        <td>Blood of the Dead</td>
                        <td>October 12th, 2018</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "blood_of_the_dead">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($blood_of_the_dead == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games.php?name=Classified">Classified</a></td>
                        <td>October 12th, 2018</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "classified">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($classified == "Complete"){
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
                        <td>Dead of the Night</td>
                        <td>December 11th, 2018</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "dead_of_the_night">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($dead_of_the_night == "Complete"){
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
                        <td>Ancient Evil</td>
                        <td>March 26th, 2019</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "ancient_evil">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($ancient_evil == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Alpha Omega">Alpha Omega</a></td>
                        <td>July 9th, 2019</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "alpha_omega">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($alpha_omega == "Complete"){
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
                        <td>Tag Der Toten</td>
                        <td>September 23rd, 2019</td>
                        <td>
                            <form action = "./boiv.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "tag_der_toten">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($tag_der_toten == "Complete"){
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