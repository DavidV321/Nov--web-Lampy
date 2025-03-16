<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Filtrujeme vstupní data
    function clean_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $event_date = clean_input($_POST['event_date'] ?? '');
    $number_of_people = clean_input($_POST['number_of_people'] ?? '');
    $event_time = clean_input($_POST['event_time'] ?? '');
    $visit_duration = clean_input($_POST['visit_duration'] ?? '');
    $full_name = clean_input($_POST['full_name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = clean_input($_POST['phone'] ?? '');
    $message = clean_input($_POST['message'] ?? '');

    // Validace emailu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Neplatný email.");
    }

    // Kontrola povinných polí
    if (empty($event_date) || empty($number_of_people) || empty($event_time) || empty($full_name) || empty($email)) {
        die("Vyplňte všechna povinná pole.");
    }

    // Ochrana proti spamu - Captcha nebo Honeypot
    if (!empty($_POST['honeypot'])) { // Skryté pole, které by boty měly vyplnit
        die("Neplatná rezervace.");
    }

    // Příprava e-mailu
    $to = "info@cafebarlampicky.cz"; // Změň na svůj e-mail
    $subject = "Nová rezervace";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
    
    $email_message = "Nová rezervace:\n\n" .
                     "Datum: $event_date\n" .
                     "Počet osob: $number_of_people\n" .
                     "Čas: $event_time\n" .
                     "Délka návštěvy: $visit_duration\n" .
                     "Jméno: $full_name\n" .
                     "Email: $email\n" .
                     "Telefon: $phone\n" .
                     "Zpráva: $message\n";

    if (mail($to, $subject, $email_message, $headers)) {
        echo "Rezervace byla úspěšně odeslána.";
    } else {
        echo "Chyba při odesílání rezervace.";
    }
} else {
    die("Neplatný požadavek.");
}
?>