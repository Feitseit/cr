<?php
// sinu andmed
$db_server = 'db';
$db_andmebaas = 'cr';
$db_kasutaja = 'markus';
$db_salasona = 'markus';

define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD_HASH', '$2b$12$0FTDh.QuAUZACF4xGfgkauYlIsXbXXh7oJf.WrwRerGhAGuy89ooS');

// ühendus andmebaasiga
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

// ühenduse kontroll
if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}

?>
