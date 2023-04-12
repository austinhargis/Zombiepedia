<!--

	Author: Austin Hargis
	Creation Date: 8/8/20

-->

<?php

    require_once "../navigation/navigation_bar.php";
    require_once "../connection.php";

    if (isset($_GET["map_name"])){
        $map_name = $_GET["map_name"];

        $grabQuery = "SELECT * FROM `music_easter_eggs` WHERE `map_name` = '$map_name'";
        $grabResult = $connection->query($grabQuery);

        if ($grabResult->num_rows > 0){
            while ($row = $grabResult->fetch_assoc()){
                $object_name = $row["object_name"];
                $object_path = $row["image_path"];

                $location_desc_1 = $row["location_desc_1"];
                $location_desc_2 = $row["location_desc_2"];
                $location_desc_3 = $row["location_desc_3"];
                $location_desc_4 = $row["location_desc_4"];
            }

            echo <<<_END

    <html>
        
        <script src = "https://zombiepedia.net/styles/image_blowup.js"></script>
    
        <title>Zombiepedia - $map_name Music Easter Egg</title>

        <body>
            <div class = "scrollArea">
                <div class = "gameList">
                    <h2>$map_name - Music Easter Egg</h2>
        
                    <hr>
        
                    <h3>Locations</h3>
                    <ul>
                        <li>$object_name 1: $location_desc_1</li>
                        <li>$object_name 2: $location_desc_2</li>
                        <li>$object_name 3: $location_desc_3</li>
_END;
                    // display a fourth option if one exists
                    if ($location_desc_4 != ""){
                        echo "<li>$object_name 4: $location_desc_3</li>";
                    }

                    echo <<<_END
                    </ul>
        
                    <div class = "helpImage">
                        <div class = "photoContainer">
                            <img src = "https://zombiepedia.net/games/$object_path/music_location_1.jpg" alt = "$object_name Location 1" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                            <div class = "imgCaption">$object_name Location 1</div>
                        </div>
                        <div class = "photoContainer">
                            <img src = "https://zombiepedia.net/games/$object_path/music_location_2.jpg" alt = "$object_name Location 2" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                            <div class = "imgCaption">$object_name Location 2</div>
                        </div>
                        <div class = "photoContainer">
                            <img src = "https://zombiepedia.net/games/$object_path/music_location_3.jpg" alt = "$object_name Location 3" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                            <div class = "imgCaption">$object_name Location 3</div>
                        </div>
_END;
                    if ($location_desc_4 != ""){
                        echo "
                        <div class = \"photoContainer\">
                            <img src = \"https://zombiepedia.net/games/$object_path/music_location_4.jpg\" alt = \"$object_name Location 3\" onerror = \"this.src='https://zombiepedia.net/failed_load.png'\" onclick = \"imageResize(this)\">
                            <div class = \"imgCaption\">$object_name Location 3</div>
                        </div>";
                    }
                    echo <<<_END
                    </div>
                </div>
            </div>
        </body>
    </html>
_END;
        }
        else {
            header("Location: https://zombiepedia.net/404.html");
        }
    }
    else {
        header("Location: https://zombiepedia.net/404.html");
    }

    require_once "../navigation/footer.php";
?>

