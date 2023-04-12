<!--

	Author: Austin Hargis
	Creation Date: 8/8/20

-->

<?php

    require_once "../navigation/navigation_bar.php";
    require_once "../connection.php";

    if (isset($_GET["name"])){
        $name = $_GET["name"];

        $grabQuery = "SELECT * FROM `guide_contents` WHERE `name` = '$name'";
        $grabResult = $connection->query($grabQuery);

        if ($grabResult->num_rows > 0){
            while ($row = $grabResult->fetch_assoc()){
                $links = $row["guide_links"];
                $body = $row["guide_body"];
                $description = $row["guide_description"];
            }

            echo <<<_END
    
        <html>
            <title>Zombiepedia - $name</title>
    
            <body>
                <div class = "displaySpace">
                    <div class = "guideDescription">
                        <h2>$name</h2>
                        <p>$description</p>
                    </div>
        
                    <div class = "guideContents">
                        <h2>Guide Contents</h2>
                        <ul>
                            $links
                        </ul>
                    </div>
                </div>
    
                <div class = "scrollArea">
                    <div class = "gameInfoDisplay">
                        $body
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

