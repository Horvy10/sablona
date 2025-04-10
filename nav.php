<?php
include "classes/spracovanieqna.php";
$menuManager = new Menu();
$theme = isset($_GET["theme"]) ? $_GET["theme"] : "light";
?>

<header style="background-color: <?php echo $theme === "dark" ? "grey" : "white"; ?>">
    <div class="container main-header">
        <div class="logo-holder">
            <a href="<?php echo (isset($menuManager->getMenuData("header")["home"]["path"])) 
                ? $menuManager->getMenuData("header")["home"]["path"] : ''; ?>">
                <img alt="img" src="img/portfolio/logo.png" height="40">
            </a>
        </div>
    </div>
</header>

<ul class="main-menu" id="main-menu container">
    <a href=<?php echo $theme === "dark" ? "?theme=light" : "?theme=dark"; ?>>Zmena témy</a>
    <?php
    // Overenie validácie typu navigácie
    if ($menuManager->isValidMenuType("header")) {
        $menuData = $menuManager->getMenuData("header");
        $menuManager->printMenu($menuData);
    } else {
        echo "Neplatný typ menu";
    }
    ?>
</ul>
