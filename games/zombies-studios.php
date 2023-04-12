<!--

	Author: Austin Hargis
	Creation Date: 5/25/20

-->

<html>
    <title>Zombiepedia - Studios</title>
	<?php
		require_once "../navigation/navigation_bar.php";
	?>

	<body>

		<div class = "scrollArea">
			<h2>Zombies Studios</h2>
			<p>Since its inception back in 2008, three different studios have released several major titles that included a new zombies experience, each differing from the last. Treyarch has generally released a darker, more gritty zombies experience. Sledgehammer Games, in their two releases, attempted to create a darker experience for its' playerbase as well, but both games unfortunately fell short with their audiences. Infinity Ward, in their sole zombies package, went for a goofier, more light-hearted zombies experience, with bright, colorful maps.</p>

            <hr>

            <div class = "gameList">
                <h2>Studio List</h2>
                <table>

                    <tr>
                        <th>Developer/Studio</th>
                        <th>Games Released</th>
                        <th>Maps Released*</th>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/studio.php?name=Infinity Ward">Infinity Ward</a></td>
                        <td>1</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/studio.php?name=Sledgehammer Games">Sledgehammer Games</a></td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td><a href = "https://zombiepedia.net/games/studio.php?name=Treyarch Studios">Treyarch Studio</a></td>
                        <td>5</td>
                        <td>30</td>
                    </tr>
                </table>
                <p style="font-size:12px">* Excludes 1:1 remasters</p>
            </div>
		</div>

	</body>
	<?php
		require_once "../navigation/footer.php";
	?>
</html>