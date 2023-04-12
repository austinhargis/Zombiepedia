<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - WWII</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT the_final_reich, the_darkest_shore, the_shadowed_throne, the_tortured_path, the_frozen_dawn FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($the_final_reich, $the_darkest_shore, $the_shadowed_throne, $the_tortured_path, $the_frozen_dawn);
            $result->fetch();
        }
    ?>

	<body>
		<div class = "scrollArea">
			<h2>WWII</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>

                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Gröesten Haus</td>
                        <td></td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>The Final Reich</td>
                        <td></td>
                        <td>
                            <form action = "./wwii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_final_reich">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_final_reich == "Complete"){
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
                        <td>The Darkest Shore</td>
                        <td></td>
                        <td>
                            <form action = "./wwii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_darkest_shore">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_darkest_shore == "Complete"){
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
                        <td>The Shadowed Throne</td>
                        <td></td>
                        <td>
                            <form action = "./wwii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_shadowed_throne">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_shadowed_throne == "Complete"){
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
                        <td>The Tortured Path</td>
                        <td></td>
                        <td>
                            <form action = "./wwii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_tortured_path">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_tortured_path == "Complete"){
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
                        <td>The Frozen Dawn</td>
                        <td></td>
                        <td>
                            <form action = "./wwii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_frozen_dawn">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_frozen_dawn == "Complete"){
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