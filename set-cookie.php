<?php
if (isset($_POST['cookie_consent'])) {
    setcookie('cookie_consent', $_POST['cookie_consent'], time() + (86400 * 30), "/");
    http_response_code(204); // Bez obsahu
    exit;
}
?>