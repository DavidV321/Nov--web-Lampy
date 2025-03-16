<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pokud je jazyk v GET a je platný, ulož ho do session
if (isset($_GET["lang"]) && in_array($_GET["lang"], ["cs", "en"])) {
    $_SESSION["lang"] = $_GET["lang"];
}

// Pokud není jazyk v session, nastav výchozí hodnotu
$lang = $_SESSION["lang"] ?? "cs";

// Překlady
$texts = [
    "cs" => [
        "title" => "Lampičky restaurant",
        "restaurant_desc" => 'Lampičky restaurant, umístěný v části Žižkov - Jarov. Domov skvělých burgerů a poctivých jídel. Máte chuť na pořádný burger z kvalitního masa, křupavé hranolky a omáčky, které si zamilujete? Nebo hledáte polední menu, které vás zasytí a potěší domácí chutí? Ať už k nám zavítáte na rychlý oběd, pohodovou večeři nebo jen na drink s přáteli, vždy vás čeká skvělá atmosféra a poctivá porce chuti. Pivo čepujeme od našeho otevření %s z pivovaru %s, a to přímo z tanku, skvělého Bohéma od Krušovic a pro fanoušky speciálů měníme na čepu různé typy piv zejména Polotmavého Beránka, ale i IPU, ALE...',
        "restaurant_desc_2" => "Protože jsme vždy věřili, že kvalita začíná v kuchyni, připravujeme si sami omáčky, pečeme bulky na naše burgery a při přípravě dezertů sázíme na poctivou výrobu a poctivou chuť. Přijďte si užít nejen burger, ale veškeré naše pokrmy, které vznikají s láskou a důrazem na kvalitu.",
        "menu" => "MENU",
        "drinks" => "NÁPOJE",
        "gallery" => "GALERIE",
        "reservation" => "REZERVACE",
        "contact" => "Kontakt",
        "opening_hours" => "Otevírací doba",
        "phone" => "Telefon",
        "email" => "Email",
        "Event" => "Firemka",
        "days_week" => "Ne - Čt:",
        "days_weekend" => "Pá - So:",
        "kitchen" => "kuchyně do",
        "hours" => "hod",
        "date" => "Jaké datum...",
        "people" => "Počet osob",
        "time" => "Zvolit čas",
        "duration" => "Délka návštěvy",
        "one_hour" => "1 h",
        "two_hour" => "2 h",
        "three_hour" => "3 h",
        "four_hour" => "4 h",
        "full_name" => "Jméno a příjmení",
        "message" => "Zpráva",
        "submit" => "Rezervace",
        "payment_cards" => "Přijímáme tyto platební karty",


    ],
    "en" => [
        "title" => "Lampičky Restaurant",
        "restaurant_desc" => 'Lampičky restaurant, located in the Žižkov - Jarov district. Home of great burgers and honest meals. Do you crave a proper burger made from high-quality meat, crispy fries, and sauces you will love? Or are you looking for a lunch menu that fills you up and delights you with a homemade taste? Whether you visit us for a quick lunch, a relaxing dinner, or just a drink with friends, you can always expect a great atmosphere and an honest portion of flavor. We have been serving beer since our opening %s from the %s brewery, straight from the tank, excellent Bohém from Krušovice, and for craft beer fans, we rotate different types of beers, especially the Semi-dark Beránek, as well as IPA, ALE...',
        "restaurant_desc_2" => "Because we have always believed that quality starts in the kitchen, we prepare our own sauces, bake buns for our burgers, and rely on honest craftsmanship and taste when making desserts. Come and enjoy not just our burgers but all of our dishes, which are created with love and a focus on quality.",
        "menu" => "MENU",
        "drinks" => "DRINKS",
        "gallery" => "GALLERY",
        "reservation" => "RESERVATION",
        "contact" => "Contact",
        "opening_hours" => "Opening Hours",
        "phone" => "Phone",
        "email" => "Email",
        "Event" => "Event",
        "days_week" => "Sun - Thu:",
        "days_weekend" => "Fri - Sat:",
        "kitchen" => "kitchen until",
        "hours" => "h",
        "date" => "Select Date...",
        "people" => "Number of People",
        "time" => "Select Time",
        "duration" => "Visit Duration",
        "one_hour" => "1 h",
        "two_hour" => "2 h",
        "three_hour" => "3 h",
        "four_hour" => "4 h",
        "full_name" => "Full Name",
        "message" => "Message",
        "submit" => "Reserve",
        "payment_cards" => "We accept these payment cards",
    ]
];

$t = $texts[$lang]; // Nastavení aktuálních textů
?>