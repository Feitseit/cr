<?php
$parool = 'admin';
$hash = password_hash($parool, PASSWORD_BCRYPT);
echo $hash;
?>
