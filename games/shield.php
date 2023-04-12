<!--

	Author: Austin Hargis
	Creation Date: 9/7/20

-->

<?php

    /*
     *
     * Before you get too far into this code, I do want to make note of something.
     * This file is essentially the one scene from The Pirates of the Caribbean
     *
     * "You are without doubt the worst code I've ever run"
     * "But I do run"
     *
     * This code probably shouldn't exist, but here it is. It works, and that's damn
     * fine by me. If you're reading this somehow and know of a much, much better way
     * to accomplish what I'm doing here, please feel free to email me at
     * contact@zombiepedia.net. I would love to know how to fix this dumpster fire.
     *
     */

    require_once "../navigation/navigation_bar.php";
    require_once "../connection.php";

    if (isset($_GET["name"])){
        $name = $_GET["name"];

        $grabQuery = "SELECT * FROM `shield_guide` WHERE `name` = '$name'";
        $grabResult = $connection->query($grabQuery);

        $sentToList = array();

        if ($grabResult->num_rows > 0){
            while ($row = $grabResult->fetch_array()){
                // god forgive me for what I am about to do

                $path = $row["path"];

                $part_1_name = $row["part_1_name"];
                $part_2_name = $row["part_2_name"];
                $part_3_name = $row["part_3_name"];

                $part_1_nameL = strtolower($part_1_name);
                $part_2_nameL = strtolower($part_2_name);
                $part_3_nameL = strtolower($part_3_name);

                $part_1_desc_1 = $row["part_1_description_1"];
                $part_1_desc_2 = $row["part_1_description_2"];
                $part_1_desc_3 = $row["part_1_description_3"];

                $part_2_desc_1 = $row["part_2_description_1"];
                $part_2_desc_2 = $row["part_2_description_2"];
                $part_2_desc_3 = $row["part_2_description_3"];

                $part_3_desc_1 = $row["part_3_description_1"];
                $part_3_desc_2 = $row["part_3_description_2"];
                $part_3_desc_3 = $row["part_3_description_3"];
            }

            echo <<<_END
        
            <html>
                <title>Zombiepedia - $name</title>    
                <body>
                    <div class = "scrollArea">
                        <div class = "gameInfoDisplay">
                            <h2>$name - Shield Guide</h2>
                            
                            <hr>
                            
                            <h3>Shield $part_1_name Locations</h3>
                            <ul>
                                <li>Shield $part_1_name 1: $part_1_desc_1</li>
                                <li>Shield $part_1_name 2: $part_1_desc_2</li>
                                <li>Shield $part_1_name 3: $part_1_desc_3</li>
                            </ul>
                            <div class = "helpImage">
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_1_$part_1_nameL.jpg" alt = "Shield $part_1_name Location 1" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_1_name Location 1</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_2_$part_1_nameL.jpg" alt = "Shield $part_1_name Location 2" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_1_name Location 2</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_3_$part_1_nameL.jpg" alt = "Shield $part_1_name Location 3" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_1_name Location 3</div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <h3>Shield $part_2_name Locations</h3>
                            <ul>
                                <li>Shield $part_2_name 1: $part_2_desc_1</li>
                                <li>Shield $part_2_name 2: $part_2_desc_2</li>
                                <li>Shield $part_2_name 3: $part_2_desc_3</li>
                            </ul>
                            <div class = "helpImage">
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_1_$part_2_nameL.jpg" alt = "Shield $part_2_name Location 1" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_2_name Location 1</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_2_$part_2_nameL.jpg" alt = "Shield $part_2_name Location 2" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_2_name Location 2</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_3_$part_2_nameL.jpg" alt = "Shield $part_2_name Location 3" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_2_name Location 3</div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <h3>Shield $part_3_name Locations</h3>
                            <ul>
                                <li>Shield $part_3_name 1: $part_3_desc_1</li>
                                <li>Shield $part_3_name 2: $part_3_desc_2</li>
                                <li>Shield $part_3_name 3: $part_3_desc_3</li>    
                            </ul>
                            <div class = "helpImage">
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_1_$part_3_nameL.jpg" alt = "Shield $part_3_name Location 1" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_3_name Location 1</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_2_$part_3_nameL.jpg" alt = "Shield $part_3_name Location 2" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_3_name Location 2</div>
                                </div>
                                <div class = "photoContainer">
                                    <img src = "https://zombiepedia.net/games/$path/shield_3_$part_3_nameL.jpg" alt = "Shield $part_3_name Location 3" onerror = "this.src='https://zombiepedia.net/failed_load.png'" onclick = "imageResize(this)">
                                    <div class = "imgCaption">Shield $part_3_name Location 3</div>
                                </div>
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

