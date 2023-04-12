<!--

	Author: Austin Hargis
	Creation Date: 8/26/20

-->
<html>

    <title>Zombiepedia - Random Map Picker</title>
    <?php
        require_once "../navigation/navigation_bar.php";
        require_once "../connection.php";
    ?>

    <body>

        <div class = "scrollArea">
            <h2>Random Map Picker</h2>
            <p>Are you looking to find the next Easter Egg to complete or are you just looking for a random map for you and the squad to hop on to play? The Zombiepedia Random Map Picker has you covered. Select what maps are willing to play and then hit "Randomize" to get a random map picked out for you!</p>
            <hr>

            <h3 id = "mapTarget"></h3>
            <p id = "mapPoolTarget"></p>
            <button onclick = "pickMap()">Randomize</button>
            <button onclick = "addMap('bo3')">Black Ops 3</button>
            <p>Please Note: This feature is in development and only does Black Ops III maps. Also, if you're seeing this, how did you find this page?</p>

            <script type = "text/javascript">
                var mapList = [];

                function addMap(game){
                    switch(game) {
                        case "bo3":
                            mapList.push("Shadows of Evil", "The Giant", "Der Eisendrache", "Gorod Krovi", "Zetsubou No Shima", "Revelations");
                            break;
                    }
                    document.getElementById("mapPoolTarget").innerHTML = "Map Pool: " + mapList;
                }

                function pickMap(){
                    if (mapList.length === 0 || mapList === undefined){
                        document.getElementById("mapTarget").innerHTML = "No Game Selected";
                    }
                    else {
                        const selectedMap = Math.floor(Math.random() * mapList.length);
                        document.getElementById("mapTarget").innerHTML = "Your Map: " + mapList[selectedMap];
                    }
                }
            </script>
        </div>
    </body>
    <?php
        require_once "../navigation/footer.php";
    ?>
</html>
