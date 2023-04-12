<!--

	Author: Austin Hargis
	Creation Date: 5/15/20

-->

<?php
	session_start();
//	echo session_id();

	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

    date_default_timezone_set("America/New_York");

    if (isset($_SESSION["user_data"])){
        if ($_SESSION["user_data"]["darkMode"] == "TRUE"){
            echo "<link rel = \"stylesheet\" href = \"https://zombiepedia.net/styles/dark-theme.css\">";
        }
        else {
            echo "<link rel = \"stylesheet\" href = \"https://zombiepedia.net/styles/light-theme.css\">";
        }
    }
    else {
        echo "<link rel = \"stylesheet\" href = \"https://zombiepedia.net/styles/dark-theme.css\">";
    }

?>

<header>
    <meta name = "viewport" content = "width=device-width, initial-scale=1"/>
    <link rel = "stylesheet" href = "https://zombiepedia.net/styles/main-theme.css">
    <script src = "https://zombiepedia.net/styles/image_blowup.js"></script>

	<div class = "headerText">
		<h1>Zombiepedia.net</h1>
	</div>

	<div class = "navBar">
		<a href = "https://zombiepedia.net">Home</a>

        <!-- "studios" dropdown, for all the different core studios -->
        <div class = "dropdown">
            <button class = "dropbtn">Studios</button>
            <div class = "dropdown-content">
                <a href = "https://zombiepedia.net/games/studio.php?name=Infinity Ward">Infinity Ward</a>
                <a href = "https://zombiepedia.net/games/studio.php?name=Sledgehammer Games">Sledgehammer</a>
                <a href = "https://zombiepedia.net/games/studio.php?name=Treyarch Studios">Treyarch</a>
            </div>
        </div>

        <!-- "zombies" dropdown, for games and monsters -->
		<div class = "dropdown">
			<button class = "dropbtn">Zombies</button>
			<div class = "dropdown-content">
				<a href = "https://zombiepedia.net/games/zombies-games.php">Games</a>
<!--                <a>Maps</a>-->
<!--                <a>Monsters</a>-->
<!--                <a>Workshop</a>-->
			</div>
		</div>

        <?php
            if (isset($_SESSION["user_data"])){
                echo <<<_END

                    <div class = "dropdown">
                        <button class="dropbtn">Account
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class = "dropdown-content">
                            <a href = "https://zombiepedia.net/user-account.php">Manage</a>
                            <a href = "https://zombiepedia.net/navigation/logout.php">Logout</a>
                        </div>
                    </div>
_END;
            }
            else {
                echo "<a href = \"https://zombiepedia.net/user-login.php\">Login</a>";
            }
        ?>

        <!-- "other" dropdown, for credits, and plaintext patchnotes -->
        <a href = "https://zombiepedia.net/feedback.php">Feedback</a>
	</div>
</header>