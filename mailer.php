<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function clean_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $name = clean_input($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = clean_input($_POST['phone'] ?? '');
    $date = clean_input($_POST['date'] ?? '');
    $place = clean_input($_POST['place'] ?? '');
    $number = clean_input($_POST['number'] ?? '');
    $form = clean_input($_POST['form'] ?? '');
    $message = clean_input($_POST['message'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Neplatný email.");
    }

    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($place) || empty($number) || empty($form)) {
        die("Vyplňte všechna povinná pole.");
    }

    if (!empty($_POST['honeypot'])) {
        die("Neplatná žádost.");
    }

    $to = "info@cafebarlampicky.cz";
    $subject = "Nová cateringová poptávka";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $email_message = "Nová poptávka na catering:\n\n" .
                     "Jméno: $name\n" .
                     "Email: $email\n" .
                     "Telefon: $phone\n" .
                     "Datum události: $date\n" .
                     "Místo konání: $place\n" .
                     "Počet osob: $number\n" .
                     "Typ akce: $form\n" .
                     "Zpráva: $message\n";

    if (mail($to, $subject, $email_message, $headers)) {
        echo "Poptávka byla úspěšně odeslána.";
    } else {
        echo "Chyba při odesílání poptávky.";
    }
} else {
    die("Neplatný požadavek.");
}
?>