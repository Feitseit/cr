<?php
// sinu andmed
$db_server = 'db';
$db_andmebaas = 'cr';
$db_kasutaja = 'markus';
$db_salasona = 'markus';

define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD_HASH', '$2y$12$xEUDCTa4UHcx3tb/Xo6X9uhf58D6o1z9h5gqauD9Yn8H2XqcCR6hC');

// ühendus andmebaasiga
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

// ühenduse kontroll
if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}

?>
