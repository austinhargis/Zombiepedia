<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Advanced Warfare</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
        require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT outbreak, infection, carrier, descent FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($outbreak, $infection, $carrier, $descent);
            $result->fetch();
        }
	?>

	<body>

		<div class = "scrollArea">

			<h2>Advanced Warfare</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>

                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Outbreak</td>
                        <td></td>
                        <td>
                            <form action = "./aw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "outbreak">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($outbreak == "Complete"){
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
                        <td>Infection</td>
                        <td></td>
                        <td>
                            <form action = "./aw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "infection">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($infection == "Complete"){
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
                        <td>Carrier</td>
                        <td></td>
                        <td>
                            <form action = "./aw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "carrier">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($carrier == "Complete"){
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
                        <td>Descent</td>
                        <td></td>
                        <td>
                            <form action = "./aw.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "descent">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($descent == "Complete"){
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