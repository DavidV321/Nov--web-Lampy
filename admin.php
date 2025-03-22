<?php

require "./data.php"; // Načtení souboru s polem nápojů

session_start();

$chyba = "";

// Přihlášení
if (array_key_exists("prihlasit", $_POST)) {
    $jmeno = $_POST["jmeno"];
    $heslo = $_POST["heslo"];

    if ($jmeno == "admin" && $heslo == "Lampicky123!") {
        $_SESSION["prihlaseny_uzivatel"] = $jmeno;
    } else {
        $chyba = "Nesprávné přihlašovací údaje";
    }
}

// Odhlášení
if (array_key_exists("odhlasit", $_POST)) {
    unset($_SESSION["prihlaseny_uzivatel"]);
    header("Location: ?");
    exit();
}

// Jazyk
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'cs'; // Určení jazyka

if (array_key_exists("prihlaseny_uzivatel", $_SESSION)) {
    $instance_aktualni_stranky = null;
    $instance_aktualni_napoj = null;

    // Editace stránek
    if (array_key_exists("id-stranky", $_GET)) {
        $id_stranky = $_GET["id-stranky"];
        $instance_aktualni_stranky = $pole_stranek[$id_stranky] ?? null;
    }

    // Editace nápojů
    if (array_key_exists("id-napoje", $_GET)) {
        $id_napoje = $_GET["id-napoje"];
        $instance_aktualni_napoj = $pole_napoju[$id_napoje] ?? null;
    }

    // Uložení změn stránek
    if (array_key_exists("ulozit-stranku", $_POST) && $instance_aktualni_stranky) {
        $obsah = $_POST["obsah"];
        $instance_aktualni_stranky->set_obsah($obsah, $lang); // Uložení dle jazyka
    }

    // Uložení změn nápojů
    if (array_key_exists("ulozit-napoj", $_POST) && $instance_aktualni_napoj) {
        $obsah = $_POST["obsah"];
        $instance_aktualni_napoj->set_obsah($obsah, $lang); // Uložení dle jazyka
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="style-admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styly-admin.css">
</head>
<body>

<?php
if (!array_key_exists("prihlaseny_uzivatel", $_SESSION)) {
?>
    <section class="sign-in">
        <main class="form-signin">
            <form method="post">
                <h1 class="h3 mb-3 fw-normal">Přihlašte se prosím</h1>

                <?php if ($chyba) { ?>
                <div class="alert alert-danger"><?php echo $chyba; ?></div>
                <?php } ?>

                <div class="form-floating">
                    <input name="jmeno" type="text" class="form-control" placeholder="login">
                    <label>Přihlašovací jméno</label>
                </div>

                <div class="form-floating">
                    <input name="heslo" type="password" class="form-control" placeholder="Heslo">
                    <label>Heslo</label>
                </div>

                <button name="prihlasit" class="btn btn-primary w-100 py-2" type="submit">Přihlásit</button>
            </form>
        </main>
    </section>
<?php
} else {
?>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
            <div>Přihlášený uživatel: <?php echo $_SESSION["prihlaseny_uzivatel"]; ?></div>
            <form method="post">
                <button name="odhlasit" class="btn btn-primary">Odhlásit se</button>
            </form>

            <!-- Výběr jazyka -->
            <div>
                <a href="?lang=cs" class="btn btn-secondary <?php echo $lang == 'cs' ? 'active' : ''; ?>">Čeština</a>
                <a href="?lang=en" class="btn btn-secondary <?php echo $lang == 'en' ? 'active' : ''; ?>">English</a>
            </div>
        </header>

        <div class="row">
            <!-- Seznam stránek -->
            <div class="col-md-6">
                <h2>Stránky</h2>
                <ul class="list-group">
                    <?php foreach ($pole_stranek as $id => $stranka) { ?>
                        <li class="list-group-item">
                            <a class="btn btn-primary" href="?id-stranky=<?php echo $id; ?>&lang=<?php echo $lang; ?>">Editovat</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <!-- Seznam nápojů -->
            <div class="col-md-6">
                <h2>Nápoje</h2>
                <ul class="list-group">
                    <?php foreach ($pole_napoju as $id => $napoj) { ?>
                        <li class="list-group-item">
                            <a class="btn btn-primary" href="?id-napoje=<?php echo $id; ?>&lang=<?php echo $lang; ?>">Editovat</a>
                            <?php echo htmlspecialchars($id); ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!-- Editace stránky -->
        <?php if ($instance_aktualni_stranky) { ?>
            <div class="alert alert-secondary">
                <h2>Editace stránky: <?php echo htmlspecialchars($instance_aktualni_stranky->get_id()); ?> - <?php echo ucfirst($lang); ?></h2>
            </div>
            <form method="post">
                <textarea name="obsah" id="mytextarea" class="form-control" rows="10"><?php echo htmlspecialchars($instance_aktualni_stranky->get_obsah($lang)); ?></textarea>
                <button class="btn btn-primary mt-3" name="ulozit-stranku">Uložit</button>
            </form>
            <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
            <script type="text/javascript">
            tinymce.init({
                selector: '#mytextarea',
                language: '<?php echo $lang; ?>',
                language_url: '<?php echo dirname($_SERVER["PHP_SELF"]);  ?>/vendor/tweeb/tinymce-i18n/langs/<?php echo $lang; ?>.js',
                height: '50vh',
                entity_encoding: "row",
                verify_html: false,
                content_css: [
                    './style.css',
                    './styly=admin.css',
                    './images/lightbox.min.css',
                    './css/mdb.min.css',
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
                    'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap'
                ],
                cleanup: false,
                plugins: ["code", "image", "responsivefilemanager", "anchor", "autolink", "autoresize", "link", "media", "lists", "advlist", "colorpicker", "contextmenu", "fullscreen"],
                toolbar1: "undo redo | styleselect | bold italic | link image | code | alignleft aligncenter alignright | numlist bullist | preview",
                toolbar2: "forecolor backcolor | fullscreen | insertdate inserttime | emoticons",
                images_upload_url: 'upload.php',
                file_picker_types: 'image'
            });
            </script>
        <?php } ?>

        <!-- Editace nápoje -->
        <?php if ($instance_aktualni_napoj) { ?>
            <div class="alert alert-secondary">
                <h2>Editace nápoje: <?php echo htmlspecialchars($instance_aktualni_napoj->get_id()); ?> - <?php echo ucfirst($lang); ?></h2>
            </div>
            <form method="post">
                <textarea name="obsah" id="mytextarea" class="form-control" rows="10"><?php echo htmlspecialchars($instance_aktualni_napoj->get_obsah($lang)); ?></textarea>
                <button class="btn btn-primary mt-3" name="ulozit-napoj">Uložit</button>
            </form>
               
            <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
            <script type="text/javascript">
            tinymce.init({
                selector: '#mytextarea',
                language: '<?php echo $lang; ?>',
                language_url: '<?php echo dirname($_SERVER["PHP_SELF"]);  ?>/vendor/tweeb/tinymce-i18n/langs/<?php echo $lang; ?>.js',
                height: '50vh',
                entity_encoding: "row",
                verify_html: false,
                content_css: [
                    './style.css',
                    './styly-admin.css',
                    './images/lightbox.min.css',
                    './css/mdb.min.css',
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
                    'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap'
                ],
                cleanup: false,
                plugins: ["code", "image", "responsivefilemanager", "anchor", "autolink", "autoresize", "link", "media", "lists", "advlist", "colorpicker", "contextmenu", "fullscreen"],
                toolbar1: "undo redo | styleselect | bold italic | link image | code | alignleft aligncenter alignright | numlist bullist | preview",
                toolbar2: "forecolor backcolor | fullscreen | insertdate inserttime | emoticons",
                images_upload_url: 'upload.php',
                file_picker_types: 'image'
            });
            </script>
        <?php } ?>
    </div>
<?php } ?>

</body>
</html>