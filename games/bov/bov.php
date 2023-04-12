<!--

	Author: Austin Hargis
	Creation Date: 8/24/20

-->

<html>
    <title>Zombiepedia - Black Ops Cold War</title>
    <?php
        require_once "../../navigation/navigation_bar.php";
        require_once "../../connection.php";
        require_once "../map_verify.php";

        if (isset($_SESSION["user_data"])){
            $query = ("SELECT die_maschine, firebase_z, outbreak FROM `easter_eggs` WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            $result = $connection->prepare($query);
            $result->execute();
            $result->store_result();

            $result->bind_result($die_maschine, $firebase_z, $outbreak);
            $result->fetch();
        }
    ?>

    <body>
        <div class = "scrollArea">
            <h2>Black Ops Cold War</h2>
            <p>Black Ops Cold War is the next title in the long running <i>Black Ops</i> series of the Call of Duty franchise. This game was teased for several weeks leading up to the announcement of an official trailer, releasing on August 26th, 2020. The game officially released on November 13th, 2020 and featured one zombies map, titled <i>Die Maschine</i>.</p>
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
                        <td>Die Maschine</td>
                        <td>November 13th, 2020</td>
                        <td>
                            <form action = "./bov.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "die_maschine">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                    if ($die_maschine == "Complete"){
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
                        <td>Firebase Z</td>
                        <td>February 4th, 2021</td>
                        <td>
                            <form action = "./bov.php" method = "post">
                                <input type = "hidden" name = "map_name" value = "firebase_z">
                                <select name = "map_value" onchange = "this.form.submit()">
                                    <?php
                                    if ($firebase_z == "Complete"){
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
                        <td>Outbreak</td>
                        <td>February 25th, 2021</td>
                        <td>
                            <form action = "./bov.php" method = "post">
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
                </table>
            </div>
        </div>
    </body>
    <?php
        require_once "../../navigation/footer.php";
    ?>
</html>