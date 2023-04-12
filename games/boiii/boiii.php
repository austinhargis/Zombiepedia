<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<html>
    <title>Zombiepedia - Black Ops III</title>
	<?php
		require_once "../../navigation/navigation_bar.php";
		require_once "../../connection.php";
		require_once "../map_verify.php";

		if (isset($_SESSION["user_data"])){
            $query = ("SELECT shadows_of_evil, the_giant, der_eisendrache, zetsubou_no_shima, gorod_krovi, revelations, ascension, shangri_la, moon, origins FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($shadows_of_evil, $the_giant, $der_eisendrache, $zetsubou_no_shima, $gorod_krovi, $revelations, $ascension, $shangri_la, $moon, $origins);
            $result->fetch();
        }
	?>
	<body>
		<div class = "scrollArea">
			<h2>Black Ops III</h2><hr>

            <div class = "gameList">
                <h3>Maps</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td>Shadows of Evil</td>
                        <td>November 6th, 2015</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "shadows_of_evil">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($shadows_of_evil == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Der Eisendrache">Der Eisendrache</a></td>
                        <td>February 2nd, 2016</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "der_eisendrache">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($der_eisendrache == "Complete"){
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
                        <td>Zetsubou No Shima</td>
                        <td>April 19th, 2016</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "zetsubou_no_shima">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($zetsubou_no_shima == "Complete"){
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
                        <td>Gorod Krovi</td>
                        <td>July 12th, 2016</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "gorod_krovi">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($gorod_krovi == "Complete"){
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
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Revelations">Revelations</a></td>
                        <td>September 6th, 2016</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "revelations">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($revelations == "Complete"){
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

                <h3>Remade Maps</h3>
                <table>
                    <tr>
                        <th>Map Name</th>
                        <th>Release Date</th>
                        <th>EE Complete?</th>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=The Giant">The Giant</a></td>
                        <td>November 6th, 2015</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "the_giant">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                        if ($the_giant == "Complete"){
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
                        <td>Nacht der Untoten</td>
                        <td>May 16th, 2017</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Verrückt</td>
                        <td>May 16th, 2017</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Shi No Numa</td>
                        <td>May 16th, 2017</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Kino der Toten">Kino der Toten</a></td>
                        <td>May 16th, 2017</td>
                        <td>No "Big" EE</td>
                    </tr>
                    <tr>
                        <td>Ascension</td>
                        <td>May 16th, 2017</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
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
                        <td>Shangri-La</td>
                        <td>May 16th, 2017</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
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
                        <td>May 16th, 2017</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
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
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/guide.php?name=Origins">Origins</a></td>
                        <td>May 16th, 2017</td>
                        <td>
                            <form action = "./boiii.php" method = "post">
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