<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - World at War</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT der_riese FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($der_riese);
            $result->fetch();
        }
	?>

	<body>
		<div class = "scrollArea">
			<h2>World at War</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Nacht der Untoten</td>
                        <td>November 11th, 2008</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Verrückt</td>
                        <td>March 19th, 2009</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Shi No Numa</td>
                        <td>June 11th, 2009</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Der Riese">Der Riese</a></td>
                        <td>August 6th, 2009</td>
                        <td>
                            <form action = "./waw.php" method = "post">
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