<?php

// dynamicky seznam stranek

class Stranka {
    private $id;
    private $menu;
    private $menu_en;

    function __construct($id, $menu, $menu_en) {
        $this->id = $id;
        $this->menu = $menu;
        $this->menu_en = $menu_en;
    }

    function get_id() {
        return $this->id;
    }

    function get_menu($lang = 'cs') {
        return ($lang === 'en') ? $this->menu_en : $this->menu;
    }

    function get_obsah($lang = 'cs') {
        $soubor = "./{$this->id}_{$lang}.html";
        return file_exists($soubor) ? file_get_contents($soubor) : "<p>Obsah nenalezen.</p>";
    }

    function set_obsah($obsah, $lang = 'cs') {
        file_put_contents("./{$this->id}_{$lang}.html", $obsah);
    }
}


class Napoj {
    private $id;
    private $menu;
    private $menu_en;

    function __construct($id, $menu, $menu_en) {
        $this->id = $id;
        $this->menu = $menu;
        $this->menu_en = $menu_en;
    }

    function get_id() {
        return $this->id;
    }

    function get_menu($lang = 'cs') {
        return ($lang === 'en') ? $this->menu_en : $this->menu;
    }

    function get_obsah($lang = 'cs') {
        $soubor = "./{$this->id}_{$lang}.html"; // Správné sestavení názvu souboru
        return file_exists($soubor) ? file_get_contents($soubor) : "<p>Obsah nenalezen: {$soubor}</p>";
    }

    function set_obsah($obsah, $lang = 'cs') {
        file_put_contents("./napoje/{$this->id}_{$lang}.html", $obsah);
    }
}

//endStranka


$pole_stranek = array(
    "obedy" => new Stranka("obedy", "Obědy", "Lunch"),
    "burgery" => new Stranka("burgery", "Burgery", "Burgers"),
    "specials" => new Stranka("specials", "Specials", "Specials"),
    "vegetarians" => new Stranka("vegetarians", "Vegetariáni", "Vegetarians"),
    "salaty" => new Stranka("salaty", "Saláty", "Salads"),
    "chutovky" => new Stranka("chutovky", "Chuťovky", "Snacks"),
    "prilohy" => new Stranka("prilohy", "Přílohy", "Side dishes"),
    "omacky" => new Stranka("omacky", "Omáčky", "Sauces"),
);

$pole_napoju = array(
    "pivo" => new Napoj("pivo", "Pivo", "Beer"),
    "kava" => new Napoj("kava", "Káva", "Coffee"),
    "nealko" => new Napoj("nealko", "Nealko", "Soft drinks"),
    "teplenapoje" => new Napoj("teplenapoje", "Teplé nápoje", "Hot drinks"),
    "destilaty" => new Napoj("destilaty", "Destiláty", "Distilled spirits"),
    "koktejly" => new Napoj("koktejly", "Koktejly", "Cocktails"),
);