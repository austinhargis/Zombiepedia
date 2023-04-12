<!--

	Author: Austin Hargis
	Creation Date: 6/9/20

-->

<?php
    if (isset($_SESSION["user_data"])){

        if (isset($_POST["map_name"])){
            if ($_POST["map_value"] == "Complete" or $_POST["map_value"] == "Incomplete"){
                $query = ("UPDATE `easter_eggs` SET `" . $_POST["map_name"] . "` = '" . $_POST["map_value"] . "' WHERE `user_id` = '" . $_SESSION["user_data"]["email"] . "'");
            }
        }
        if (isset($query)){
            $connection->query($query);
        }
    }
?>