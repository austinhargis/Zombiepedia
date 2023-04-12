<!--

	Author: Austin Hargis
	Creation Date: 5/25/20

-->

<?php
    require_once "../navigation/navigation_bar.php";
    require_once "../connection.php";

    if (isset($_GET["name"])){
        $name = $_GET["name"];

        $grabQuery = "SELECT * FROM `studio_contents` WHERE `name` = '$name'";
        $grabResult = $connection->query($grabQuery);

        if ($grabResult->num_rows > 0){
            while ($row = $grabResult->fetch_assoc()){
                $mapsTable = $row["mapsTable"];
                $scoresTable = $row["scoresTable"];
                $studioDescription = $row["description"];
            }

            echo <<<_END
        <html>
            <title>Zombiepedia - $name</title>
            <body>
                <div class = "scrollArea">
        
                    <h2>$name</h2>
                    <p>$studioDescription</p>         
                    <hr>
        
                    <div class = "gameList">
                        <h3>Games</h3>
                        <table>
                            <tr>
                                <th>Game</th>
                                <th>Release Date</th>
                                <th>Metacritic Average (PC)</th>
                            </tr>
                            $scoresTable
                        </table>
                        <p style="font-size:12px">*Scores are taken as of 12/1/20</p>
        
                        <hr>
        
                        <h3>Maps</h3>
                        <table>       
                            <tr>
                                <th>Game</th>
                                <th>Map Name</th>
                                <th>Map Release Date</th>
                            </tr>
                            $mapsTable
                        </table>
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