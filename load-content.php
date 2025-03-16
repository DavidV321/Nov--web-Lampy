<?php
require_once "./data.php"; // Načte pole stránek a nápojů

if (isset($_GET["id-stranky"]) && array_key_exists($_GET["id-stranky"], $pole_stranek)) {
    $filePath = "./" . $pole_stranek[$_GET["id-stranky"]]->get_id() . ".html";
} elseif (isset($_GET["id-napoj"]) && array_key_exists($_GET["id-napoj"], $pole_napoju)) {
    $filePath = "./" . $pole_napoju[$_GET["id-napoj"]]->get_id() . ".html";
} else {
    echo "<p style='color: red;'>Chyba: Neplatná stránka</p>";
    exit;
}

// Debugging - vypíše chybu, pokud soubor neexistuje
if (!file_exists($filePath)) {
    echo "<p style='color: red;'>Chyba: Soubor nenalezen ($filePath)</p>";
} else {
    echo file_get_contents($filePath);
}