<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "lang.php"; // Načte jazykové soubory

echo "<ul>";
foreach ($pole_napoju as $instance_napoje) {
    $menu = htmlspecialchars($instance_napoje->get_menu($lang)); // Přidání jazyka
    $id = htmlspecialchars($instance_napoje->get_id());

    if (!empty($menu)) {
        printf("<li><a class='ajax-link' href='?id-napoj=%s'>%s</a></li>", $id, $menu);
    }
}
echo "</ul>";
?>