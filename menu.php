<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "lang.php"; // Načte jazykové soubory

echo "<ul>";
foreach ($pole_stranek as $instance_stranky) {
    $menu = htmlspecialchars($instance_stranky->get_menu($lang)); // Přidání jazyka
    $id = htmlspecialchars($instance_stranky->get_id());

    if (!empty($menu)) {
        printf("<li><a class='ajax-link' href='?id-stranky=%s'>%s</a></li>", $id, $menu);
    }
}
echo "</ul>";
?>